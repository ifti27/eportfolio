@extends('layouts.public')
@section('title', 'Projects')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#080c15] transition-colors duration-300 relative overflow-hidden">
    <!-- Ambient glowing backdrop orbs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute w-96 h-96 bg-indigo-500/10 dark:bg-indigo-500/15 rounded-full blur-3xl -top-20 -right-20 animate-pulse-slow"></div>
        <div class="absolute w-96 h-96 bg-purple-500/10 dark:bg-purple-500/15 rounded-full blur-3xl bottom-20 -left-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                <span>💼</span>
                <span>Work Showcase</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Engineering <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Projects</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Explore complete production software, machine learning architectures, and embedded IoT systems
            </p>
        </div>

        <!-- Filter & Search Controls Bar -->
        @php
            $displayCategories = $categories->count() ? $categories : collect(['Software', 'IoT']);
            $softwareCount = $projects->where('category', 'Software')->count();
            $iotCount = $projects->where('category', 'IoT')->count();
        @endphp
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
            <!-- Category Pills (All, Software, IoT) -->
            <div class="flex flex-wrap items-center justify-center gap-2.5" id="categoryFilterContainer">
                <button class="filter-btn active px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-indigo-600 text-white shadow-lg shadow-indigo-500/25 transition-all duration-300 cursor-pointer flex items-center gap-2" data-filter="all">
                    <span>All</span>
                    <span class="px-2 py-0.5 rounded-full bg-white/20 text-white text-[11px] font-bold">{{ $projects->count() }}</span>
                </button>
                @foreach($displayCategories as $category)
                @php
                    $catCount = $projects->where('category', $category)->count();
                @endphp
                <button class="filter-btn px-5 py-2.5 rounded-2xl text-xs sm:text-sm font-bold bg-white dark:bg-[#0f172a] text-slate-700 dark:text-slate-300 border border-slate-200/80 dark:border-slate-800 hover:border-indigo-500 transition-all duration-300 cursor-pointer flex items-center gap-2 shadow-sm" data-filter="{{ $category }}">
                    <span>{{ $category }}</span>
                    @if($catCount > 0)
                    <span class="px-2 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-[11px] font-semibold">{{ $catCount }}</span>
                    @endif
                </button>
                @endforeach
            </div>

            <!-- Instant Live Search Bar -->
            <div class="w-full md:w-72 relative">
                <input type="text" id="projectSearchInput" placeholder="Search by name or tech..." 
                    class="w-full px-4 py-2.5 pl-10 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-white/90 dark:bg-[#0f172a]/90 text-slate-800 dark:text-slate-200 text-xs sm:text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition shadow-sm">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid">
            @forelse($projects as $project)
            <div class="project-card card-hover bg-white dark:bg-[#0f172a] rounded-3xl overflow-hidden shadow-sm border border-slate-200/80 dark:border-slate-800/80 transition-all duration-500 flex flex-col justify-between group" 
                data-category="{{ $project->category }}" 
                data-title="{{ strtolower($project->title) }}" 
                data-tech="{{ strtolower($project->tech_stack ?? '') }}"
                data-aos="zoom-in" 
                data-aos-delay="{{ $loop->index * 60 }}">
                <div>
                    <!-- Visual Card Cover Header -->
                    <div class="h-56 bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 relative overflow-hidden">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-800 via-indigo-950 to-slate-900">
                                <svg class="w-20 h-20 text-indigo-400/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                        @endif

                        <!-- Hover Overlay with Live Action Buttons -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5">
                            <div class="flex gap-2.5 w-full">
                                @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="flex-1 text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow-lg transition flex items-center justify-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    <span>Live Preview</span>
                                </a>
                                @endif
                                @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="flex-1 text-center py-2.5 bg-slate-900/90 hover:bg-black text-white text-xs font-bold rounded-xl border border-slate-700 shadow-lg transition flex items-center justify-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    <span>Code</span>
                                </a>
                                @endif
                            </div>
                        </div>

                        <!-- Category Pill (Top-Right) -->
                        <div class="absolute top-3.5 right-3.5">
                            <span class="px-3 py-1 bg-black/60 backdrop-blur-md text-white text-xs font-bold rounded-full border border-white/10 shadow-sm">
                                {{ $project->category ?? 'Software' }}
                            </span>
                        </div>

                        <!-- Featured Star Badge (Top-Left) -->
                        @if($project->is_featured)
                        <div class="absolute top-3.5 left-3.5">
                            <span class="px-3 py-1 bg-amber-400 text-slate-950 text-xs font-black rounded-full shadow-lg flex items-center gap-1">
                                <span>★</span>
                                <span>Featured</span>
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2.5 text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                            {{ $project->title }}
                        </h3>
                        <p class="text-slate-600 dark:text-slate-300 text-sm mb-4 line-clamp-3 leading-relaxed">
                            {{ $project->description }}
                        </p>
                        
                        <!-- Tech Stack Chips -->
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(explode(',', $project->tech_stack ?? '') as $tech)
                                @if(trim($tech))
                                <span class="px-2.5 py-1 bg-indigo-50 dark:bg-indigo-950/60 text-indigo-700 dark:text-indigo-300 text-xs rounded-lg font-semibold border border-indigo-200/50 dark:border-indigo-800/50">
                                    {{ trim($tech) }}
                                </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Card Bottom Footer -->
                <div class="px-6 pb-6 pt-0 flex items-center justify-between border-t border-slate-100 dark:border-slate-800/80 mt-2 pt-4">
                    <div class="flex items-center gap-4">
                        @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="text-xs sm:text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-bold flex items-center gap-1">
                            <span>Live Preview</span>
                            <span>&rarr;</span>
                        </a>
                        @endif
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white font-semibold flex items-center gap-1 transition">
                            <span>Repository</span>
                        </a>
                        @endif
                    </div>

                    <!-- Share / Copy Link Button -->
                    @if($project->live_url || $project->github_url)
                    <button type="button" class="copy-project-link text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 p-1.5 rounded-lg transition" title="Copy project link" data-url="{{ $project->live_url ?: $project->github_url }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                    </button>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 bg-white dark:bg-[#0f172a] rounded-3xl border border-slate-200 dark:border-slate-800">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl">💼</div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-1">No Projects Found</h3>
                <p class="text-slate-500 text-sm">No project entries matching current criteria.</p>
            </div>
            @endforelse
        </div>

        <!-- No Search Results Notification -->
        <div id="noResults" class="hidden text-center py-20 bg-white dark:bg-[#0f172a] rounded-3xl border border-slate-200 dark:border-slate-800">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl">🔍</div>
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 mb-1">No Matching Projects</h3>
            <p class="text-slate-500 text-sm">Try searching with another keyword or resetting the category filter.</p>
        </div>
    </div>
