<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::orderBy('sort_order')->get();

        return view('public.experience', compact('profile', 'experiences'));
    }
}
