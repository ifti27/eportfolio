@extends('layouts.public')
@section('title', 'Contact Me')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#080c15] transition-colors duration-300 relative overflow-hidden">
    <!-- Ambient glowing backdrop orbs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute w-96 h-96 bg-indigo-500/10 dark:bg-indigo-500/15 rounded-full blur-3xl -top-20 -left-20 animate-pulse-slow"></div>
        <div class="absolute w-96 h-96 bg-purple-500/10 dark:bg-purple-500/15 rounded-full blur-3xl bottom-20 -right-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-950/60 border border-indigo-200 dark:border-indigo-800 text-indigo-700 dark:text-indigo-300 text-xs font-bold mb-4 shadow-sm">
                <span>✉️</span>
                <span>Get In Touch</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-slate-100 tracking-tight">
                Let's <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Connect</span>
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Have an engineering project in mind, an exciting role, or research collaboration? Send me a message below!
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-10">
            <!-- Left Column: Direct Contact Info & Networks (5 cols) -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                <!-- Contact Details Card -->
                <div class="card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-7 sm:p-8 shadow-sm border border-slate-200/80 dark:border-slate-800/80 relative overflow-hidden">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800/80">
                        <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold text-lg shadow-sm">
                            📫
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-slate-100">Contact Information</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Direct communication channels</p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        @if($profile->email ?? false)
                        <div class="group/item p-4 rounded-2xl bg-slate-50 dark:bg-[#0c1222] border border-slate-200/60 dark:border-slate-800/80 flex items-center justify-between gap-3 hover:border-indigo-500/50 transition">
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Email Address</p>
                                    <a href="mailto:{{ $profile->email }}" class="text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold text-xs sm:text-sm truncate block transition">{{ $profile->email }}</a>
                                </div>
                            </div>
                            <button type="button" class="copy-text-btn p-2 rounded-lg text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-200/60 dark:hover:bg-slate-800 transition flex-shrink-0 cursor-pointer" title="Copy email address" data-copy="{{ $profile->email }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            </button>
                        </div>
                        @endif

                        @if($profile->phone ?? false)
                        <div class="group/item p-4 rounded-2xl bg-slate-50 dark:bg-[#0c1222] border border-slate-200/60 dark:border-slate-800/80 flex items-center justify-between gap-3 hover:border-indigo-500/50 transition">
                            <div class="flex items-center gap-3.5 min-w-0">
                                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Direct Phone</p>
                                    <a href="tel:{{ $profile->phone }}" class="text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold text-xs sm:text-sm block transition">{{ $profile->phone }}</a>
                                </div>
                            </div>
                            <button type="button" class="copy-text-btn p-2 rounded-lg text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-slate-200/60 dark:hover:bg-slate-800 transition flex-shrink-0 cursor-pointer" title="Copy phone number" data-copy="{{ $profile->phone }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            </button>
                        </div>
                        @endif

                        @if($profile->location ?? false)
                        <div class="p-4 rounded-2xl bg-slate-50 dark:bg-[#0c1222] border border-slate-200/60 dark:border-slate-800/80 flex items-center gap-3.5">
                            <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Location & Timezone</p>
                                <p class="text-slate-800 dark:text-slate-200 font-bold text-xs sm:text-sm">{{ $profile->location }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Fast response time indicator -->
                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Estimated response turnaround: within 24 hours</span>
                    </div>
                </div>

                <!-- Professional Networks Card (GitHub & LinkedIn only — No Twitter) -->
                <div class="card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-7 sm:p-8 shadow-sm border border-slate-200/80 dark:border-slate-800/80">
                    <h3 class="text-lg font-bold mb-4 text-slate-900 dark:text-slate-100 flex items-center gap-2">
                        <span>🌐</span>
                        <span>Professional Profiles</span>
                    </h3>
                    <div class="grid grid-cols-2 gap-3">
                        @if($profile->github_url ?? false)
                        <a href="{{ $profile->github_url }}" target="_blank" class="p-4 rounded-2xl bg-slate-50 dark:bg-[#0c1222] border border-slate-200/80 dark:border-slate-800/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-slate-900 transition-all duration-300 shadow-sm flex flex-col items-center justify-center gap-2 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            <span class="text-xs font-bold">GitHub</span>
                        </a>
                        @endif
                        @if($profile->linkedin_url ?? false)
                        <a href="{{ $profile->linkedin_url }}" target="_blank" class="p-4 rounded-2xl bg-slate-50 dark:bg-[#0c1222] border border-slate-200/80 dark:border-slate-800/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-blue-600 transition-all duration-300 shadow-sm flex flex-col items-center justify-center gap-2 group">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <span class="text-xs font-bold">LinkedIn</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive Contact Form (7 cols) -->
            <div class="lg:col-span-7" data-aos="fade-left">
                <form action="{{ route('contact.store') }}" method="POST" class="card-hover bg-white dark:bg-[#0f172a] rounded-3xl p-7 sm:p-10 shadow-sm border border-slate-200/80 dark:border-slate-800/80 relative overflow-hidden" id="contactForm">
                    @csrf
                    <!-- Subtle top gradient accent -->
                    <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                    <h3 class="text-xl sm:text-2xl font-black mb-2 text-slate-900 dark:text-slate-100">Send an Inquiry</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm mb-8">Leave your project scope or message and I'll reply promptly.</p>
                    
                    @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-xs sm:text-sm flex items-center gap-3">
                        <svg class="w-5 h-5 flex-shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3.5 rounded-2xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-sm font-medium"
                                placeholder="Your full name">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3.5 rounded-2xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-sm font-medium"
                                placeholder="name@company.com">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-2">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                            class="w-full px-4 py-3.5 rounded-2xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-sm font-medium"
                            placeholder="Software Engineering / IoT Project / Recruitment">
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-300">Your Message *</label>
                            <span class="text-[10px] text-slate-400 font-mono" id="charCounter">0 / 2000</span>
                        </div>
                        <textarea name="body" id="messageBody" rows="6" required
                            class="w-full px-4 py-3.5 rounded-2xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition resize-none text-sm font-medium"
                            placeholder="Provide details about your project or opportunity...">{{ old('body') }}</textarea>
                        @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" id="submitBtn" class="btn-shimmer w-full px-8 py-4 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-white font-extrabold rounded-2xl transition-all duration-300 shadow-xl shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5 flex items-center justify-center gap-2.5 cursor-pointer text-sm">
                        <svg id="submitIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        <span id="submitText">Send Message Directly</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const msgInput = document.getElementById('messageBody');
    const charCounter = document.getElementById('charCounter');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');

    // 1. Live character counter
    msgInput?.addEventListener('input', () => {
        const count = msgInput.value.length;
        if (charCounter) {
            charCounter.textContent = `${count} / 2000`;
        }
    });

    // 2. Real-time blur validation border
    const inputs = form?.querySelectorAll('input[required], textarea[required]');
    inputs?.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('border-red-500');
                this.classList.remove('border-emerald-500');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-emerald-500');
            }
        });
    });

    // 3. Form submit spinner state
    form?.addEventListener('submit', () => {
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
            if (submitText) submitText.textContent = 'Transmitting Message...';
        }
    });

    // 4. Click to copy direct info
    document.querySelectorAll('.copy-text-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const copyVal = this.dataset.copy;
            if (copyVal) {
                navigator.clipboard.writeText(copyVal).then(() => {
                    window.showToast?.('Copied: ' + copyVal);
                });
            }
        });
    });
});
</script>
@endsection