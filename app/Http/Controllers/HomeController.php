<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Experience;
use App\Models\Qualification;
use App\Models\Achievement;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->get();
        $skillsGrouped = $skills->groupBy('category');
        $featuredProjects = Project::where('is_featured', true)->orderBy('sort_order')->get();
        $qualifications = Qualification::orderBy('sort_order')->get();
        $achievements = Achievement::orderBy('sort_order')->get();

        $stats = [
            'projects' => Project::count(),
            'publications' => Publication::count(),
            'experience_years' => ($earliest = Experience::min('start_date'))
                ? (int) \Carbon\Carbon::parse($earliest)->diffInYears(now())
                : 0,
            'skills' => Skill::count(),
            'awards' => Achievement::count(),
        ];

        return view('public.home', compact('profile', 'skills', 'skillsGrouped', 'featuredProjects', 'qualifications', 'achievements', 'stats'));
    }
}
