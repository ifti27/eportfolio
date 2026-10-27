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
}
