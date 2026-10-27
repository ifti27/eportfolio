@extends('layouts.admin')
@section('title', 'Add Experience')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Add Work Experience</h1>
        <a href="{{ route('admin.experiences.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Experience</a>
    </div>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Company / Organization *</label>
                <input type="text" name="company" value="{{ old('company') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Position / Job Title *</label>
                <input type="text" name="position" value="{{ old('position') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Location</label>
            <input type="text" name="location" value="{{ old('location') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. San Francisco, CA or Remote">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Start Date *</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="flex items-center gap-6">
            <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 rounded">
                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">I currently work here</span>
            </label>
            <div class="flex items-center gap-2">
                <label class="text-sm font-semibold text-gray-700 dark:text-gray-300">Sort Order:</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-20 px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Key Responsibilities / Highlights (One per line)</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="• Led backend redesign using Laravel&#10;• Improved API response times by 35%&#10;• Mentored junior engineers">{{ old('description') }}</textarea>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition">
                Create Experience
            </button>
        </div>
    </form>
</div>
@endsection
