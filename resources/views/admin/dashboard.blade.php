@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Overview Dashboard</h1>
        <p class="text-gray-500 text-sm mt-1">Manage and update your dynamic portfolio content</p>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-3.5">
        <a href="{{ route('admin.projects.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-indigo-500">Projects</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['projects'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.skills.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-emerald-500">Skills</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['skills'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.qualifications.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-blue-500">Academic</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['qualifications'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.achievements.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-amber-500">Awards</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['achievements'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.publications.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-purple-500">Papers</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['publications'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.experiences.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-teal-500">Experience</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['experiences'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-yellow-500">Messages</span>
            <div class="text-2xl font-extrabold mt-1 text-gray-900 dark:text-gray-100">{{ $stats['messages'] ?? 0 }}</div>
        </a>

        <a href="{{ route('admin.messages.index') }}" class="p-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-indigo-500 transition shadow-sm block">
            <span class="text-xs uppercase font-bold text-red-500">Unread</span>
            <div class="text-2xl font-extrabold mt-1 text-red-600 dark:text-red-400">{{ $stats['unread_messages'] ?? 0 }}</div>
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 shadow-sm">
        <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Quick Actions</h2>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.profile.edit') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow transition">
                Edit Bio & Profile
            </a>
            <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Project
            </a>
            <a href="{{ route('admin.qualifications.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Academic Qualification
            </a>
            <a href="{{ route('admin.achievements.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Award / Achievement
            </a>
            <a href="{{ route('admin.skills.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Skill
            </a>
            <a href="{{ route('admin.publications.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Publication
            </a>
            <a href="{{ route('admin.experiences.create') }}" class="px-4 py-2.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-semibold rounded-xl transition">
                + Add Experience
            </a>
                + Add Experience
            </a>
        </div>
    </div>

    <!-- Recent Contact Messages -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-900 dark:text-gray-100">Recent Inquiries</h2>
            <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">View All &rarr;</a>
        </div>

        <div class="divide-y divide-gray-100 dark:divide-gray-700">
            @forelse($recentMessages as $msg)
            <div class="py-3.5 flex items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-sm text-gray-900 dark:text-gray-100">{{ $msg->name }}</span>
                        @if(!$msg->is_read)
                        <span class="px-2 py-0.5 bg-red-100 text-red-600 dark:bg-red-900/40 dark:text-red-300 text-xs rounded-full font-bold">NEW</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $msg->email }} &bull; {{ $msg->created_at->diffForHumans() }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-1 mt-1">{{ $msg->subject ?? $msg->body }}</p>
                </div>
                <a href="{{ route('admin.messages.show', $msg) }}" class="px-3 py-1.5 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-xs font-semibold rounded-lg transition">
                    View
                </a>
            </div>
            @empty
            <p class="text-gray-400 text-sm py-4">No contact messages received yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
