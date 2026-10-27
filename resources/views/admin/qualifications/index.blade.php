@extends('layouts.admin')
@section('title', 'Academic Qualifications')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                <span>🎓</span>
                <span>Academic Qualifications</span>
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Manage your educational background (School, College, University degrees and results)</p>
        </div>
        <a href="{{ route('admin.qualifications.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition flex items-center gap-2 text-sm">
            <span>+ Add Qualification</span>
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        <th class="px-6 py-4">Level</th>
                        <th class="px-6 py-4">Degree / Examination</th>
                        <th class="px-6 py-4">Institution</th>
                        <th class="px-6 py-4">Result</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    @forelse($qualifications as $qual)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-750 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                @if($qual->level == 'University') bg-purple-100 text-purple-700 dark:bg-purple-950/60 dark:text-purple-300
                                @elseif($qual->level == 'College') bg-blue-100 text-blue-700 dark:bg-blue-950/60 dark:text-blue-300
                                @else bg-emerald-100 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 @endif">
                                {{ $qual->level }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                            {{ $qual->degree }}
                            @if($qual->field_of_study)
                            <span class="block text-xs font-normal text-gray-500 dark:text-gray-400">Major/Group: {{ $qual->field_of_study }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                            {{ $qual->institution }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-lg bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-300 font-bold text-xs">
                                {{ $qual->result }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ $qual->duration }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.qualifications.edit', $qual) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-semibold text-xs">Edit</a>
                            <form action="{{ route('admin.qualifications.destroy', $qual) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this qualification?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-400 hover:underline font-semibold text-xs ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                            No academic qualifications added yet. Click "+ Add Qualification" above.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
