<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('public.contact', compact('profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string|max:5000',
        ]);

        Message::create($validated);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
