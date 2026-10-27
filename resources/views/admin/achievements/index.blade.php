@extends('layouts.admin')
@section('title', 'Awards & Achievements')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                <span>🏆</span>
                <span>Awards & Achievements</span>
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Manage your honors, hackathon awards, academic distinctions, and recognitions</p>
        </div>
        <a href="{{ route('admin.achievements.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition flex items-center gap-2 text-sm">
            <span>+ Add Award / Achievement</span>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <th class="px-6 py-4">Award Title</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Issuer / Organization</th>
                        <th class="px-6 py-4">Year</th>
                        <th class="px-6 py-4">Proof / Link</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    @forelse($achievements as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-750 transition">
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2.5">
                            <span class="text-xl">{{ $item->icon ?? '🏆' }}</span>
                            <div>
                                <span>{{ $item->title }}</span>
                                <p class="text-xs font-normal text-gray-500 dark:text-gray-400 line-clamp-1 max-w-xs">{{ $item->description }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 dark:bg-amber-950/60 dark:text-amber-300">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                            {{ $item->issuer }}
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400 whitespace-nowrap font-medium">
                            {{ $item->year }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-xs">
                            @if($item->link)
                            <a href="{{ $item->link }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1 font-semibold">
                                View Proof &rarr;
                            </a>
                            @else
                            <span class="text-gray-400">&mdash;</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.achievements.edit', $item) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-semibold text-xs">Edit</a>
                            <form action="{{ route('admin.achievements.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this award?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 hover:underline font-semibold text-xs ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            No awards or achievements added yet. Click "+ Add Award / Achievement" above.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
