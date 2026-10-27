<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class AdminPublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('sort_order')->get();
        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.publications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'nullable|string|max:255',
            'journal' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:2099',
            'abstract' => 'nullable|string',
            'doi_url' => 'nullable|url|max:255',
            'pdf_url' => 'nullable|url|max:255',
            'sort_order' => 'integer',
        ]);

        Publication::create($validated);

        return redirect()->route('admin.publications.index')->with('success', 'Publication created successfully!');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'nullable|string|max:255',
            'journal' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:2099',
            'abstract' => 'nullable|string',
            'doi_url' => 'nullable|url|max:255',
            'pdf_url' => 'nullable|url|max:255',
            'sort_order' => 'integer',
        ]);

        $publication->update($validated);

        return redirect()->route('admin.publications.index')->with('success', 'Publication updated successfully!');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('admin.publications.index')->with('success', 'Publication deleted successfully!');
    }
}
