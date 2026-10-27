@extends('layouts.admin')
@section('title', 'View Message')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Message from {{ $message->name }}</h1>
        <a href="{{ route('admin.messages.index') }}" class="text-sm text-gray-500 hover:text-gray-700">&larr; Back to Inbox</a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        <div class="flex flex-wrap items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-4 gap-4">
            <div>
                <div class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $message->name }}</div>
                <a href="mailto:{{ $message->email }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">{{ $message->email }}</a>
            </div>
            <div class="text-xs text-gray-400">
                Received {{ $message->created_at->format('M d, Y h:i A') }} ({{ $message->created_at->diffForHumans() }})
            </div>
        </div>

        @if($message->subject)
        <div>
            <span class="text-xs uppercase tracking-wider text-gray-400 font-bold block mb-1">Subject</span>
            <div class="text-base font-semibold text-gray-800 dark:text-gray-200">{{ $message->subject }}</div>
        </div>
        @endif

        <div>
            <span class="text-xs uppercase tracking-wider text-gray-400 font-bold block mb-2">Message Content</span>
            <div class="p-5 rounded-xl bg-gray-50 dark:bg-gray-700/50 text-gray-800 dark:text-gray-200 text-sm whitespace-pre-wrap leading-relaxed border border-gray-100 dark:border-gray-700">
                {{ $message->body }}
            </div>
        </div>

        <div class="pt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?? 'Your Inquiry') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl text-sm shadow transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Reply via Email
            </a>

            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-xl text-sm font-semibold transition">
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
