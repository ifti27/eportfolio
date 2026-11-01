@extends('layouts.public')
@section('title', 'Work Experience')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#090d16] transition-colors duration-300 relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold mb-4">
                <span>⚡</span>
                <span>Career Trajectory</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-white tracking-tight">
                Work Experience
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Milestones, industry leadership, engineering contributions, and core achievements
            </p>
        </div>

        <!-- Vertical Timeline Container -->
        <div class="relative">
            <!-- Timeline Central Track Line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-slate-200 dark:bg-slate-800 transform md:-translate-x-1/2"></div>

            @forelse($experiences as $exp)
            <div class="relative flex items-start mb-12 {{ $loop->index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <!-- Timeline Node -->
                <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 z-20 top-6">
                    @if($exp->is_current)
                        <div class="relative flex items-center justify-center">
                            <span class="animate-ping absolute inline-flex h-6 w-6 rounded-full bg-emerald-400 opacity-60"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-emerald-500 border-2 border-white dark:border-[#090d16]"></span>
                        </div>
                    @else
                        <div class="relative flex items-center justify-center">
                            <span class="inline-flex rounded-full h-3.5 w-3.5 bg-slate-400 dark:bg-slate-600 border-2 border-white dark:border-[#090d16]"></span>
                        </div>
                    @endif
                </div>

                <!-- Timeline Content Card -->
                <div class="ml-10 md:ml-0 md:w-1/2 {{ $loop->index % 2 === 0 ? 'md:pr-10' : 'md:pl-10' }} w-full">
                    <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 shadow-sm border border-slate-200 dark:border-slate-800 transition-all duration-300 hover:border-slate-300 dark:hover:border-slate-700">
                        <!-- Top Header Row: Duration & Current Badge -->
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 font-mono flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $exp->start_date ? $exp->start_date->format('M Y') : '' }} &mdash; {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}</span>
                            </span>

                            @if($exp->is_current)
                            <span class="px-2.5 py-0.5 bg-emerald-50 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 text-xs rounded-md font-bold flex items-center gap-1.5 border border-emerald-200 dark:border-emerald-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>CURRENT</span>
                            </span>
                            @endif
                        </div>

                        <!-- Position Title -->
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white">
                            {{ $exp->position }}
                        </h3>

                        <!-- Company & Location -->
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 mb-4">
                            <p class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 flex items-center gap-1.5">
                                <span>{{ $exp->company }}</span>
                            </p>
                            @if($exp->location)
                            <p class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $exp->location }}</span>
                            </p>
                            @endif
                        </div>

                        <!-- Responsibilities Bullet Points -->
                        @if($exp->description)
                        <div class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm space-y-2 leading-relaxed pt-3 border-t border-slate-100 dark:border-slate-800">
                            @foreach(explode("\n", $exp->description) as $line)
                                @if(trim($line))
                                <div class="flex items-start gap-2">
                                    <span class="text-slate-400 dark:text-slate-500 mt-0.5 flex-shrink-0">&bull;</span>
                                    <span>{{ ltrim(trim($line), '•- ') }}</span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white dark:bg-[#0f172a] rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 text-xl">⚡</div>
                <h3 class="text-base font-bold text-slate-800 dark:text-slate-200 mb-1">No Experience Entries Yet</h3>
                <p class="text-slate-500 text-sm">Professional roles and milestones will appear here.</p>
            </div>
            @endforelse
        </div>

        <!-- Academic Qualifications & Achievements Callout Banner -->
        <div class="mt-16 p-6 sm:p-8 rounded-2xl bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-2xl flex-shrink-0">
                    🎓
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white">Academic Qualifications & Honors</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mt-0.5">Explore formal degrees across school, college, and university with verified achievements</p>
                </div>
            </div>
            
            <a href="{{ route('academic') }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white font-semibold text-xs sm:text-sm rounded-xl transition flex items-center gap-2 whitespace-nowrap cursor-pointer">
                <span>Explore Academic & Awards</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection