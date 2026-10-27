<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $publications = Publication::orderBy('year', 'desc')->orderBy('sort_order')->get();

        return view('public.publications', compact('profile', 'publications'));
    }
}
