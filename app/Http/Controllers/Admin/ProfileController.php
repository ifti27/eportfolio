<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate(
            [],
            ['name' => 'Your Name', 'title' => 'Your Title']
        );

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'co_curricular' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'resume_url' => 'nullable|string|max:255',
            'resume_file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'typing_titles' => 'nullable|string',
        ]);

        $profile = Profile::first();

        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('resume_file')) {
            $resumePath = $request->file('resume_file')->store('resumes', 'public');
            $validated['resume_url'] = '/storage/' . $resumePath;
        }

        if (isset($validated['typing_titles'])) {
            $validated['typing_titles'] = array_map('trim', explode(',', $validated['typing_titles']));
        }

        $profile->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }
}
