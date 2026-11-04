<?php

namespace App\Console\Commands;

use App\Services\GitHubPagesExporter;
use Illuminate\Console\Command;

class ExportGitHubPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'portfolio:export-gh-pages {--push : Automatically commit and push to GitHub}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export dynamic Laravel portfolio into static HTML/CSS/JS for GitHub Pages';

    /**
     * Execute the console command.
     */
    public function handle(GitHubPagesExporter $exporter): int
    {
        $this->info('Starting static export for GitHub Pages...');

        $result = $exporter->export();

        $this->info('Rendered ' . count($result['pages']) . ' pages into docs/:');
        foreach ($result['pages'] as $page) {
            $this->line("  ✓ {$page}");
        }
        $this->line("  ✓ 404.html (fallback)");
        $this->line("  ✓ .nojekyll (GitHub Pages bypass)");
        $this->line("  ✓ build/ (compiled CSS & JS)");
        $this->line("  ✓ storage/ (images & uploads)");

        if ($this->option('push')) {
            $this->info('Committing and pushing to GitHub...');
            exec('git add docs/', $output, $code1);
            exec('git commit -m "deploy: update static portfolio for GitHub Pages"', $output, $code2);
            exec('git push origin main', $output, $code3);

            if ($code3 === 0) {
                $this->info('Successfully deployed to GitHub!');
            } else {
                $this->warn('Git push completed with code ' . $code3);
            }
        } else {
            $this->comment('Export complete! To publish to GitHub Pages, commit the docs/ folder and push to main:');
            $this->line('  git add docs/');
            $this->line('  git commit -m "deploy: update portfolio for GitHub Pages"');
            $this->line('  git push origin main');
        }

        return Command::SUCCESS;
    }
}
