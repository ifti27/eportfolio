@extends('layouts.admin')
@section('title', 'Add Award / Achievement')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
            <span>🏆</span>
            <span>Add Award / Achievement</span>
        </h1>
        <a href="{{ route('admin.achievements.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Achievements</a>
    </div>

    <form action="{{ route('admin.achievements.store') }}" method="POST" class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        @csrf

        <div class="grid md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Award Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Champion - National Hackathon 2023">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Badge Emoji / Icon</label>
                <input type="text" name="icon" value="{{ old('icon', '🏆') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="🏆, 🥇, 🥈, 🎖️, 📜">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Category *</label>
                <input type="text" list="achievementCats" name="category" value="{{ old('category', 'Competition') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
                <datalist id="achievementCats">
                    <option value="Competition">Competition / Hackathon</option>
                    <option value="Academic Award">Academic Award / Distinction</option>
                    <option value="Research Award">Research / Publication Award</option>
                    <option value="Scholarship">Scholarship / Fellowship</option>
                    <option value="Honor">Honor / Recognition</option>
                </datalist>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Issuing Body / Organization *</label>
                <input type="text" name="issuer" value="{{ old('issuer') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Ministry of ICT, IEEE, University Faculty">
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Year / Date *</label>
                <input type="text" name="year" value="{{ old('year') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. 2023, Nov 2023">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Certificate / Proof Link</label>
                <input type="url" name="link" value="{{ old('link') }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://...">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Short Description *</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Briefly describe what this award was for and your key accomplishment...">{{ old('description') }}</textarea>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition">
                Save Award / Achievement
            </button>
        </div>
    </form>
</div>
@endsection
