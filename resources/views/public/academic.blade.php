@extends('layouts.public')
@section('title', 'Academic Qualifications & Achievements')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#090d16] transition-colors duration-300 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold mb-4">
                <span>🎓</span>
                <span>Education & Honors</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-white tracking-tight">
                Academic Qualifications & Awards
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Verified educational milestones spanning university, college, and school alongside distinguished honors and awards
            </p>
        </div>

        <!-- Section 1: Academic Qualifications (School, College, University) -->
        <div class="mb-20">
            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-slate-200 dark:border-slate-800" data-aos="fade-up">
                <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-lg flex-shrink-0">
                    🎓
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Educational Qualifications</h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">Formal academic background with institutions, study focus, and results</p>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                @forelse($qualifications as $qual)
                <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between transition-all duration-300 hover:border-slate-300 dark:hover:border-slate-700" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div>
                        <!-- Top Row: Level Pill & Duration -->
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-md uppercase tracking-wider
                                @if($qual->level == 'University') bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700
                                @elseif($qual->level == 'College') bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700
                                @else bg-slate-100 text-slate-800 dark:bg-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700 @endif">
                                {{ $qual->level ?? 'Academic' }}
                            </span>
                            <span class="text-xs font-mono text-slate-500 dark:text-slate-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $qual->duration }}</span>
                            </span>
                        </div>

                        <!-- Degree Title -->
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1.5 leading-snug">
                            {{ $qual->degree }}
                        </h3>

                        <!-- Institution -->
                        <p class="text-sm font-semibold text-indigo-600 dark:text-indigo-400 mb-3 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            <span>{{ $qual->institution }}</span>
                        </p>

                        @if($qual->field_of_study)
                        <div class="mb-3 text-xs text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-800/60 px-2.5 py-1 rounded-md border border-slate-200 dark:border-slate-700">
                            <span class="text-slate-400">Discipline:</span> {{ $qual->field_of_study }}
                        </div>
                        @endif

                        @if($qual->description)
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            {{ $qual->description }}
                        </p>
                        @endif
                    </div>

                    <!-- Result Badge (Bottom pinned) -->
                    <div class="pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Result / Grade</span>
                        <span class="px-2.5 py-1 rounded-md bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300 font-bold text-xs flex items-center gap-1 font-mono">
                            <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span>{{ $qual->result }}</span>
                        </span>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-16 bg-white dark:bg-[#0f172a] rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <p class="text-slate-500 dark:text-slate-400 text-sm">No academic qualifications listed yet.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Section 2: Awards & Achievements -->
        <div>
            <div class="flex items-center gap-3 mb-8 pb-4 border-b border-slate-200 dark:border-slate-800" data-aos="fade-up">
                <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-lg flex-shrink-0">
                    🏆
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white tracking-tight">Honors, Awards & Achievements</h2>
                    <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">Competitive hackathons, academic merit, research recognition, and leadership prizes</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                @forelse($achievements as $award)
                <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between transition-all duration-300 hover:border-slate-300 dark:hover:border-slate-700" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                    <div>
                        <div class="flex items-start justify-between gap-4 mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-2xl flex-shrink-0">
                                    {{ $award->icon ?? '🏆' }}
                                </div>
                                <div>
                                    <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                        {{ $award->category }}
                                    </span>
                                    <h3 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white mt-1 leading-snug">
                                        {{ $award->title }}
                                    </h3>
                                </div>
                            </div>
                            <span class="text-xs font-mono font-semibold text-slate-500 dark:text-slate-400 px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 whitespace-nowrap">
                                {{ $award->year }}
                            </span>
                        </div>

                        <!-- Organization / Issuer -->
                        <div class="flex items-center gap-1.5 text-xs text-slate-600 dark:text-slate-400 mb-3 bg-slate-50 dark:bg-slate-800/60 px-3 py-1 rounded-md border border-slate-200 dark:border-slate-700 inline-flex">
                            <span class="font-semibold text-slate-700 dark:text-slate-300">Issued by:</span>
                            <span>{{ $award->issuer }}</span>
                        </div>

                        <!-- Description -->
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-4">
                            {{ $award->description }}
                        </p>
                    </div>

                    @if($award->link)
                    <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex justify-end">
                        <a href="{{ $award->link }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline transition">
                            <span>View Proof / Certificate</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-2 text-center py-16 bg-white dark:bg-[#0f172a] rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                    <p class="text-slate-500 dark:text-slate-400 text-sm">No awards or achievements added yet.</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="mt-20 p-8 sm:p-10 rounded-2xl bg-slate-900 dark:bg-[#0f172a] border border-slate-800 text-white shadow-sm flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
            <div>
                <h3 class="text-xl sm:text-2xl font-bold mb-1.5 tracking-tight text-white">Need verification or research references?</h3>
                <p class="text-slate-400 text-xs sm:text-sm max-w-xl">Download my verified curriculum vitae or get in touch for collaborative research or software engineering positions.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('cv.download') }}" target="_blank" class="px-5 py-2.5 bg-white hover:bg-slate-100 text-slate-900 font-semibold text-xs sm:text-sm rounded-xl transition shadow flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Download CV</span>
                </a>
                <a href="{{ route('contact') }}" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold text-xs sm:text-sm rounded-xl transition border border-slate-700 cursor-pointer">
                    Contact Me
                </a>
            </div>
        </div>
    </div>
</section>
@endsection