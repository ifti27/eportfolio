<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GitHubPagesExporter
{
    protected string $outputDir;

    public function __construct()
    {
        $this->outputDir = base_path('docs');
    }

    /**
     * Export all pages and assets into the docs/ directory.
     *
     * @return array<string, mixed>
     */
    public function export(): array
    {
        // 1. Ensure docs directory exists and is clean
        if (File::exists($this->outputDir)) {
            File::deleteDirectory($this->outputDir);
        }
        File::makeDirectory($this->outputDir, 0755, true);

        // Share errors bag to views (normally provided by ShareErrorsFromSession middleware)
        view()->share('errors', new \Illuminate\Support\ViewErrorBag());

        // 2. Define pages to export: filename => controller call
        $pages = [
            'index.html',
            'projects.html',
            'publications.html',
            'experience.html',
            'academic.html',
            'contact.html',
        ];

        $renderedPages = [];

        foreach ($pages as $filename) {
            $html = $this->renderPage($filename);
            $cleanHtml = $this->transformHtmlForStaticHosting($html);
            File::put($this->outputDir . DIRECTORY_SEPARATOR . $filename, $cleanHtml);
            $renderedPages[] = $filename;
        }

        // 3. Create 404.html (copy of index.html for SPA/clean fallback)
        if (File::exists($this->outputDir . DIRECTORY_SEPARATOR . 'index.html')) {
            File::copy(
                $this->outputDir . DIRECTORY_SEPARATOR . 'index.html',
                $this->outputDir . DIRECTORY_SEPARATOR . '404.html'
            );
        }

        // 4. Create .nojekyll (bypasses Jekyll processing on GitHub Pages)
        File::put($this->outputDir . DIRECTORY_SEPARATOR . '.nojekyll', '');

        // 5. Copy public/build assets (Vite CSS & JS)
        $buildSource = public_path('build');
        if (File::exists($buildSource)) {
            File::copyDirectory($buildSource, $this->outputDir . DIRECTORY_SEPARATOR . 'build');
        }

        // 6. Copy public/storage assets (Uploaded images, avatars, etc.)
        $storageSource = public_path('storage');
        if (File::exists($storageSource)) {
            File::copyDirectory($storageSource, $this->outputDir . DIRECTORY_SEPARATOR . 'storage');
            
            // Crucial: remove .gitignore inside docs/storage so Git doesn't ignore project images and resumes!
            $docsStorageGitignore = $this->outputDir . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . '.gitignore';
            if (File::exists($docsStorageGitignore)) {
                File::delete($docsStorageGitignore);
            }
        }

        // 7. Handle CV / Resume download
        $profile = Profile::first();
        if ($profile && $profile->resume_url) {
            $cleaned = str_replace(['/storage/', 'storage/'], '', $profile->resume_url);
            $candidatePaths = [
                public_path('storage/' . $cleaned),
                storage_path('app/public/' . $cleaned),
                public_path(ltrim($profile->resume_url, '/')),
            ];
            foreach ($candidatePaths as $candidate) {
                if (File::exists($candidate)) {
                    File::copy($candidate, $this->outputDir . DIRECTORY_SEPARATOR . 'cv.pdf');
                    break;
                }
            }
        }

        return [
            'success' => true,
            'pages' => $renderedPages,
            'output_dir' => $this->outputDir,
        ];
    }

    /**
     * Render a page directly through its controller.
     */
    protected function renderPage(string $filename): string
    {
        return match ($filename) {
            'index.html' => app(\App\Http\Controllers\HomeController::class)->index()->render(),
            'projects.html' => app(\App\Http\Controllers\ProjectController::class)->index()->render(),
            'publications.html' => app(\App\Http\Controllers\PublicationController::class)->index()->render(),
            'experience.html' => app(\App\Http\Controllers\ExperienceController::class)->index()->render(),
            'academic.html' => app(\App\Http\Controllers\AcademicController::class)->index()->render(),
            'contact.html' => app(\App\Http\Controllers\ContactController::class)->index()->render(),
            default => throw new \InvalidArgumentException("Unknown page: {$filename}"),
        };
    }

    /**
     * Rewrite absolute URLs, route links, and asset paths into relative static paths.
     */
    protected function transformHtmlForStaticHosting(string $html): string
    {
        $profile = Profile::first();
        $resumeUrl = ($profile && $profile->resume_url) ? 'cv.pdf' : 'contact.html';

        // 1. Transform assets (build and storage) first
        $html = preg_replace('/(href|src)=(["\'])(https?:\/\/[^\/]+)?\/?build\//i', '$1=$2./build/', $html);
        $html = preg_replace('/(href|src)=(["\'])(https?:\/\/[^\/]+)?\/?storage\//i', '$1=$2./storage/', $html);

        // 2. Transform page route links
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/projects\/?(["\'])/i', 'href=$1projects.html$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/publications\/?(["\'])/i', 'href=$1publications.html$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/experience\/?(["\'])/i', 'href=$1experience.html$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/academic\/?(["\'])/i', 'href=$1academic.html$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/contact\/?(["\'])/i', 'href=$1contact.html$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/download-cv\/?(["\'])/i', 'href=$1' . $resumeUrl . '$3', $html);
        $html = preg_replace('/href=(["\'])(https?:\/\/[^\/]+)?\/(["\'])/i', 'href=$1index.html$3', $html);

        // 3. Fallback: replace any remaining direct links that point to root domain
        $bases = [
            rtrim(config('app.url'), '/'),
            'http://localhost:8000',
            'http://127.0.0.1:8000',
            'http://localhost',
            'http://127.0.0.1',
        ];
        foreach (array_unique(array_filter($bases)) as $base) {
            $html = str_replace($base . '/projects', 'projects.html', $html);
            $html = str_replace($base . '/publications', 'publications.html', $html);
            $html = str_replace($base . '/experience', 'experience.html', $html);
            $html = str_replace($base . '/academic', 'academic.html', $html);
            $html = str_replace($base . '/contact', 'contact.html', $html);
            $html = str_replace($base . '/download-cv', $resumeUrl, $html);
            $html = str_replace($base . '/', 'index.html', $html);
            $html = str_replace($base, 'index.html', $html);
        }

        return $html;
    }
}