</section>

<!-- Filter, Search & Clipboard JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.project-card');
    const searchInput = document.getElementById('projectSearchInput');
    const noResults = document.getElementById('noResults');

    let currentCategory = 'all';
    let searchQuery = '';

    function applyFilters() {
        let visibleCount = 0;

        cards.forEach(card => {
            const cardCat = (card.dataset.category || '').toLowerCase();
            const cardTitle = (card.dataset.title || '').toLowerCase();
            const cardTech = (card.dataset.tech || '').toLowerCase();

            const matchesCategory = (currentCategory === 'all' || cardCat === currentCategory);
            const matchesSearch = (!searchQuery || cardTitle.includes(searchQuery) || cardTech.includes(searchQuery));

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 30);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.95)';
                setTimeout(() => card.style.display = 'none', 250);
            }
        });

        if (noResults) {
            noResults.classList.toggle('hidden', visibleCount > 0);
        }
    }

    // Category button clicks
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/25');
                b.classList.add('bg-white', 'dark:bg-[#0f172a]', 'text-slate-700', 'dark:text-slate-300');
            });
            btn.classList.add('active', 'bg-indigo-600', 'text-white', 'shadow-lg', 'shadow-indigo-500/25');
            btn.classList.remove('bg-white', 'dark:bg-[#0f172a]', 'text-slate-700', 'dark:text-slate-300');

            currentCategory = btn.dataset.filter.toLowerCase();
            applyFilters();
        });
    });

    // Real-time keyword search
    searchInput?.addEventListener('input', (e) => {
        searchQuery = e.target.value.trim().toLowerCase();
        applyFilters();
    });

    // Copy project link handler
    document.querySelectorAll('.copy-project-link').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const url = btn.dataset.url;
            if (url) {
                navigator.clipboard.writeText(url).then(() => {
                    window.showToast?.('Project link copied to clipboard!');
                });
            }
        });
    });
});
</script>
@endsection