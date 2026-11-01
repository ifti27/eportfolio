@extends('layouts.public')
@section('title', 'Publications')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#090d16] transition-colors duration-300 relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold mb-4">
                <span>📚</span>
                <span>Scientific Research</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-white tracking-tight">
                Research & Publications
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Peer-reviewed academic papers, conference proceedings, and technical journals
            </p>
        </div>

        <!-- Research Highlights Bar -->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 rounded-xl bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 text-center shadow-sm">
                <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white font-mono block">{{ $publications->count() }}</span>
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Papers</span>
            </div>
            <div class="p-4 rounded-xl bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 text-center shadow-sm">
                <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white font-mono block">{{ $publications->whereNotNull('doi_url')->count() }}</span>
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Indexed DOIs</span>
            </div>
            <div class="p-4 rounded-xl bg-white dark:bg-[#0f172a] border border-slate-200 dark:border-slate-800 text-center shadow-sm col-span-2 sm:col-span-1">
                <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white font-mono block">{{ $publications->whereNotNull('pdf_url')->count() }}</span>
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">Available PDFs</span>
            </div>
        </div>

        <!-- Publications List -->
        <div class="space-y-6" id="publicationsList">
            @forelse($publications as $pub)
            <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 shadow-sm border border-slate-200 dark:border-slate-800 relative transition-all duration-300 group hover:border-slate-300 dark:hover:border-slate-700" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <!-- Icon Box -->
                    <div class="flex-shrink-0 w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-xl flex items-center justify-center text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>

                    <!-- Details -->
                    <div class="flex-1 w-full">
                        <div class="flex flex-wrap items-start justify-between gap-3 mb-2">
                            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors leading-snug">
                                {{ $pub->title }}
                            </h3>
                            @if($pub->year)
                            <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-semibold rounded-md border border-slate-200 dark:border-slate-700 flex items-center gap-1 font-mono">
                                <span>{{ $pub->year }}</span>
                            </span>
                            @endif
                        </div>

                        <!-- Authors list -->
                        @if($pub->authors)
                        <div class="flex items-center gap-2 text-xs sm:text-sm text-slate-600 dark:text-slate-400 mb-2">
                            <span class="font-semibold text-slate-700 dark:text-slate-300">Authors:</span>
                            <span>{{ $pub->authors }}</span>
                        </div>
                        @endif

                        <!-- Journal / Venue badge -->
                        @if($pub->journal)
                        <div class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 px-2.5 py-1 rounded-md border border-slate-200 dark:border-slate-700 mb-3">
                            <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            <span>{{ $pub->journal }}</span>
                        </div>
                        @endif

                        <!-- Abstract with smooth toggle -->
                        @if($pub->abstract)
                        <div class="mb-4">
                            <p class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm leading-relaxed abstract-text line-clamp-2" id="abstract-{{ $loop->index }}">
                                {{ $pub->abstract }}
                            </p>
                            @if(strlen($pub->abstract) > 140)
                            <button type="button" class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline mt-1.5 toggle-abstract-btn cursor-pointer" data-target="abstract-{{ $loop->index }}">
                                Show Full Abstract &darr;
                            </button>
                            @endif
                        </div>
                        @endif

                        <!-- Interactive Action Buttons -->
                        <div class="flex flex-wrap items-center gap-2 pt-3 border-t border-slate-100 dark:border-slate-800">
                            @if($pub->doi_url)
                            <a href="{{ $pub->doi_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700 transition">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                <span>DOI Link</span>
                            </a>
                            @endif

                            @if($pub->pdf_url)
                            <a href="{{ $pub->pdf_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700 transition">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <span>Download PDF</span>
                            </a>
                            @endif

                            <!-- Copy Citation Button -->
                            @php
                                $citationText = ($pub->authors ? $pub->authors . '. ' : '') . '("' . $pub->title . '"). ' . ($pub->journal ? $pub->journal . ', ' : '') . ($pub->year ? $pub->year . '. ' : '') . ($pub->doi_url ? 'DOI: ' . $pub->doi_url : '');
                            @endphp
                            <button type="button" class="copy-citation-btn inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700 transition cursor-pointer ml-auto" data-citation="{{ $citationText }}">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Cite</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-20 bg-white dark:bg-[#0f172a] rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 text-xl">📚</div>
                <h3 class="text-base font-bold text-slate-800 dark:text-slate-200 mb-1">No Publications Added Yet</h3>
                <p class="text-slate-500 text-sm">Research papers will appear here once published or indexed.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Publications Interactive JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Toggle Abstract Expand/Collapse
    document.querySelectorAll('.toggle-abstract-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                const isExpanded = !targetEl.classList.contains('line-clamp-2');
                if (isExpanded) {
                    targetEl.classList.add('line-clamp-2');
                    this.innerHTML = 'Show Full Abstract &darr;';
                } else {
                    targetEl.classList.remove('line-clamp-2');
                    this.innerHTML = 'Collapse Abstract &uarr;';
                }
            }
        });
    });

    // 2. Copy Citation to Clipboard
    document.querySelectorAll('.copy-citation-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const citation = this.dataset.citation;
            if (citation) {
                navigator.clipboard.writeText(citation).then(() => {
                    window.showToast?.('Citation copied to clipboard!');
                });
            }
        });
    });
});
</script>
@endsection