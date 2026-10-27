@extends('layouts.admin')
@section('title', 'Edit Publication')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Edit Publication</h1>
        <a href="{{ route('admin.publications.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Publications</a>
    </div>

    <form action="{{ route('admin.publications.update', $publication) }}" method="POST" class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Publication Title *</label>
            <input type="text" name="title" value="{{ old('title', $publication->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Authors</label>
                <input type="text" name="authors" value="{{ old('authors', $publication->authors) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Journal / Conference Name</label>
                <input type="text" name="journal" value="{{ old('journal', $publication->journal) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Year</label>
                <input type="number" name="year" value="{{ old('year', $publication->year) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">DOI URL</label>
                <input type="url" name="doi_url" value="{{ old('doi_url', $publication->doi_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">PDF URL</label>
                <input type="url" name="pdf_url" value="{{ old('pdf_url', $publication->pdf_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Abstract / Summary</label>
            <textarea name="abstract" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">{{ old('abstract', $publication->abstract) }}</textarea>
        </div>

        <div class="flex items-center gap-2">
            <label class="text-sm font-semibold text-gray-700 dark:text-gray-300">Sort Order:</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $publication->sort_order) }}" class="w-20 px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition">
                Update Publication
            </button>
        </div>
    </form>
</div>
@endsection
