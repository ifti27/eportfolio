@extends('layouts.public')
@section('title', 'Home')

@section('content')
<!-- Hero Section: Clean, Minimalist & Focused -->
<section class="min-h-[85vh] flex items-center justify-center relative pt-12 pb-20 bg-slate-50 dark:bg-[#090d16] bg-grid-pattern transition-colors">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
            <!-- Professional Clean Avatar -->
            <div class="flex-shrink-0" data-aos="fade-up">
                <div class="relative">
                    <div class="w-48 h-48 sm:w-56 sm:h-56 md:w-64 md:h-64 rounded-2xl overflow-hidden border-2 border-slate-200 dark:border-slate-800 ring-4 ring-slate-100 dark:ring-slate-900/80 bg-white dark:bg-slate-900 shadow-lg">
                        @if($profile && $profile->avatar)
                            <img src="{{ asset('storage/' . $profile->avatar) }}" 
                                 alt="{{ $profile->name }}" 
                                 class="w-full h-full object-cover"
                                 loading="eager"
                                 onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-slate-900 dark:bg-slate-800 flex items-center justify-center text-6xl font-bold text-white\'>{{ substr($profile->name ?? 'P', 0, 1) }}</div>';">
                        @else
                            <div class="w-full h-full bg-slate-900 dark:bg-slate-800 flex items-center justify-center">
                                <span class="text-6xl md:text-7xl text-white font-bold">{{ substr($profile->name ?? 'P', 0, 1) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Clean Available Status Tag -->
                    <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 whitespace-nowrap px-3 py-1 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-full shadow-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-xs font-medium text-slate-700 dark:text-slate-300">Available for hire</span>
                    </div>
                </div>
            </div>

            <!-- Hero Intro & Bio -->
            <div class="text-center lg:text-left flex-1" data-aos="fade-up" data-aos-delay="100">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold mb-4">
                    <span>{{ $profile->title ?? 'Software Engineer & IoT Specialist' }}</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-slate-900 dark:text-white mb-3 tracking-tight">
                    {{ $profile->name ?? 'Your Name' }}
                </h1>
                
                <!-- Dynamic Role Text -->
                <div class="text-lg sm:text-xl text-slate-600 dark:text-slate-400 mb-5 min-h-[2rem] flex items-center justify-center lg:justify-start font-medium">
                    <span class="text-slate-500 dark:text-slate-500 mr-2">Focusing on</span>
                    @php
                        $typingTitles = (!empty($profile->typing_titles) && is_array($profile->typing_titles))
                            ? $profile->typing_titles
                            : [
                                $profile->title ?? 'Full Stack Development',
                                'Software Architecture',
                                'Machine Learning Systems',
                                'Embedded IoT Solutions'
                            ];
                    @endphp
                    <span id="typingText" class="text-indigo-600 dark:text-indigo-400 font-semibold" data-titles='@json($typingTitles)'></span>
                    <span class="typing-cursor text-slate-400 text-xl font-light ml-0.5">|</span>
                </div>
                
                <p class="text-slate-600 dark:text-slate-300 max-w-2xl text-base sm:text-lg mb-8 leading-relaxed">
                    {{ $profile->bio ?? 'Passionate software engineer building robust distributed web platforms, machine learning pipelines, and connected IoT hardware architectures.' }}
                </p>

                <!-- Clean CTA Action Buttons -->
                <div class="flex flex-wrap gap-3 justify-center lg:justify-start items-center">
                    <a href="{{ route('contact') }}" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 dark:bg-indigo-600 dark:hover:bg-indigo-700 text-white font-semibold rounded-xl transition shadow-sm text-sm flex items-center gap-2 cursor-pointer">
                        <span>Get In Touch</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <a href="{{ route('projects') }}" class="px-6 py-3 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-800 dark:text-slate-200 font-semibold rounded-xl border border-slate-200 dark:border-slate-700 transition shadow-sm text-sm cursor-pointer">
                        View Projects
                    </a>

                    <!-- Download CV Button -->
                    <a href="{{ route('cv.download') }}" target="_blank" class="px-5 py-3 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-semibold rounded-xl border border-slate-200 dark:border-slate-700 transition flex items-center gap-2 text-sm cursor-pointer">
                        <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Download CV</span>
                    </a>
                </div>

                <!-- Professional Social Links -->
                <div class="flex gap-3 mt-8 justify-center lg:justify-start items-center">
                    <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Profiles:</span>
                    @if($profile->github_url ?? false)
                    <a href="{{ $profile->github_url }}" target="_blank" class="p-2 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition flex items-center gap-1.5 text-xs font-medium shadow-sm" title="GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        <span>GitHub</span>
                    </a>
                    @endif
                    @if($profile->linkedin_url ?? false)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="p-2 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition flex items-center gap-1.5 text-xs font-medium shadow-sm" title="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        <span>LinkedIn</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clean Stats Overview Section -->
<section id="stats" class="py-14 bg-white dark:bg-[#0c111d] border-y border-slate-200 dark:border-slate-800/80 stats-section transition-colors">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
            <!-- Stat 1: Projects Built -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white counter tracking-tight font-mono" data-target="{{ $stats['projects'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-1 text-slate-600 dark:text-slate-400 font-medium text-xs sm:text-sm">Projects Built</p>
            </div>

            <!-- Stat 2: Technologies -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="50">
                <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white counter tracking-tight font-mono" data-target="{{ $stats['skills'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-1 text-slate-600 dark:text-slate-400 font-medium text-xs sm:text-sm">Technologies</p>
            </div>

            <!-- Stat 3: Honors & Awards -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white counter tracking-tight font-mono" data-target="{{ $stats['awards'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-1 text-slate-600 dark:text-slate-400 font-medium text-xs sm:text-sm">Honors & Awards</p>
            </div>

            <!-- Stat 4: Publications -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="150">
                <div class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white counter tracking-tight font-mono" data-target="{{ $stats['publications'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-1 text-slate-600 dark:text-slate-400 font-medium text-xs sm:text-sm">Publications</p>
            </div>
        </div>
    </div>
</section>

<!-- Grouped Skills Section: Clean Badges & Structured Taxonomy (NO percentage bars) -->
<section class="py-20 bg-slate-50 dark:bg-[#090d16] transition-colors" id="skills">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Technical Skills & Tools
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base mt-1">
                    Specialized proficiencies organized by functional discipline
                </p>
            </div>

            <!-- Category Filter Tabs -->
            <div class="flex flex-wrap gap-2 mt-4 md:mt-0">
                <button class="skill-group-filter active px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-900 dark:bg-white text-white dark:text-slate-900 transition cursor-pointer" data-target="all">
                    All
                </button>
                <button class="skill-group-filter px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 hover:border-slate-400 transition cursor-pointer" data-target="Languages">
                    Languages
                </button>
                <button class="skill-group-filter px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 hover:border-slate-400 transition cursor-pointer" data-target="Web Tools">
                    Web Tools
                </button>
                <button class="skill-group-filter px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 hover:border-slate-400 transition cursor-pointer" data-target="AI / ML">
                    AI / ML
                </button>
                <button class="skill-group-filter px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 hover:border-slate-400 transition cursor-pointer" data-target="Database">
                    Database
                </button>
            </div>
        </div>

        <!-- 4 Specialized Group Cards Grid (Clean Chips, NO percentage bars) -->
        <div class="grid md:grid-cols-2 gap-6" id="skillsCardsContainer">
            @php
                $categoryIcons = [
                    'Languages' => '💻',
                    'Web Tools' => '🌐',
                    'AI / ML' => '🧠',
                    'Database' => '🗄️',
                ];
            @endphp

            @foreach($skillsGrouped as $categoryName => $catSkills)
            <div class="skill-category-card clean-card bg-white dark:bg-[#0f172a] rounded-2xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm" data-category="{{ $categoryName }}" data-aos="fade-up">
                <!-- Group Header -->
                <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100 dark:border-slate-800">
                    <div class="flex items-center gap-2.5">
                        <span class="text-xl">{{ $categoryIcons[$categoryName] ?? '⚡' }}</span>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white">
                            {{ $categoryName }}
                        </h3>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400 font-mono">
                        {{ $catSkills->count() }} items
                    </span>
                </div>

                <!-- Clean Skill Badges / Tags -->
                <div class="flex flex-wrap gap-2">
                    @foreach($catSkills as $skill)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-50 dark:bg-slate-800/80 text-slate-800 dark:text-slate-200 text-xs sm:text-sm font-medium border border-slate-200/80 dark:border-slate-700/80 hover:border-slate-400 dark:hover:border-slate-500 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400 dark:bg-slate-500"></span>
                        <span>{{ $skill->name }}</span>
                    </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Academic Qualifications & Achievements Preview -->
<section class="py-20 bg-white dark:bg-[#0c111d] border-t border-slate-200 dark:border-slate-800 transition-colors">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Education & Distinctions
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base mt-1">
                    Academic qualifications and competitive honors
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('academic') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                    <span>View All Academic & Awards</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Academic Qualifications Preview (7 cols) -->
            <div class="lg:col-span-7 space-y-3" data-aos="fade-right">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">
                    Academic Degrees
                </h3>

                @forelse($qualifications->take(3) as $qual)
                <div class="p-4 sm:p-5 rounded-xl bg-slate-50 dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3 clean-card">
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-bold text-sm text-slate-900 dark:text-white">{{ $qual->degree }}</h4>
                            <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">{{ $qual->level }}</span>
                        </div>
                        <p class="text-xs text-slate-600 dark:text-slate-400 mt-0.5">{{ $qual->institution }}</p>
                        <span class="text-xs text-slate-400 font-mono">{{ $qual->duration }}</span>
                    </div>
                    <div class="flex sm:flex-col items-center sm:items-end justify-between border-t sm:border-t-0 pt-2 sm:pt-0 border-slate-200 dark:border-slate-800">
                        <span class="text-[10px] uppercase font-semibold text-slate-400">Result</span>
                        <span class="px-2.5 py-0.5 rounded bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300 font-bold text-xs">
                            {{ $qual->result }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-500">No qualifications listed yet.</p>
                @endforelse
            </div>

            <!-- Co-Curricular & Honors Preview (5 cols) -->
            <div class="lg:col-span-5 space-y-3" data-aos="fade-left">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">
                    Honors & Co-Curricular
                </h3>

                <div class="bg-slate-50 dark:bg-[#0f172a] rounded-xl p-5 border border-slate-200 dark:border-slate-800 space-y-4">
                    @if($achievements->count())
                    <div class="p-3.5 rounded-lg bg-white dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h4 class="font-bold text-sm text-slate-900 dark:text-white">{{ $achievements->first()->title }}</h4>
                            <span class="text-xs text-slate-400 font-mono">{{ $achievements->first()->year }}</span>
                        </div>
                        <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed">{{ $achievements->first()->description }}</p>
                        <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400 mt-1.5 block">{{ $achievements->first()->issuer }}</span>
                    </div>
                    @endif

                    <div>
                        <h5 class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">
                            Co-Curricular Activities
                        </h5>
                        <div class="space-y-1.5">
                            @if($profile && !empty($profile->co_curricular))
                                @foreach(array_slice(explode("\n", $profile->co_curricular), 0, 3) as $act)
                                    @if(trim($act))
                                    <div class="text-xs text-slate-600 dark:text-slate-300 flex items-start gap-2">
                                        <span class="text-slate-400 font-bold">•</span>
                                        <span>{{ ltrim(trim($act), '•- ') }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="text-xs text-slate-600 dark:text-slate-400 flex items-start gap-2">
                                    <span class="text-slate-400 font-bold">•</span>
                                    <span>Active hackathon participant and technical mentor</span>
                                </div>
                                <div class="text-xs text-slate-600 dark:text-slate-400 flex items-start gap-2">
                                    <span class="text-slate-400 font-bold">•</span>
                                    <span>Open-source contributor & workshop organizer</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-200 dark:border-slate-800 flex justify-between items-center text-xs">
                        <span class="text-slate-400">Total Awards: {{ $achievements->count() }}</span>
                        <a href="{{ route('academic') }}" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                            View all &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Showcase -->
@if(isset($featuredProjects) && $featuredProjects->count())
<section class="py-20 bg-slate-50 dark:bg-[#090d16] border-t border-slate-200 dark:border-slate-800 transition-colors">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Featured Projects
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base mt-1">Selected software platforms and IoT systems</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('projects') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                    <span>View all projects &rarr;</span>
                </a>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredProjects as $project)
            <div class="clean-card bg-white dark:bg-[#0f172a] rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between" data-aos="fade-up">
                <div>
                    <!-- Project Thumbnail -->
                    <div class="h-48 bg-slate-100 dark:bg-slate-800 relative overflow-hidden border-b border-slate-200/60 dark:border-slate-800">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 dark:text-slate-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                        @endif

                        <div class="absolute top-3 right-3">
                            <span class="px-2.5 py-1 bg-slate-900/80 text-white text-[11px] font-semibold rounded-md backdrop-blur-sm">{{ $project->category ?? 'Software' }}</span>
                        </div>
                    </div>

                    <!-- Project Info -->
                    <div class="p-5">
                        <h3 class="text-lg font-bold mb-2 text-slate-900 dark:text-white">{{ $project->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm mb-4 line-clamp-3 leading-relaxed">{{ $project->description }}</p>
                        
                        <div class="flex flex-wrap gap-1.5 mb-2">
                            @foreach(explode(',', $project->tech_stack ?? '') as $tech)
                                @if(trim($tech))
                                <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs rounded font-medium border border-slate-200 dark:border-slate-700">{{ trim($tech) }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Card Footer Links -->
                <div class="px-5 pb-5 pt-0 flex gap-4 border-t border-slate-100 dark:border-slate-800 mt-2 pt-3">
                    @if($project->live_url)
                    <a href="{{ $project->live_url }}" target="_blank" class="text-xs sm:text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-semibold flex items-center gap-1">
                        <span>Live Demo</span>
                        <span>&rarr;</span>
                    </a>
                    @endif
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white font-medium">
                        Repository
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Skill Group Switcher Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.skill-group-filter');
    const skillCards = document.querySelectorAll('.skill-category-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => {
                b.classList.remove('active', 'bg-slate-900', 'dark:bg-white', 'text-white', 'dark:text-slate-900');
                b.classList.add('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');
            });
            btn.classList.add('active', 'bg-slate-900', 'dark:bg-white', 'text-white', 'dark:text-slate-900');
            btn.classList.remove('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300');

            const target = btn.getAttribute('data-target');
            skillCards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (target === 'all' || cardCat === target) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection
