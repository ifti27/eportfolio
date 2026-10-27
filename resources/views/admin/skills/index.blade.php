@extends('layouts.admin')
@section('title', 'Manage Skills')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Skills</h1>
            <p class="text-gray-500 text-sm mt-1">Manage technical skills and proficiency percentages</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow transition">
            + Add New Skill
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3.5">Skill</th>
                    <th class="px-6 py-3.5">Proficiency</th>
                    <th class="px-6 py-3.5">Category</th>
                    <th class="px-6 py-3.5">Order</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                @forelse($skills as $skill)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-gray-100">{{ $skill->name }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-24 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $skill->percentage }}%"></div>
                            </div>
                            <span class="text-xs font-semibold">{{ $skill->percentage }}%</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded-md font-medium">{{ $skill->category }}</span>
                    </td>
                    <td class="px-6 py-4">{{ $skill->sort_order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 text-xs font-semibold">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline" onsubmit="return confirm('Delete this skill?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 text-xs font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No skills added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
