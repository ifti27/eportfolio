@extends('layouts.public')
@section('title', 'Home')

@section('content')
<!-- Hero Section with Interactive Particle Canvas & Floating Tech Pills -->
<section class="gradient-bg min-h-[92vh] flex items-center justify-center relative overflow-hidden pt-10 pb-20 transition-colors duration-500">
    <!-- Interactive Particle Mesh Canvas -->
    <canvas id="heroParticles" class="absolute inset-0 pointer-events-none z-0 w-full h-full opacity-70 dark:opacity-40"></canvas>

    <!-- Floating Ambient Radial Glow Lights -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-96 h-96 bg-indigo-500/15 dark:bg-indigo-500/20 rounded-full blur-3xl -top-10 -left-10 animate-pulse-slow"></div>
        <div class="absolute w-[32rem] h-[32rem] bg-purple-500/15 dark:bg-purple-500/20 rounded-full blur-3xl bottom-0 -right-10 animate-pulse-slow" style="animation-delay: 2.5s;"></div>
        <div class="absolute w-80 h-80 bg-blue-500/10 dark:bg-blue-500/15 rounded-full blur-3xl top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse-slow" style="animation-delay: 4.5s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
            <!-- Circular Avatar with Animated Glowing Ring & Floating Tech Stack Pills -->
            <div class="flex-shrink-0" data-aos="zoom-in">
                <div class="relative group">
                    <!-- Rotating Glowing Gradient Ring -->
                    <div class="p-1.5 rounded-full bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 shadow-2xl glow-avatar-ring">
                        <div class="w-56 h-56 sm:w-64 sm:h-64 md:w-72 md:h-72 rounded-full overflow-hidden border-4 border-white dark:border-[#0f172a] bg-slate-100 dark:bg-slate-800 relative">
                            @if($profile && $profile->avatar)
                                <img src="{{ asset('storage/' . $profile->avatar) }}" 
                                     alt="{{ $profile->name }}" 
                                     class="w-full h-full object-cover rounded-full group-hover:scale-105 transition-transform duration-700"
                                     loading="eager"
                                     onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 flex items-center justify-center text-7xl font-extrabold text-white\'>{{ substr($profile->name ?? 'P', 0, 1) }}</div>';">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 flex items-center justify-center">
                                    <span class="text-7xl md:text-8xl text-white font-black">{{ substr($profile->name ?? 'P', 0, 1) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Online / Available for opportunities radar badge -->
                    <div class="absolute bottom-2 right-4 flex items-center gap-2 px-3.5 py-1.5 bg-white/95 dark:bg-[#0f172a]/95 backdrop-blur-md rounded-full shadow-xl border border-slate-200/80 dark:border-slate-700/80" title="Open to opportunities">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-200">Available</span>
                    </div>

                    <!-- Floating Technology Badges around Avatar (Responsive display) -->
                    <div class="hidden sm:flex items-center gap-2 absolute -top-4 -left-6 px-3.5 py-2 rounded-2xl bg-white/90 dark:bg-[#0f172a]/90 backdrop-blur-md border border-slate-200/80 dark:border-slate-700/80 text-xs font-bold text-indigo-600 dark:text-indigo-400 shadow-xl animate-float-slow">
                        <span>⚡</span>
                        <span>Laravel & PHP</span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2 absolute -bottom-3 -left-6 px-3.5 py-2 rounded-2xl bg-white/90 dark:bg-[#0f172a]/90 backdrop-blur-md border border-slate-200/80 dark:border-slate-700/80 text-xs font-bold text-purple-600 dark:text-purple-400 shadow-xl animate-float-reverse">
                        <span>🧠</span>
                        <span>AI & ML</span>
                    </div>
                    <div class="hidden sm:flex items-center gap-2 absolute top-12 -right-8 px-3.5 py-2 rounded-2xl bg-white/90 dark:bg-[#0f172a]/90 backdrop-blur-md border border-slate-200/80 dark:border-slate-700/80 text-xs font-bold text-emerald-600 dark:text-emerald-400 shadow-xl animate-float-slow" style="animation-delay: 1.5s;">
                        <span>📡</span>
                        <span>IoT & Python</span>
                    </div>
                </div>
            </div>

            <!-- Hero Intro & Typing Text -->
            <div class="text-center lg:text-left flex-1" data-aos="fade-left">
                <!-- Status pill -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50/90 dark:bg-indigo-950/70 border border-indigo-200 dark:border-indigo-800/80 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-5 backdrop-blur-sm shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    <span>Software Engineer &bull; AI/ML &bull; IoT Developer</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-slate-900 dark:text-slate-100 mb-4 tracking-tight leading-tight">
                    Hi, I'm <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">{{ $profile->name ?? 'Software Engineer' }}</span>
                </h1>
                
                <!-- Animated Role Subtitle -->
                <div class="text-xl sm:text-2xl md:text-3xl text-slate-700 dark:text-slate-200 mb-6 min-h-[2.5rem] flex items-center justify-center lg:justify-start font-semibold">
                    <span class="text-slate-500 dark:text-slate-400 mr-2 font-normal">Specializing in</span>
                    @php
                        $typingTitles = (!empty($profile->typing_titles) && is_array($profile->typing_titles))
                            ? $profile->typing_titles
                            : [
                                $profile->title ?? 'Full Stack Development',
                                'Modern Software Engineering',
                                'Machine Learning & AI Workflows',
                                'Connected IoT Architectures'
                            ];
                    @endphp
                    <span id="typingText" class="text-indigo-600 dark:text-indigo-400 font-extrabold" data-titles='@json($typingTitles)'></span>
                    <span class="typing-cursor text-indigo-600 dark:text-indigo-400 text-3xl font-light ml-0.5">|</span>
                </div>
                
                <p class="text-slate-600 dark:text-slate-300 max-w-2xl text-base sm:text-lg mb-8 leading-relaxed font-normal">
                    {{ $profile->bio ?? 'Welcome to my dynamic engineering portfolio. Explore my recent full-stack software projects, IoT hardware solutions, peer-reviewed publications, and verified academic milestones.' }}
                </p>

                <!-- CTA Action Buttons -->
                <div class="flex flex-wrap gap-3.5 justify-center lg:justify-start items-center">
                    <a href="{{ route('contact') }}" class="btn-shimmer px-7 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5 text-sm flex items-center gap-2 cursor-pointer">
                        <span>Get In Touch</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <a href="{{ route('projects') }}" class="px-7 py-3.5 glass-card hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-800 dark:text-slate-200 font-bold rounded-2xl transition-all duration-300 hover:-translate-y-0.5 shadow-sm text-sm flex items-center gap-2 cursor-pointer">
                        <span>Explore Projects</span>
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </a>

                    <!-- Download CV Button in Hero -->
                    <a href="{{ route('cv.download') }}" target="_blank" class="px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl transition-all duration-300 shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/35 hover:-translate-y-0.5 flex items-center gap-2 text-sm cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Download CV</span>
                    </a>
                </div>

                <!-- Professional Social Links (GitHub and LinkedIn only) -->
                <div class="flex gap-3 mt-8 justify-center lg:justify-start items-center">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Profiles:</span>
                    @if($profile->github_url ?? false)
                    <a href="{{ $profile->github_url }}" target="_blank" class="p-2.5 rounded-xl glass-card text-slate-700 dark:text-slate-300 hover:text-white hover:bg-slate-900 transition-all hover:-translate-y-1 shadow-sm flex items-center gap-1.5 text-xs font-semibold" title="GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        <span>GitHub</span>
                    </a>
                    @endif
                    @if($profile->linkedin_url ?? false)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="p-2.5 rounded-xl glass-card text-slate-700 dark:text-slate-300 hover:text-white hover:bg-blue-600 transition-all hover:-translate-y-1 shadow-sm flex items-center gap-1.5 text-xs font-semibold" title="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        <span>LinkedIn</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll down indicator -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 animate-bounce text-slate-400 dark:text-slate-500">
        <a href="#stats" class="p-2 block hover:text-indigo-600 dark:hover:text-indigo-400 transition" aria-label="Scroll down">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- Continuous High-Tech Scrolling Stack Marquee -->
<div class="py-4 bg-white/60 dark:bg-[#0c1222]/80 backdrop-blur-md border-y border-slate-200/80 dark:border-slate-800/80 overflow-hidden relative">
    <div class="animate-marquee items-center gap-10 whitespace-nowrap text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-400">
        <span class="flex items-center gap-2"><span class="text-indigo-500 font-black">⚡</span> Laravel 11/12</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-amber-500 font-black">🐍</span> Python</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-purple-500 font-black">🧠</span> TensorFlow & PyTorch</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-blue-500 font-black">🐼</span> Pandas & NumPy</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-emerald-500 font-black">🗄️</span> MySQL & MariaDB</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-rose-500 font-black">⚙️</span> C++ & Embedded IoT</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-cyan-500 font-black">🎨</span> Tailwind CSS</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-indigo-500 font-black">🌐</span> REST APIs & WebSockets</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-indigo-500 font-black">⚡</span> Laravel 11/12</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-amber-500 font-black">🐍</span> Python</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-purple-500 font-black">🧠</span> TensorFlow & PyTorch</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-blue-500 font-black">🐼</span> Pandas & NumPy</span>
        <span>&bull;</span>
        <span class="flex items-center gap-2"><span class="text-emerald-500 font-black">🗄️</span> MySQL & MariaDB</span>
    </div>
</div>

<!-- Animated Dynamic Stats Counter Section -->
<section id="stats" class="py-16 bg-white dark:bg-[#0a0f1d] border-b border-slate-200/80 dark:border-slate-800 stats-section transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 sm:gap-6">
            <!-- Stat 1 -->
            <div class="group card-hover p-6 rounded-3xl bg-slate-50/80 dark:bg-[#0f172a]/70 border border-slate-200/80 dark:border-slate-800/80 text-center relative overflow-hidden" data-aos="fade-up" data-aos-delay="50">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                <div class="text-3xl sm:text-4xl md:text-5xl font-black text-indigo-600 dark:text-indigo-400 counter tracking-tight" data-target="{{ $stats['projects'] ?? 0 }}" data-suffix="+">0</div>
                <p class="mt-2 text-slate-700 dark:text-slate-300 font-bold text-xs sm:text-sm">Projects Built</p>
                <span class="text-[10px] text-slate-400 block mt-0.5">Software & IoT</span>
            </div>

            <!-- Stat 2 -->
            <div class="group card-hover p-6 rounded-3xl bg-slate-50/80 dark:bg-[#0f172a]/70 border border-slate-200/80 dark:border-slate-800/80 text-center relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500"></div>
                <div class="text-3xl sm:text-4xl md:text-5xl font-black text-purple-600 dark:text-purple-400 counter tracking-tight" data-target="{{ $stats['skills'] ?? 0 }}" data-suffix="+">0</div>
                <p class="mt-2 text-slate-700 dark:text-slate-300 font-bold text-xs sm:text-sm">Technologies</p>
                <span class="text-[10px] text-slate-400 block mt-0.5">Verified Toolsets</span>
            </div>

            <!-- Stat 3 -->
            <div class="group card-hover p-6 rounded-3xl bg-slate-50/80 dark:bg-[#0f172a]/70 border border-slate-200/80 dark:border-slate-800/80 text-center relative overflow-hidden" data-aos="fade-up" data-aos-delay="150">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
                <div class="text-3xl sm:text-4xl md:text-5xl font-black text-blue-600 dark:text-blue-400 counter tracking-tight" data-target="{{ $stats['experience_years'] ?? 0 }}" data-suffix="+">0</div>
                <p class="mt-2 text-slate-700 dark:text-slate-300 font-bold text-xs sm:text-sm">Years Experience</p>
                <span class="text-[10px] text-slate-400 block mt-0.5">Engineering Impact</span>
            </div>

            <!-- Stat 4 -->
            <div class="group card-hover p-6 rounded-3xl bg-slate-50/80 dark:bg-[#0f172a]/70 border border-slate-200/80 dark:border-slate-800/80 text-center relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500 to-orange-500"></div>
                <div class="text-3xl sm:text-4xl md:text-5xl font-black text-amber-500 dark:text-amber-400 counter tracking-tight" data-target="{{ $stats['awards'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-2 text-slate-700 dark:text-slate-300 font-bold text-xs sm:text-sm">Honors & Awards</p>
                <span class="text-[10px] text-slate-400 block mt-0.5">Competitions & Merits</span>
            </div>

            <!-- Stat 5 -->
            <div class="group card-hover p-6 rounded-3xl bg-slate-50/80 dark:bg-[#0f172a]/70 border border-slate-200/80 dark:border-slate-800/80 text-center relative overflow-hidden col-span-2 md:col-span-1" data-aos="fade-up" data-aos-delay="250">
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-500"></div>
                <div class="text-3xl sm:text-4xl md:text-5xl font-black text-emerald-600 dark:text-emerald-400 counter tracking-tight" data-target="{{ $stats['publications'] ?? 0 }}" data-suffix="">0</div>
                <p class="mt-2 text-slate-700 dark:text-slate-300 font-bold text-xs sm:text-sm">Publications</p>
                <span class="text-[10px] text-slate-400 block mt-0.5">Journals & Papers</span>
            </div>
        </div>
    </div>
</section>

<!-- Grouped Skills Section (Languages, Web Tools, AI / ML, Database) -->
<section class="py-24 bg-slate-50 dark:bg-[#080c15] skills-section transition-colors duration-300 relative overflow-hidden" id="skills">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                <span>⚡</span>
                <span>Specialized Proficiencies</span>
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Technical <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Skill Groups</span>
            </h2>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm sm:text-base font-normal">
                Carefully organized across core programming languages, modern web tools, machine learning, and databases
            </p>

            <!-- Group Filter Tab Buttons -->
            <div class="flex flex-wrap justify-center gap-2.5 mt-8">
                <button class="skill-group-filter active px-4 sm:px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-indigo-600 text-white shadow-lg shadow-indigo-500/25 transition-all duration-300 cursor-pointer" data-target="all">
                    All Categories
                </button>
                <button class="skill-group-filter px-4 sm:px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-white dark:bg-[#0f172a] text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-800 hover:border-indigo-500 transition-all duration-300 cursor-pointer" data-target="Languages">
                    💻 Languages
                </button>
                <button class="skill-group-filter px-4 sm:px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-white dark:bg-[#0f172a] text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-800 hover:border-indigo-500 transition-all duration-300 cursor-pointer" data-target="Web Tools">
                    🌐 Web Tools
                </button>
                <button class="skill-group-filter px-4 sm:px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-white dark:bg-[#0f172a] text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-800 hover:border-indigo-500 transition-all duration-300 cursor-pointer" data-target="AI / ML">
                    🧠 AI / ML
                </button>
                <button class="skill-group-filter px-4 sm:px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-white dark:bg-[#0f172a] text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-800 hover:border-indigo-500 transition-all duration-300 cursor-pointer" data-target="Database">
                    🗄️ Database
                </button>
            </div>
        </div>

        <!-- 4 Specialized Group Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6" id="skillsCardsContainer">
            @php
                $categoryConfig = [
                    'Languages' => [
                        'icon' => '💻',
                        'accent' => 'from-amber-500 to-orange-600',
                        'badge' => 'bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-300 border-amber-200 dark:border-amber-800',
                        'bar' => 'from-amber-500 to-orange-500',
                        'desc' => 'Python, C++, Java, C#, R, JavaScript'
                    ],
                    'Web Tools' => [
                        'icon' => '🌐',
                        'accent' => 'from-blue-500 to-indigo-600',
                        'badge' => 'bg-blue-50 text-blue-700 dark:bg-blue-950/60 dark:text-blue-300 border-blue-200 dark:border-blue-800',
                        'bar' => 'from-blue-500 to-indigo-600',
                        'desc' => 'PHP, HTML, CSS, Laravel, APIs'
                    ],
                    'AI / ML' => [
                        'icon' => '🧠',
                        'accent' => 'from-purple-500 to-pink-600',
                        'badge' => 'bg-purple-50 text-purple-700 dark:bg-purple-950/60 dark:text-purple-300 border-purple-200 dark:border-purple-800',
                        'bar' => 'from-purple-500 to-pink-500',
                        'desc' => 'Pandas, NumPy, TensorFlow, Scikit-learn'
                    ],
                    'Database' => [
                        'icon' => '🗄️',
                        'accent' => 'from-emerald-500 to-teal-600',
                        'badge' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-300 border-emerald-200 dark:border-emerald-800',
                        'bar' => 'from-emerald-500 to-teal-500',
                        'desc' => 'MySQL, SQLite, PostgreSQL'
                    ],
                ];
            @endphp

            @foreach($skillsGrouped as $categoryName => $catSkills)
            @php
                $config = $categoryConfig[$categoryName] ?? [
                    'icon' => '⚡',
                    'accent' => 'from-indigo-500 to-purple-600',
                    'badge' => 'bg-indigo-50 text-indigo-700 dark:bg-indigo-950/60 dark:text-indigo-300 border-indigo-200 dark:border-indigo-800',
                    'bar' => 'from-indigo-500 to-purple-600',
                    'desc' => 'General Technical Tools'
                ];
            @endphp
            <div class="skill-category-card card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-6 sm:p-7 border border-slate-200/80 dark:border-slate-800/80 shadow-sm flex flex-col justify-between" data-category="{{ $categoryName }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div>
                    <!-- Category Header -->
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100 dark:border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br {{ $config['accent'] }} text-white flex items-center justify-center text-xl shadow-md">
                                {{ $config['icon'] }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-slate-100">
                                    {{ $categoryName }}
                                </h3>
                                <span class="text-[11px] font-semibold text-slate-400">
                                    {{ $catSkills->count() }} Skills
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Skills items in this group -->
                    <div class="space-y-4">
                        @foreach($catSkills as $skill)
                        <div class="group/item">
                            <div class="flex justify-between items-center mb-1.5 text-xs font-semibold">
                                <span class="text-slate-800 dark:text-slate-200 group-hover/item:text-indigo-600 dark:group-hover/item:text-indigo-400 transition-colors">
                                    {{ $skill->name }}
                                </span>
                                <span class="text-slate-500 dark:text-slate-400 font-mono font-bold">
                                    {{ $skill->percentage }}%
                                </span>
                            </div>
                            <div class="w-full bg-slate-100 dark:bg-slate-800 rounded-full h-2 overflow-hidden p-0.5">
                                <div class="skill-bar-fill bg-gradient-to-r {{ $config['bar'] }} h-full rounded-full" data-width="{{ $skill->percentage }}"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                    <span>Proficiency</span>
                    <span class="font-bold text-indigo-600 dark:text-indigo-400 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Verified
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Academic Qualifications & Achievements Highlights Preview -->
<section class="py-20 bg-white dark:bg-[#0a0f1d] border-t border-slate-200/80 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-purple-50 dark:bg-purple-950/60 border border-purple-200 dark:border-purple-800 text-purple-700 dark:text-purple-300 text-xs font-bold mb-3 shadow-sm">
                    🎓 Academic Journey & Distinctions
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight">
                    Education & <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Recognitions</span>
                </h2>
                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base mt-2">Verified academic degrees across university, college, and school alongside competitive honors</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('academic') }}" class="btn-shimmer inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-indigo-50 dark:bg-indigo-950/50 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 font-bold text-xs sm:text-sm border border-indigo-200 dark:border-indigo-800 transition group">
                    <span>View Academic & Awards Page</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Academic Qualifications Preview (7 cols) -->
            <div class="lg:col-span-7 space-y-4" data-aos="fade-right">
                <h3 class="text-base font-bold text-slate-900 dark:text-slate-200 flex items-center gap-2.5 mb-2">
                    <span class="w-8 h-8 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-sm">🎓</span>
                    <span>Academic Qualifications (School, College, University)</span>
                </h3>

                <div class="space-y-3.5">
                    @forelse($qualifications->take(3) as $qual)
                    <div class="p-5 rounded-2xl bg-slate-50 dark:bg-[#0f172a] border border-slate-200/80 dark:border-slate-800/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4 card-hover">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl flex items-center justify-center font-black text-sm shadow-sm flex-shrink-0
                                @if($qual->level == 'University') bg-purple-100 text-purple-700 dark:bg-purple-950/70 dark:text-purple-300 border border-purple-200 dark:border-purple-800
                                @elseif($qual->level == 'College') bg-blue-100 text-blue-700 dark:bg-blue-950/70 dark:text-blue-300 border border-blue-200 dark:border-blue-800
                                @else bg-emerald-100 text-emerald-700 dark:bg-emerald-950/70 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 @endif">
                                {{ substr($qual->level ?? 'E', 0, 1) }}
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h4 class="font-bold text-sm text-slate-900 dark:text-slate-100">{{ $qual->degree }}</h4>
                                    <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-300">{{ $qual->level }}</span>
                                </div>
                                <p class="text-xs text-indigo-600 dark:text-indigo-400 font-semibold mt-0.5">{{ $qual->institution }}</p>
                                <span class="text-xs text-slate-400 font-medium">{{ $qual->duration }}</span>
                            </div>
                        </div>
                        <div class="flex sm:flex-col items-center sm:items-end justify-between border-t sm:border-t-0 pt-2 sm:pt-0 border-slate-200 dark:border-slate-800">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Result / Grade</span>
                            <span class="px-3 py-1 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 dark:text-emerald-300 font-extrabold text-xs shadow-sm flex items-center gap-1">
                                <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>{{ $qual->result }}</span>
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-slate-500">No qualifications listed yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Co-Curricular & Recent Awards Preview (5 cols) -->
            <div class="lg:col-span-5 space-y-4" data-aos="fade-left">
                <h3 class="text-base font-bold text-slate-900 dark:text-slate-200 flex items-center gap-2.5 mb-2">
                    <span class="w-8 h-8 rounded-xl bg-amber-50 dark:bg-amber-950/60 flex items-center justify-center text-amber-600 dark:text-amber-400 text-sm">🏆</span>
                    <span>Top Honors & Leadership</span>
                </h3>

                <div class="bg-slate-50 dark:bg-[#0f172a] rounded-3xl p-6 border border-slate-200/80 dark:border-slate-800/80 h-[calc(100%-2.5rem)] flex flex-col justify-between">
                    <div class="space-y-4">
                        @if($achievements->count())
                        <div class="p-4 rounded-2xl bg-amber-500/10 border border-amber-500/25 relative overflow-hidden">
                            <div class="flex items-center gap-2.5 mb-1.5">
                                <span class="text-2xl">{{ $achievements->first()->icon ?? '🏆' }}</span>
                                <div>
                                    <h4 class="font-bold text-sm text-slate-900 dark:text-slate-100">{{ $achievements->first()->title }}</h4>
                                    <span class="text-[10px] font-semibold text-amber-600 dark:text-amber-400">{{ $achievements->first()->issuer }} &bull; {{ $achievements->first()->year }}</span>
                                </div>
                            </div>
                            <p class="text-xs text-slate-600 dark:text-slate-400 line-clamp-2 leading-relaxed mt-2">{{ $achievements->first()->description }}</p>
                        </div>
                        @endif

                        <div>
                            <h5 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                <span>Co-Curricular Engagements</span>
                            </h5>
                            <div class="space-y-2">
                                @if($profile && !empty($profile->co_curricular))
                                    @foreach(array_slice(explode("\n", $profile->co_curricular), 0, 3) as $act)
                                        @if(trim($act))
                                        <div class="text-xs text-slate-700 dark:text-slate-300 flex items-start gap-2.5">
                                            <span class="text-indigo-500 font-black mt-0.5">&rsaquo;</span>
                                            <span>{{ ltrim(trim($act), '•- ') }}</span>
                                        </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="text-xs text-slate-600 dark:text-slate-400 flex items-start gap-2.5">
                                        <span class="text-indigo-500 font-black mt-0.5">&rsaquo;</span>
                                        <span>Active hackathon finalist and university technical club mentor</span>
                                    </div>
                                    <div class="text-xs text-slate-600 dark:text-slate-400 flex items-start gap-2.5">
                                        <span class="text-indigo-500 font-black mt-0.5">&rsaquo;</span>
                                        <span>Open-source contributor & tech workshop organizer</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 mt-4 border-t border-slate-200/80 dark:border-slate-800 flex justify-between items-center text-xs">
                        <span class="text-slate-400 font-medium">Total Awards: {{ $achievements->count() }}</span>
                        <a href="{{ route('academic') }}" class="font-bold text-indigo-600 dark:text-indigo-400 hover:underline flex items-center gap-1">
                            <span>Explore Honors</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Showcase -->
@if(isset($featuredProjects) && $featuredProjects->count())
<section class="py-24 bg-slate-50 dark:bg-[#080c15] border-t border-slate-200/80 dark:border-slate-800 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                🚀 Engineering Portfolio
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Featured <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Projects</span>
            </h2>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-sm sm:text-base font-normal">Demonstrating modern architectural design across Software and IoT implementations</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects as $project)
            <div class="card-hover bg-white dark:bg-[#0f172a] rounded-3xl overflow-hidden shadow-sm border border-slate-200/80 dark:border-slate-800/80 flex flex-col justify-between group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 70 }}">
                <div>
                    <!-- Project Preview Header -->
                    <div class="h-52 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900">
                                <svg class="w-16 h-16 text-indigo-400/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                        @endif

                        <!-- Hover Action Bar -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <div class="flex gap-2 w-full">
                                @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="flex-1 text-center py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow transition">Live Demo</a>
                                @endif
                                @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="flex-1 text-center py-2 bg-slate-900/90 hover:bg-black text-white text-xs font-bold rounded-xl border border-slate-700 shadow transition">Code Repo</a>
                                @endif
                            </div>
                        </div>

                        <!-- Category Pill -->
                        <div class="absolute top-3.5 right-3.5">
                            <span class="px-3 py-1 bg-black/60 backdrop-blur-md text-white text-xs font-bold rounded-full border border-white/10 shadow-sm">{{ $project->category ?? 'Software' }}</span>
                        </div>
                    </div>

                    <!-- Project Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $project->title }}</h3>
                        <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3 leading-relaxed">{{ $project->description }}</p>
                        
                        <div class="flex flex-wrap gap-1.5 mb-2">
                            @foreach(explode(',', $project->tech_stack ?? '') as $tech)
                                @if(trim($tech))
                                <span class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300 text-xs rounded-lg font-semibold border border-indigo-200/50 dark:border-indigo-800/50">{{ trim($tech) }}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Card Footer Links -->
                <div class="px-6 pb-6 pt-0 flex gap-4 border-t border-slate-100 dark:border-slate-800/80 mt-2 pt-4">
                    @if($project->live_url)
                    <a href="{{ $project->live_url }}" target="_blank" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-bold flex items-center gap-1">
                        <span>Live Demo</span>
                        <span>&rarr;</span>
                    </a>
                    @endif
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white font-semibold flex items-center gap-1 transition">
                        <span>Repository</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-14" data-aos="fade-up">
            <a href="{{ route('projects') }}" class="btn-shimmer inline-flex items-center gap-2 px-8 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all duration-300 shadow-xl shadow-indigo-500/25 hover:shadow-indigo-500/40 text-sm">
                <span>View Full Projects Gallery</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Interactive Hero Canvas & Skill Tabs Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Interactive Particle Mesh Background on Canvas
    const canvas = document.getElementById('heroParticles');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let width = canvas.width = canvas.parentElement.offsetWidth;
        let height = canvas.height = canvas.parentElement.offsetHeight;

        window.addEventListener('resize', () => {
            if (!canvas.parentElement) return;
            width = canvas.width = canvas.parentElement.offsetWidth;
            height = canvas.height = canvas.parentElement.offsetHeight;
        });

        const numParticles = Math.min(width < 768 ? 25 : 55, 60);
        const particles = [];
        for (let i = 0; i < numParticles; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.7,
                vy: (Math.random() - 0.5) * 0.7,
                radius: Math.random() * 2 + 1.2
            });
        }

        let mouse = { x: null, y: null };
        window.addEventListener('mousemove', (e) => {
            const rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });

        function animateParticles() {
            ctx.clearRect(0, 0, width, height);

            const isDark = document.documentElement.classList.contains('dark');
            const particleColor = isDark ? 'rgba(129, 140, 248, 0.45)' : 'rgba(99, 102, 241, 0.35)';
            const lineColor = isDark ? 'rgba(99, 102, 241, 0.12)' : 'rgba(99, 102, 241, 0.08)';

            for (let i = 0; i < particles.length; i++) {
                const p = particles[i];
                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0 || p.x > width) p.vx *= -1;
                if (p.y < 0 || p.y > height) p.vy *= -1;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = particleColor;
                ctx.fill();

                // Draw connecting lines
                for (let j = i + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 110) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.strokeStyle = lineColor;
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }

                // Interactive mouse interaction
                if (mouse.x !== null) {
                    const mouseDist = Math.hypot(p.x - mouse.x, p.y - mouse.y);
                    if (mouseDist < 120) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(mouse.x, mouse.y);
                        ctx.strokeStyle = isDark ? 'rgba(168, 85, 247, 0.22)' : 'rgba(168, 85, 247, 0.15)';
                        ctx.lineWidth = 1.2;
                        ctx.stroke();
                    }
                }
            }
            requestAnimationFrame(animateParticles);
        }
        animateParticles();
    }

    // 2. Skill Category Tab Switcher
    const filterButtons = document.querySelectorAll('.skill-group-filter');
    const skillCards = document.querySelectorAll('.skill-category-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => {
                b.classList.remove('active', 'bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/25');
                b.classList.add('bg-white', 'dark:bg-[#0f172a]', 'text-slate-700', 'dark:text-slate-300');
            });
            btn.classList.add('active', 'bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/25');
            btn.classList.remove('bg-white', 'dark:bg-[#0f172a]', 'text-slate-700', 'dark:text-slate-300');

            const target = btn.getAttribute('data-target');
            skillCards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (target === 'all' || cardCat === target) {
                    card.style.display = 'flex';
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        card.style.transition = 'all 0.3s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 20);
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection