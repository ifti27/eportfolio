<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $projects = Project::orderBy('sort_order')->get();
        $categories = Project::distinct()->pluck('category')->filter()->values();
        if ($categories->isEmpty()) {
            $categories = collect(['Software', 'IoT']);
        }

        return view('public.projects', compact('profile', 'projects', 'categories'));
    }
}
