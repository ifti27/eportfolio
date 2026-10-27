<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AdminAchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderBy('sort_order')->orderByDesc('id')->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100', // Competition, Academic Award, Research, Certification, Honor
            'issuer' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Award/Achievement added successfully.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'issuer' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'description' => 'required|string',
            'link' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
        ]);

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')->with('success', 'Award/Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Award/Achievement deleted successfully.');
    }
}
