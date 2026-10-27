@extends('layouts.admin')
@section('title', 'Manage Publications')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Publications</h1>
            <p class="text-gray-500 text-sm mt-1">Manage academic papers and research items</p>
        </div>
        <a href="{{ route('admin.publications.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow transition">
            + Add Publication
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3.5">Title & Journal</th>
                    <th class="px-6 py-3.5">Authors</th>
                    <th class="px-6 py-3.5">Year</th>
                    <th class="px-6 py-3.5">Links</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                @forelse($publications as $pub)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-900 dark:text-gray-100">{{ $pub->title }}</div>
                        <div class="text-xs text-indigo-600 dark:text-indigo-400 font-medium">{{ $pub->journal }}</div>
                    </td>
                    <td class="px-6 py-4 text-xs text-gray-500">{{ Str::limit($pub->authors, 40) }}</td>
                    <td class="px-6 py-4 text-xs font-semibold">{{ $pub->year }}</td>
                    <td class="px-6 py-4 text-xs space-x-2">
                        @if($pub->doi_url) <a href="{{ $pub->doi_url }}" target="_blank" class="text-indigo-600 hover:underline">DOI</a> @endif
                        @if($pub->pdf_url) <a href="{{ $pub->pdf_url }}" target="_blank" class="text-red-500 hover:underline">PDF</a> @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.publications.edit', $pub) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 text-xs font-semibold">Edit</a>
                        <form action="{{ route('admin.publications.destroy', $pub) }}" method="POST" class="inline" onsubmit="return confirm('Delete this publication?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 text-xs font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No publications added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
