<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Experience;
use App\Models\Message;
use App\Models\Skill;
use App\Models\Qualification;
use App\Models\Achievement;
use App\Services\GitHubPagesExporter;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'publications' => Publication::count(),
            'experiences' => Experience::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'skills' => Skill::count(),
            'qualifications' => Qualification::count(),
            'achievements' => Achievement::count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }

    public function publishGhPages(GitHubPagesExporter $exporter)
    {
        // 1. Export static HTML/assets to docs/
        $result = $exporter->export();

        $base = base_path();
        $cwd = getcwd();
        chdir($base);

        $gitBase = 'git -C ' . escapeshellarg($base);

        // 2. Stage docs/
        exec("{$gitBase} add docs/ 2>&1", $outAdd, $codeAdd);

        // 3. Commit only if there are staged changes
        exec("{$gitBase} diff --cached --quiet docs/", $diffOut, $diffCode);
        $committed = false;
        if ($diffCode !== 0) {
            exec("{$gitBase} commit -m \"deploy: update static portfolio for GitHub Pages\" 2>&1", $outCommit, $codeCommit);
            $committed = true;
        }

        // 4. Push main branch
        exec("{$gitBase} push origin main 2>&1", $outPushMain, $codePushMain);

        // 5. Push docs subtree to gh-pages branch
        exec("{$gitBase} subtree push --prefix docs origin gh-pages 2>&1", $outPushGh, $codePushGh);

        chdir($cwd);

        Log::info('GitHub Pages Publish', [
            'add' => $outAdd ?? [],
            'committed' => $committed,
            'commit_out' => $outCommit ?? [],
            'push_main_code' => $codePushMain,
            'push_main' => $outPushMain ?? [],
            'push_gh_code' => $codePushGh,
            'push_gh' => $outPushGh ?? [],
        ]);

        if ($codePushGh === 0 || $codePushMain === 0) {
            $msg = 'Successfully published to GitHub Pages! Your live portfolio is updating (takes ~30-60s). Please hard-refresh your browser (Ctrl + F5 or Shift + Reload) to see the changes.';
            return redirect()->route('admin.dashboard')->with('success', $msg);
        }

        $errorMsg = 'Static files exported to docs/, but pushing to GitHub encountered an issue. Check storage/logs/laravel.log or verify Git push permissions.';
        return redirect()->route('admin.dashboard')->with('error', $errorMsg);
    }
}
