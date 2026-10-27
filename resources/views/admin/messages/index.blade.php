@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Contact Inbox</h1>
        <p class="text-gray-500 text-sm mt-1">Review inquiries and messages submitted via your portfolio's contact form</p>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3.5">Status</th>
                    <th class="px-6 py-3.5">Sender</th>
                    <th class="px-6 py-3.5">Subject / Preview</th>
                    <th class="px-6 py-3.5">Date</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-gray-700 dark:text-gray-200">
                @forelse($messages as $msg)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 {{ !$msg->is_read ? 'bg-indigo-50/40 dark:bg-indigo-900/10 font-semibold' : '' }}">
                    <td class="px-6 py-4">
                        @if(!$msg->is_read)
                        <span class="px-2 py-0.5 bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300 text-xs rounded-full font-bold">NEW</span>
                        @else
                        <span class="px-2 py-0.5 bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-400 text-xs rounded-full">Read</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-900 dark:text-gray-100 font-bold">{{ $msg->name }}</div>
                        <div class="text-xs text-gray-400 font-normal">{{ $msg->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-xs text-gray-600 dark:text-gray-300">
                        <span class="font-medium text-gray-900 dark:text-gray-100">{{ $msg->subject ?? 'No Subject' }}:</span>
                        <span class="text-gray-400 font-normal">{{ Str::limit($msg->body, 50) }}</span>
                    </td>
                    <td class="px-6 py-4 text-xs text-gray-500 whitespace-nowrap">{{ $msg->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4 text-right space-x-2 whitespace-nowrap">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 text-xs font-semibold">View</a>
                        <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 text-xs font-semibold">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No contact messages received yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
