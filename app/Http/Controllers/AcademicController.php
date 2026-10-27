<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\Achievement;
use App\Models\Profile;

class AcademicController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $qualifications = Qualification::orderBy('sort_order')->orderByDesc('id')->get();
        $achievements = Achievement::orderBy('sort_order')->orderByDesc('id')->get();

        return view('public.academic', compact('profile', 'qualifications', 'achievements'));
    }
}
