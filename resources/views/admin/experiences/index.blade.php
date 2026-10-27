@extends('layouts.admin')
@section('title', 'Manage Experience')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Work Experience</h1>
            <p class="text-gray-500 text-sm mt-1">Manage timeline items for your career history</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow transition">
            + Add Experience
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3.5">Role & Company</th>
                    <th class="px-6 py-3.5">Location</th>
                    <th class="px-6 py-3.5">Dates</th>
                    <th class="px-6 py-3.5">Current</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                @forelse($experiences as $exp)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900 dark:text-gray-100">{{ $exp->position }}</div>
                        <div class="text-xs text-indigo-600 dark:text-indigo-400 font-medium">{{ $exp->company }}</div>
                    </td>
                    <td class="px-6 py-4 text-xs text-gray-500">{{ $exp->location ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-xs text-gray-600 dark:text-gray-300">
                        {{ $exp->start_date ? $exp->start_date->format('M Y') : '' }} — {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}
                    </td>
                    <td class="px-6 py-4">
                        @if($exp->is_current)
                        <span class="px-2 py-0.5 bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300 text-xs rounded-full font-bold">YES</span>
                        @else
                        <span class="text-xs text-gray-400">No</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 text-xs font-semibold">Edit</a>
                        <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" class="inline" onsubmit="return confirm('Delete this experience?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 text-xs font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No experiences added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
