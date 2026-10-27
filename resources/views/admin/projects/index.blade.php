@extends('layouts.admin')
@section('title', 'Manage Projects')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Projects</h1>
            <p class="text-gray-500 text-sm mt-1">Manage project items displayed in your portfolio</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow transition">
            + Add New Project
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3.5">Project</th>
                    <th class="px-6 py-3.5">Category</th>
                    <th class="px-6 py-3.5">Featured</th>
                    <th class="px-6 py-3.5">Order</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                @forelse($projects as $project)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 overflow-hidden flex-shrink-0">
                            @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">📁</div>
                            @endif
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 dark:text-gray-100">{{ $project->title }}</div>
                            <div class="text-xs text-gray-400">{{ Str::limit($project->description, 50) }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded-md font-medium">{{ $project->category ?? 'General' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($project->is_featured)
                        <span class="text-xs font-bold text-yellow-500">⭐ Yes</span>
                        @else
                        <span class="text-xs text-gray-400">No</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $project->sort_order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 text-xs font-semibold">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 text-xs font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No projects added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
