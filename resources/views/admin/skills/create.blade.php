@extends('layouts.admin')
@section('title', 'Add Skill')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Add New Skill</h1>
        <a href="{{ route('admin.skills.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Skills</a>
    </div>

    <form action="{{ route('admin.skills.store') }}" method="POST" class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Skill Name *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. PHP, Laravel, TensorFlow, MySQL, Python">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Proficiency Percentage (0 - 100) *</label>
            <input type="number" name="percentage" min="0" max="100" value="{{ old('percentage', 85) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Category Group *</label>
                <input type="text" list="skillCategories" name="category" value="{{ old('category', 'Web Tools') }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Web Tools, AI / ML, Database, Languages">
                <datalist id="skillCategories">
                    <option value="Web Tools">Web Tools (PHP, HTML, CSS, Laravel, etc.)</option>
                    <option value="AI / ML">AI / ML (Pandas, NumPy, TensorFlow, etc.)</option>
                    <option value="Database">Database (MySQL, SQLite, etc.)</option>
                    <option value="Languages">Languages (Python, C++, Java, C#, R, etc.)</option>
                </datalist>
                <p class="text-xs text-gray-400 mt-1">Select from standard groups or type a custom one</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition">
                Create Skill
            </button>
        </div>
    </form>
</div>
@endsection
