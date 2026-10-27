@extends('layouts.public')
@section('title', 'Academic Qualifications & Achievements')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#080c15] transition-colors duration-300 relative overflow-hidden">
    <!-- Ambient glowing backdrop orbs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute w-96 h-96 bg-indigo-500/10 dark:bg-indigo-500/15 rounded-full blur-3xl -top-20 -right-20 animate-pulse-slow"></div>
        <div class="absolute w-96 h-96 bg-purple-500/10 dark:bg-purple-500/15 rounded-full blur-3xl bottom-20 -left-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                <span>🎓</span>
                <span>Education & Honors</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Academic <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Qualifications & Awards</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Verified educational milestones spanning university, college, and school alongside distinguished honors and awards
            </p>
        </div>

        <!-- Section 1: Academic Qualifications (School, College, University) -->
        <div class="mb-24">
            <div class="flex items-center gap-3.5 mb-10 pb-4 border-b border-slate-200/80 dark:border-slate-800/80" data-aos="fade-up">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 text-white flex items-center justify-center font-black text-xl shadow-lg shadow-indigo-500/25 flex-shrink-0">
                    🎓
                </div>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight">Educational Qualifications</h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">Formal academic background with institutions, study focus, and results</p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($qualifications as $qual)
                <div class="group card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-7 sm:p-8 border border-slate-200/80 dark:border-slate-800/80 shadow-sm flex flex-col justify-between relative overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <!-- Corner ambient glow based on level -->
                    <div class="absolute -top-12 -right-12 w-28 h-28 rounded-full blur-2xl pointer-events-none
                        @if($qual->level == 'University') bg-purple-500/15
                        @elseif($qual->level == 'College') bg-blue-500/15
                        @else bg-emerald-500/15 @endif"></div>

                    <div>
                        <!-- Top Row: Level Pill & Duration -->
                        <div class="flex justify-between items-center mb-6">
                            <span class="px-3.5 py-1 text-xs font-black rounded-full uppercase tracking-wider shadow-sm
                                @if($qual->level == 'University') bg-purple-50 text-purple-700 dark:bg-purple-950/70 dark:text-purple-300 border border-purple-200 dark:border-purple-800
                                @elseif($qual->level == 'College') bg-blue-50 text-blue-700 dark:bg-blue-950/70 dark:text-blue-300 border border-blue-200 dark:border-blue-800
                                @else bg-emerald-50 text-emerald-700 dark:bg-emerald-950/70 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 @endif">
                                {{ $qual->level ?? 'Academic' }}
                            </span>
                            <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $qual->duration }}</span>
                            </span>
                        </div>

                        <!-- Degree Title -->
                        <h3 class="text-xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors mb-2 leading-snug">
                            {{ $qual->degree }}
                        </h3>

                        <!-- Institution -->
                        <p class="text-sm font-bold text-indigo-600 dark:text-indigo-400 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $qual->institution }}</span>
                        </p>

                        @if($qual->field_of_study)
                        <div class="mb-4 text-xs text-slate-600 dark:text-slate-300 font-semibold bg-slate-50 dark:bg-[#0c1222] px-3 py-1.5 rounded-xl border border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-normal">Discipline:</span> {{ $qual->field_of_study }}
                        </div>
                        @endif

                        @if($qual->description)
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                            {{ $qual->description }}
                        </p>
                        @endif
                    </div>

                    <!-- Result Badge (Bottom pinned) -->
                    <div class="pt-5 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Result / Grade</span>
                        <span class="px-3.5 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 dark:text-emerald-300 font-black text-sm flex items-center gap-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span>{{ $qual->result }}</span>
                        </span>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-16 bg-white dark:bg-[#0f172a] rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <p class="text-slate-500 dark:text-slate-400 text-base">No academic qualifications listed yet.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Section 2: Awards & Achievements -->
        <div>
            <div class="flex items-center gap-3.5 mb-10 pb-4 border-b border-slate-200/80 dark:border-slate-800/80" data-aos="fade-up">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-500 via-orange-500 to-yellow-500 text-white flex items-center justify-center font-black text-xl shadow-lg shadow-amber-500/25 flex-shrink-0">
                    🏆
                </div>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight">Honors, Awards & Achievements</h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">Competitive hackathons, academic merit, research recognition, and leadership prizes</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @forelse($achievements as $award)
                <div class="group card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-7 sm:p-8 border border-slate-200/80 dark:border-slate-800/80 shadow-sm flex flex-col justify-between relative overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <!-- Corner ambient glow on hover -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-amber-500/10 group-hover:bg-amber-500/20 rounded-full blur-2xl transition-all"></div>

                    <div>
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-amber-50 dark:bg-amber-950/50 border border-amber-200/70 dark:border-amber-800/70 flex items-center justify-center text-3xl shadow-sm flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                    {{ $award->icon ?? '🏆' }}
                                </div>
                                <div>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-700 dark:text-amber-300 border border-amber-500/25 shadow-sm">
                                        {{ $award->category }}
                                    </span>
                                    <h3 class="text-lg sm:text-xl font-extrabold text-slate-900 dark:text-slate-100 mt-2 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors leading-snug">
                                        {{ $award->title }}
                                    </h3>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-slate-500 dark:text-slate-400 px-3 py-1 rounded-xl bg-slate-100 dark:bg-slate-800/80 whitespace-nowrap shadow-sm">
                                {{ $award->year }}
                            </span>
                        </div>

                        <!-- Organization / Issuer -->
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-600 dark:text-slate-300 mb-3 bg-slate-50 dark:bg-[#0c1222] px-3.5 py-1.5 rounded-xl border border-slate-200/50 dark:border-slate-800 inline-flex">
                            <span class="text-amber-500 font-extrabold">Issued by:</span>
                            <span>{{ $award->issuer }}</span>
                        </div>

                        <!-- Description -->
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            {{ $award->description }}
                        </p>
                    </div>

                    @if($award->link)
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800/80 flex justify-end">
                        <a href="{{ $award->link }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition">
                            <span>View Proof / Certificate</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-2 text-center py-16 bg-white dark:bg-[#0f172a] rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <p class="text-slate-500 dark:text-slate-400 text-base">No awards or achievements added yet.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="mt-20 p-8 sm:p-12 rounded-3xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white shadow-2xl shadow-indigo-500/25 flex flex-col md:flex-row items-center justify-between gap-6" data-aos="zoom-in">
            <div>
                <h3 class="text-2xl sm:text-3xl font-black mb-2 tracking-tight">Need verification or research references?</h3>
                <p class="text-indigo-100 text-sm sm:text-base max-w-xl font-normal">Download my verified curriculum vitae or get in touch for collaborative research or software engineering positions.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3.5">
                <a href="{{ route('cv.download') }}" target="_blank" class="px-7 py-3.5 bg-white hover:bg-slate-100 text-indigo-900 font-bold text-xs sm:text-sm rounded-2xl transition shadow-lg flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Download Full CV</span>
                </a>
                <a href="{{ route('contact') }}" class="px-7 py-3.5 bg-indigo-950/60 hover:bg-indigo-950/80 text-white font-bold text-xs sm:text-sm rounded-2xl transition border border-white/20 backdrop-blur-sm cursor-pointer">
                    Contact Me
                </a>
            </div>
        </div>
    </div>
</section>
@endsection