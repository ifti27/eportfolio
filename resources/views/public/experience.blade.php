@extends('layouts.public')
@section('title', 'Work Experience')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#080c15] transition-colors duration-300 relative overflow-hidden">
    <!-- Ambient glowing backdrop orbs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute w-96 h-96 bg-indigo-500/10 dark:bg-indigo-500/15 rounded-full blur-3xl -top-20 -right-20 animate-pulse-slow"></div>
        <div class="absolute w-96 h-96 bg-purple-500/10 dark:bg-purple-500/15 rounded-full blur-3xl bottom-20 -left-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                <span>⚡</span>
                <span>Career Trajectory</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Work <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Experience</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Milestones, industry leadership, engineering contributions, and core achievements
            </p>
        </div>

        <!-- Vertical Timeline Container -->
        <div class="relative">
            <!-- Timeline Central Track Line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-indigo-500 via-purple-500 to-indigo-500 transform md:-translate-x-1/2 rounded-full opacity-60"></div>

            @forelse($experiences as $exp)
            <div class="relative flex items-start mb-14 {{ $loop->index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}" data-aos="{{ $loop->index % 2 === 0 ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ $loop->index * 70 }}">
                <!-- Animated Timeline Node / Radar Ping -->
                <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 z-20 top-6">
                    @if($exp->is_current)
                        <div class="relative flex items-center justify-center">
                            <span class="animate-ping absolute inline-flex h-8 w-8 rounded-full bg-emerald-400 opacity-60"></span>
                            <span class="relative inline-flex rounded-full h-6 w-6 bg-emerald-500 border-4 border-white dark:border-[#080c15] shadow-lg shadow-emerald-500/50"></span>
                        </div>
                    @else
                        <div class="relative flex items-center justify-center">
                            <span class="inline-flex rounded-full h-5 w-5 bg-gradient-to-tr from-indigo-600 to-purple-600 border-3 border-white dark:border-[#080c15] shadow-md shadow-indigo-500/40"></span>
                        </div>
                    @endif
                </div>

                <!-- Timeline Content Card -->
                <div class="ml-12 md:ml-0 md:w-1/2 {{ $loop->index % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }} w-full">
                    <div class="card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/80 dark:border-slate-800/80 relative overflow-hidden group">
                        <!-- Top Header Row: Duration & Current Badge -->
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <span class="text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $exp->start_date ? $exp->start_date->format('M Y') : '' }} &mdash; {{ $exp->is_current ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : 'N/A') }}</span>
                            </span>

                            @if($exp->is_current)
                            <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-950/70 text-emerald-700 dark:text-emerald-300 text-xs rounded-full font-black flex items-center gap-1.5 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span>CURRENT ROLE</span>
                            </span>
                            @endif
                        </div>

                        <!-- Position Title -->
                        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                            {{ $exp->position }}
                        </h3>

                        <!-- Company & Location -->
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 mb-4">
                            <p class="text-sm font-bold text-indigo-600 dark:text-indigo-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <span>{{ $exp->company }}</span>
                            </p>
                            @if($exp->location)
                            <p class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>{{ $exp->location }}</span>
                            </p>
                            @endif
                        </div>

                        <!-- Responsibilities Bullet Points -->
                        @if($exp->description)
                        <div class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm space-y-2 leading-relaxed pt-3 border-t border-slate-100 dark:border-slate-800/80">
                            @foreach(explode("\n", $exp->description) as $line)
                                @if(trim($line))
                                <div class="flex items-start gap-2.5">
                                    <span class="text-indigo-500 font-black mt-0.5 flex-shrink-0">&rsaquo;</span>
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
            <div class="text-center py-20 bg-white dark:bg-[#0f172a] rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl">⚡</div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-1">No Experience Entries Yet</h3>
                <p class="text-slate-500 text-sm">Professional roles and milestones will appear here.</p>
            </div>
            @endforelse
        </div>

        <!-- Academic Qualifications & Achievements Callout Banner -->
        <div class="mt-20 p-8 sm:p-10 rounded-3xl bg-white dark:bg-[#0f172a] border border-slate-200/80 dark:border-slate-800/80 shadow-xl flex flex-col sm:flex-row items-center justify-between gap-6 relative overflow-hidden" data-aos="fade-up">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-2xl"></div>

            <div class="flex items-center gap-5 relative z-10">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 text-white flex items-center justify-center text-3xl shadow-lg shadow-indigo-500/25 flex-shrink-0">
                    🎓
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-slate-100">Academic Qualifications & Honors</h3>
                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 mt-0.5">Explore formal degrees across school, college, and university with verified achievements</p>
                </div>
            </div>
            
            <a href="{{ route('academic') }}" class="btn-shimmer px-7 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold text-xs sm:text-sm rounded-2xl transition shadow-lg shadow-indigo-500/25 flex items-center gap-2 whitespace-nowrap relative z-10 cursor-pointer">
                <span>Explore Academic & Awards</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection