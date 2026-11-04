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
        $result = $exporter->export();

        exec('git add docs/', $out1, $code1);
        exec('git commit -m "deploy: update static portfolio for GitHub Pages"', $out2, $code2);
        exec('git push origin main', $out3, $code3);

        $msg = 'Successfully exported and updated the docs/ folder for GitHub Pages! ';
        if ($code3 === 0) {
            $msg .= 'Pushed changes to GitHub. Your live site will update in ~30 seconds.';
        } else {
            $msg .= 'Static files ready. You can push to GitHub using: git push origin main.';
        }

        return redirect()->route('admin.dashboard')->with('success', $msg);
    }
}
