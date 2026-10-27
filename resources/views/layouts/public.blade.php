<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $profile->name ?? 'Portfolio' }} - @yield('title', 'Portfolio')</title>
    
    <!-- Google Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        indigo: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        darkbg: '#080c15',
                        darkcard: '#0f172a',
                        darkcardhover: '#162038',
                        ashwhite: '#e2e8f0',
                        ashmuted: '#94a3b8',
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    }
                }
            }
        }
    </script>
    @if(file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Smooth Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 9px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .dark ::-webkit-scrollbar-track {
            background: #080c15;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
            border: 2px solid transparent;
            background-clip: content-box;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* Preloader */
        .preloader {
            position: fixed; inset: 0; z-index: 9999;
            background: #ffffff;
            display: flex; align-items: center; justify-content: center;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }
        .dark .preloader {
            background: #080c15;
        }
        .preloader.hidden { opacity: 0; visibility: hidden; pointer-events: none; }
        .preloader .spinner {
            width: 52px; height: 52px;
            border: 3.5px solid rgba(99, 102, 241, 0.15);
            border-top-color: #6366f1;
            border-right-color: #8b5cf6;
            border-radius: 50%;
            animation: spin 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Typing cursor */
        .typing-cursor { animation: blink 1s infinite; }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

        /* Dynamic hero background that distinctly alternates in light & dark mode */
        .gradient-bg {
            background: radial-gradient(circle at 15% 20%, rgba(224, 231, 255, 0.6) 0%, transparent 40%),
                        radial-gradient(circle at 85% 80%, rgba(243, 232, 255, 0.6) 0%, transparent 40%),
                        linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #f1f5f9 100%);
            background-size: 150% 150%;
            animation: gradientShift 18s ease infinite;
        }
        .dark .gradient-bg {
            background: radial-gradient(circle at 20% 15%, rgba(99, 102, 241, 0.12) 0%, transparent 45%),
                        radial-gradient(circle at 80% 85%, rgba(168, 85, 247, 0.12) 0%, transparent 45%),
                        linear-gradient(135deg, #080c15 0%, #0d1322 50%, #0a0f1d 100%);
            background-size: 150% 150%;
            animation: gradientShift 18s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Ambient interactive cursor spotlight */
        .ambient-spotlight {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            pointer-events: none;
            z-index: 1;
            transition: opacity 0.3s ease;
            background: radial-gradient(600px circle at var(--mouse-x, 50vw) var(--mouse-y, 50vh), rgba(99, 102, 241, 0.05), transparent 70%);
        }
        .dark .ambient-spotlight {
            background: radial-gradient(600px circle at var(--mouse-x, 50vw) var(--mouse-y, 50vh), rgba(99, 102, 241, 0.08), transparent 70%);
        }

        /* Glassmorphism Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(226, 232, 240, 0.9);
        }
        .dark .glass-card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.07);
        }

        /* AOS animations */
        [data-aos] { opacity: 0; transition: all 0.7s cubic-bezier(0.2, 0.8, 0.2, 1); }
        [data-aos].aos-animate { opacity: 1; }
        [data-aos="fade-up"] { transform: translateY(32px); }
        [data-aos="fade-up"].aos-animate { transform: translateY(0); }
        [data-aos="fade-right"] { transform: translateX(-32px); }
        [data-aos="fade-right"].aos-animate { transform: translateY(0); }
        [data-aos="fade-left"] { transform: translateX(32px); }
        [data-aos="fade-left"].aos-animate { transform: translateY(0); }
        [data-aos="zoom-in"] { transform: scale(0.92); }
        [data-aos="zoom-in"].aos-animate { transform: scale(1); }

        /* Skill bar animation */
        .skill-bar-fill {
            width: 0%;
            transition: width 1.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Card hover effects with 3D elevation */
        .card-hover {
            transition: transform 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.35s cubic-bezier(0.2, 0.8, 0.2, 1), border-color 0.35s ease;
        }
        .card-hover:hover {
            transform: translateY(-7px) scale(1.008);
            box-shadow: 0 24px 48px -12px rgba(99, 102, 241, 0.16);
            border-color: rgba(99, 102, 241, 0.4);
        }
        .dark .card-hover:hover {
            box-shadow: 0 24px 48px -12px rgba(0, 0, 0, 0.75), 0 0 20px -2px rgba(99, 102, 241, 0.15);
            border-color: rgba(99, 102, 241, 0.45);
        }

        /* Float animations */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(1.5deg); }
        }
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(12px) rotate(-1.5deg); }
        }
        .animate-float-slow {
            animation: float-slow 6s ease-in-out infinite;
        }
        .animate-float-reverse {
            animation: float-reverse 7s ease-in-out infinite;
        }

        /* Shimmer button effect */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                60deg,
                rgba(255,255,255,0) 20%,
                rgba(255,255,255,0.25) 25%,
                rgba(255,255,255,0) 30%
            );
            transform: rotate(30deg);
            animation: shimmer-sweep 5s infinite;
        }
        @keyframes shimmer-sweep {
            0% { transform: translateX(-100%) rotate(30deg); }
            20%, 100% { transform: translateX(100%) rotate(30deg); }
        }

        /* Marquee ticker animation */
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: 200%;
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }

        /* Glowing ring pulse */
        @keyframes ring-glow {
            0%, 100% { box-shadow: 0 0 25px -5px rgba(99, 102, 241, 0.35); }
            50% { box-shadow: 0 0 40px 5px rgba(168, 85, 247, 0.45); }
        }
        .glow-avatar-ring {
            animation: ring-glow 4s ease-in-out infinite;
        }

        /* Toast notification */
        .toast {
            position: fixed; top: 24px; right: 24px; z-index: 9998;
            padding: 16px 24px; border-radius: 16px;
            transform: translateX(120%);
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            max-width: 420px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.3);
        }
        .toast.show { transform: translateX(0); }
        .toast-success { background: #059669; color: white; }
    </style>
</head>
<body class="bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-300 transition-colors duration-300 antialiased font-sans selection:bg-indigo-500 selection:text-white">

    <!-- Ambient mouse spotlight tracker -->
    <div class="ambient-spotlight hidden lg:block" id="ambientSpotlight"></div>

    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="flex flex-col items-center gap-4">
            <div class="spinner"></div>
            <span class="text-xs font-bold tracking-widest uppercase bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent animate-pulse">Loading Portfolio...</span>
        </div>
    </div>

    <!-- Toast container -->
    @if(session('success'))
    <div class="toast toast-success show flex items-center gap-3 backdrop-blur-md" id="toast">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span class="font-medium text-sm">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Dynamic copied to clipboard toast -->
    <div id="dynamicToast" class="toast toast-success flex items-center gap-3 backdrop-blur-md">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span class="font-medium text-sm" id="dynamicToastMsg">Copied!</span>
    </div>

    <!-- Navigation Bar -->
    <nav class="fixed top-0 w-full z-50 bg-white/80 dark:bg-[#080c15]/80 backdrop-blur-xl border-b border-slate-200/70 dark:border-slate-800/80 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20 transition-all duration-300" id="navbarInner">
                <!-- Brand / Logo with status dot -->
                <a href="{{ route('home') }}" class="group flex items-center gap-3">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-2xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 p-0.5 shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform duration-300">
                        <div class="w-full h-full bg-white dark:bg-[#0f172a] rounded-[14px] flex items-center justify-center font-extrabold text-sm sm:text-base bg-gradient-to-br from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            {{ substr($profile->name ?? 'P', 0, 1) }}
                        </div>
                    </div>
                    <div>
                        <div class="text-lg sm:text-xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 flex items-center gap-2">
                            <span>{{ $profile->name ?? 'Portfolio' }}</span>
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                        </div>
                        <span class="text-[10px] text-slate-500 dark:text-slate-400 block -mt-1 hidden sm:block font-medium">Software &bull; AI/ML &bull; IoT</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('home') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Home</a>
                    <a href="{{ route('projects') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('projects') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Projects</a>
                    <a href="{{ route('publications') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('publications') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Publications</a>
                    <a href="{{ route('experience') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('experience') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Experience</a>
                    <a href="{{ route('academic') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('academic') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Academic & Awards</a>
                    <a href="{{ route('contact') }}" class="nav-item px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-200 {{ request()->routeIs('contact') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50/80 dark:bg-indigo-950/50 shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/70 dark:hover:bg-slate-800/60' }}">Contact</a>

                    <div class="h-6 w-px bg-slate-200 dark:bg-slate-800 mx-2"></div>

                    <!-- Dark Mode Toggle Button -->
                    <button id="darkModeToggle" class="p-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800/70 transition-all cursor-pointer relative" title="Toggle dark / light mode" type="button" aria-label="Toggle theme">
                        <svg class="w-5 h-5 hidden dark:block transition-transform duration-300 hover:rotate-45 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/></svg>
                        <svg class="w-5 h-5 block dark:hidden transition-transform duration-300 hover:-rotate-12 text-slate-700" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg>
                    </button>

                    <!-- Download CV Button in Navbar -->
                    <a href="{{ route('cv.download') }}" target="_blank" class="btn-shimmer ml-2 px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white text-xs sm:text-sm font-bold rounded-xl transition-all duration-300 shadow-md shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5 flex items-center gap-1.5 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Download CV</span>
                    </a>
                </div>

                <!-- Mobile Menu & Theme Buttons -->
                <div class="flex items-center gap-2 lg:hidden">
                    <button id="darkModeToggleMobileIcon" class="p-2.5 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" title="Toggle dark mode" type="button" aria-label="Toggle theme">
                        <svg class="w-5 h-5 hidden dark:block text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/></svg>
                        <svg class="w-5 h-5 block dark:hidden text-slate-700" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg>
                    </button>

                    <button id="mobileMenuBtn" class="p-2.5 rounded-xl text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" type="button" aria-label="Toggle Navigation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path id="menuClose" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer with Smooth Backdrop Blur -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white/95 dark:bg-[#080c15]/95 backdrop-blur-2xl border-t border-slate-200 dark:border-slate-800 px-4 py-5 space-y-2 shadow-2xl">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('home') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">🏠 Home</a>
            <a href="{{ route('projects') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('projects') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">💼 Projects</a>
            <a href="{{ route('publications') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('publications') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">📚 Publications</a>
            <a href="{{ route('experience') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('experience') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">⚡ Experience</a>
            <a href="{{ route('academic') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('academic') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">🎓 Academic & Awards</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('contact') ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-slate-800/80 font-bold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800/50' }}">✉️ Contact</a>
            
            <div class="pt-2 border-t border-slate-200 dark:border-slate-800 space-y-2">
                <a href="{{ route('cv.download') }}" target="_blank" class="block w-full text-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl text-sm shadow-md transition-all">
                    📄 Download Curriculum Vitae
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 sm:pt-20">
        @yield('content')
    </main>

    <!-- Footer with Sleek Gradient Divider & Glass Styling -->
    <footer class="relative bg-white dark:bg-[#060a12] text-slate-600 dark:text-slate-400 pt-20 pb-12 mt-20 transition-colors duration-300 overflow-hidden">
        <!-- Glowing Top Border Line -->
        <div class="absolute top-0 inset-x-0 h-[2px] bg-gradient-to-r from-transparent via-indigo-500/60 via-purple-500/60 to-transparent"></div>
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-96 h-32 bg-indigo-500/10 dark:bg-indigo-500/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b border-slate-200/80 dark:border-slate-800/80">
                <!-- Col 1: Identity & Direct Contact Details (5 cols) -->
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 p-0.5 shadow-md shadow-indigo-500/20">
                            <div class="w-full h-full bg-white dark:bg-[#0f172a] rounded-[14px] flex items-center justify-center font-extrabold text-base bg-gradient-to-br from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                {{ substr($profile->name ?? 'P', 0, 1) }}
                            </div>
                        </div>
                        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tight bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                            {{ $profile->name ?? 'Portfolio' }}
                        </a>
                    </div>

                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 max-w-sm leading-relaxed">
                        {{ $profile->title ?? 'Software Engineer & IoT Specialist' }}. Building reliable distributed systems, predictive machine learning pipelines, and connected IoT solutions.
                    </p>
                    
                    <div class="pt-2 text-xs sm:text-sm text-slate-600 dark:text-slate-300 space-y-2.5">
                        @if($profile->location ?? false)
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <span class="font-medium">{{ $profile->location }}</span>
                        </div>
                        @endif
                        @if($profile->phone ?? false)
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <a href="tel:{{ $profile->phone }}" class="font-medium hover:text-indigo-600 dark:hover:text-indigo-400 transition">{{ $profile->phone }}</a>
                        </div>
                        @endif
                        @if($profile->email ?? false)
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <a href="mailto:{{ $profile->email }}" class="font-medium hover:text-indigo-600 dark:hover:text-indigo-400 transition">{{ $profile->email }}</a>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Col 2: Quick Links (3 cols) -->
                <div class="md:col-span-3 space-y-3">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-slate-200 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                        <span>Navigation</span>
                    </h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm font-medium">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('publications') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Publications
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('experience') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Work Experience
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('academic') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Academic & Awards
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition flex items-center gap-2 group">
                                <span class="text-indigo-500 group-hover:translate-x-1 transition-transform">&rarr;</span> Get in Touch
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Let's Connect & Socials (4 cols) -->
                <div class="md:col-span-4 space-y-4">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 dark:text-slate-200 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                        <span>Professional Connect</span>
                    </h4>
                    <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
                        Always open to innovative software development, embedded engineering challenges, and collaborative technical projects.
                    </p>

                    <!-- Professional Social Badges (GitHub & LinkedIn only — No Twitter, No CV here) -->
                    <div class="flex items-center gap-3 pt-2">
                        @if($profile->github_url ?? false)
                        <a href="{{ $profile->github_url }}" target="_blank" class="p-3 rounded-2xl bg-slate-100 dark:bg-slate-800/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-slate-900 border border-slate-200 dark:border-slate-700 transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1 flex items-center gap-2 text-xs font-bold" title="GitHub Profile">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            <span>GitHub</span>
                        </a>
                        @endif
                        @if($profile->linkedin_url ?? false)
                        <a href="{{ $profile->linkedin_url }}" target="_blank" class="p-3 rounded-2xl bg-slate-100 dark:bg-slate-800/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-blue-600 border border-slate-200 dark:border-slate-700 transition-all duration-300 shadow-sm hover:shadow-lg hover:-translate-y-1 flex items-center gap-2 text-xs font-bold" title="LinkedIn Profile">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <span>LinkedIn</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500 dark:text-slate-400 font-medium">
                <p>&copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}. All rights reserved.</p>
                <p class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Built with clean architecture & modern web performance</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button with Glow -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 z-50 p-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-2xl shadow-xl shadow-indigo-500/25 opacity-0 invisible transition-all duration-300 hover:shadow-2xl hover:scale-110 cursor-pointer" title="Scroll to top" type="button" aria-label="Scroll to top">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

    <script>
        // 1. Mouse Spotlight Tracker
        const spotlight = document.getElementById('ambientSpotlight');
        if (spotlight) {
            window.addEventListener('mousemove', (e) => {
                spotlight.style.setProperty('--mouse-x', `${e.clientX}px`);
                spotlight.style.setProperty('--mouse-y', `${e.clientY}px`);
            });
        }

        // 2. Preloader
        window.addEventListener('load', () => {
            setTimeout(() => document.getElementById('preloader')?.classList.add('hidden'), 200);
        });

        // 3. Dark mode init & toggle
        function initDarkMode() {
            const saved = localStorage.getItem('darkMode');
            if (saved === 'true' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        initDarkMode();

        function toggleDark() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        }

        document.getElementById('darkModeToggle')?.addEventListener('click', toggleDark);
        document.getElementById('darkModeToggleMobileIcon')?.addEventListener('click', toggleDark);

        // 4. Mobile Menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuOpen = document.getElementById('menuOpen');
        const menuClose = document.getElementById('menuClose');

        mobileMenuBtn?.addEventListener('click', () => {
            mobileMenu?.classList.toggle('hidden');
            menuOpen?.classList.toggle('hidden');
            menuClose?.classList.toggle('hidden');
        });

        // 5. Scroll to top button & Navbar resize on scroll
        const scrollBtn = document.getElementById('scrollToTop');
        const navbar = document.getElementById('navbar');
        const navbarInner = document.getElementById('navbarInner');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn?.classList.remove('opacity-0', 'invisible');
                scrollBtn?.classList.add('opacity-100', 'visible');
            } else {
                scrollBtn?.classList.add('opacity-0', 'invisible');
                scrollBtn?.classList.remove('opacity-100', 'visible');
            }

            if (window.scrollY > 20) {
                navbar?.classList.add('shadow-lg', 'shadow-slate-900/5', 'bg-white/95', 'dark:bg-[#080c15]/95');
                navbarInner?.classList.remove('sm:h-20');
                navbarInner?.classList.add('sm:h-16');
            } else {
                navbar?.classList.remove('shadow-lg', 'shadow-slate-900/5', 'bg-white/95', 'dark:bg-[#080c15]/95');
                navbarInner?.classList.remove('sm:h-16');
                navbarInner?.classList.add('sm:h-20');
            }
        });
        scrollBtn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // 6. Toast auto-hide
        const toast = document.getElementById('toast');
        if (toast) {
            setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 4000);
        }

        // Global function to trigger custom toast
        window.showToast = function(msg) {
            const dt = document.getElementById('dynamicToast');
            const dtm = document.getElementById('dynamicToastMsg');
            if (dt && dtm) {
                dtm.textContent = msg;
                dt.classList.add('show');
                setTimeout(() => dt.classList.remove('show'), 3500);
            }
        };

        // 7. AOS (Animate on Scroll)
        function initAOS() {
            const elements = document.querySelectorAll('[data-aos]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const delay = entry.target.dataset.aosDelay || 0;
                        setTimeout(() => entry.target.classList.add('aos-animate'), delay);
                    }
                });
            }, { threshold: 0.1 });
            elements.forEach(el => observer.observe(el));
        }
        document.addEventListener('DOMContentLoaded', initAOS);

        // 8. Animated Counters
        function animateCounters() {
            document.querySelectorAll('.counter').forEach(counter => {
                const target = parseInt(counter.dataset.target) || 0;
                const suffix = counter.dataset.suffix || '';
                if (target === 0) {
                    counter.textContent = '0' + suffix;
                    return;
                }
                let current = 0;
                const increment = Math.max(1, target / 35);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current) + suffix;
                }, 30);
            });
        }

        // 9. Skill bars animation
        function animateSkillBars() {
            document.querySelectorAll('.skill-bar-fill').forEach(bar => {
                const width = bar.dataset.width;
                bar.style.width = width + '%';
            });
        }

        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateSkillBars();
                    skillObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.skills-section').forEach(el => skillObserver.observe(el));
            document.querySelectorAll('.stats-section').forEach(el => counterObserver.observe(el));
        });

        // 10. Typing animation
        function initTypingAnimation() {
            const el = document.getElementById('typingText');
            if (!el) return;
            let titles = [];
            try {
                titles = JSON.parse(el.dataset.titles || '[]');
            } catch(e) {
                titles = ['Developer'];
            }
            if (!titles || titles.length === 0) titles = ['Developer'];
            let titleIndex = 0, charIndex = 0, isDeleting = false;

            function type() {
                const current = titles[titleIndex];
                if (isDeleting) {
                    el.textContent = current.substring(0, charIndex--);
                    if (charIndex < 0) { isDeleting = false; titleIndex = (titleIndex + 1) % titles.length; setTimeout(type, 500); return; }
                } else {
                    el.textContent = current.substring(0, charIndex++);
                    if (charIndex > current.length) { isDeleting = true; setTimeout(type, 2200); return; }
                }
                setTimeout(type, isDeleting ? 25 : 70);
            }
            type();
        }
        document.addEventListener('DOMContentLoaded', initTypingAnimation);
    </script>
</body>
</html>