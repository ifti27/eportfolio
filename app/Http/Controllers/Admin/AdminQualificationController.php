<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use Illuminate\Http\Request;

class AdminQualificationController extends Controller
{
    public function index()
    {
        $qualifications = Qualification::orderBy('sort_order')->orderByDesc('id')->get();
        return view('admin.qualifications.index', compact('qualifications'));
    }

    public function create()
    {
        return view('admin.qualifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'level' => 'required|string|max:100', // School, College, University
            'result' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        Qualification::create($validated);

        return redirect()->route('admin.qualifications.index')->with('success', 'Academic qualification added successfully.');
    }

    public function edit(Qualification $qualification)
    {
        return view('admin.qualifications.edit', compact('qualification'));
    }

    public function update(Request $request, Qualification $qualification)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'level' => 'required|string|max:100',
            'result' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'field_of_study' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $qualification->update($validated);

        return redirect()->route('admin.qualifications.index')->with('success', 'Academic qualification updated successfully.');
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();
        return redirect()->route('admin.qualifications.index')->with('success', 'Academic qualification deleted successfully.');
    }
}
