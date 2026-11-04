@extends('layouts.public')
@section('title', 'Contact Me')

@section('content')
<section class="py-20 min-h-screen bg-slate-50 dark:bg-[#090d16] transition-colors duration-300 relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-xs font-semibold mb-4">
                <span>✉️</span>
                <span>Get In Touch</span>
            </span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 text-slate-900 dark:text-white tracking-tight">
                Let's Connect
            </h1>
            <p class="text-slate-600 dark:text-slate-400 max-w-2xl mx-auto text-base sm:text-lg">
                Have an engineering project in mind, an exciting role, or research collaboration? Send me a message below!
            </p>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">
            <!-- Left Column: Direct Contact Info & Networks (5 cols) -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-up">
                <!-- Contact Details Card -->
                <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 shadow-sm border border-slate-200 dark:border-slate-800 relative">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100 dark:border-slate-800">
                        <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 flex items-center justify-center font-bold text-lg">
                            📫
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Contact Information</h3>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Direct communication channels</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        @if($profile->email ?? false)
                        <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-9 h-9 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Email Address</p>
                                    <a href="mailto:{{ $profile->email }}" class="text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 font-semibold text-xs sm:text-sm truncate block transition">{{ $profile->email }}</a>
                                </div>
                            </div>
                            <button type="button" class="copy-text-btn p-1.5 rounded-md text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-200/60 dark:hover:bg-slate-700 transition flex-shrink-0 cursor-pointer" title="Copy email address" data-copy="{{ $profile->email }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            </button>
                        </div>
                        @endif

                        @if($profile->phone ?? false)
                        <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="w-9 h-9 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Direct Phone</p>
                                    <a href="tel:{{ $profile->phone }}" class="text-slate-800 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 font-semibold text-xs sm:text-sm block transition">{{ $profile->phone }}</a>
                                </div>
                            </div>
                            <button type="button" class="copy-text-btn p-1.5 rounded-md text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-200/60 dark:hover:bg-slate-700 transition flex-shrink-0 cursor-pointer" title="Copy phone number" data-copy="{{ $profile->phone }}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            </button>
                        </div>
                        @endif

                        @if($profile->location ?? false)
                        <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 flex items-center gap-3">
                            <div class="w-9 h-9 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Location & Timezone</p>
                                <p class="text-slate-800 dark:text-slate-200 font-semibold text-xs sm:text-sm">{{ $profile->location }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Fast response time indicator -->
                    <div class="mt-5 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Estimated response turnaround: within 24 hours</span>
                    </div>
                </div>

                <!-- Professional Networks Card (GitHub & LinkedIn only — No Twitter) -->
                <div class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-7 shadow-sm border border-slate-200 dark:border-slate-800">
                    <h3 class="text-base font-bold mb-3 text-slate-900 dark:text-white flex items-center gap-2">
                        <span>🌐</span>
                        <span>Professional Profiles</span>
                    </h3>
                    <div class="grid grid-cols-2 gap-3">
                        @if($profile->github_url ?? false)
                        <a href="{{ $profile->github_url }}" target="_blank" class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-slate-900 dark:hover:bg-slate-700 transition flex items-center justify-center gap-2 group text-xs font-semibold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                            <span>GitHub</span>
                        </a>
                        @endif
                        @if($profile->linkedin_url ?? false)
                        <a href="{{ $profile->linkedin_url }}" target="_blank" class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200/80 dark:border-slate-700/80 text-slate-700 dark:text-slate-300 hover:text-white hover:bg-blue-600 transition flex items-center justify-center gap-2 group text-xs font-semibold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            <span>LinkedIn</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Clean Professional Contact Form (7 cols) -->
            <div class="lg:col-span-7" data-aos="fade-up" data-aos-delay="100">
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white dark:bg-[#0f172a] rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200 dark:border-slate-800" id="contactForm">
                    @csrf
                    <h3 class="text-xl font-bold mb-1 text-slate-900 dark:text-white">Send an Inquiry</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-sm mb-6">Leave your project scope or message and I'll reply promptly.</p>
                    
                    @if(session('success'))
                    <div class="mb-5 p-3.5 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-xs sm:text-sm flex items-center gap-2.5">
                        <svg class="w-4 h-4 flex-shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-slate-400 dark:focus:ring-slate-500 focus:border-transparent outline-none transition text-sm"
                                placeholder="Your full name">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-slate-400 dark:focus:ring-slate-500 focus:border-transparent outline-none transition text-sm"
                                placeholder="name@company.com">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-slate-400 dark:focus:ring-slate-500 focus:border-transparent outline-none transition text-sm"
                            placeholder="Software Engineering / IoT Project / Recruitment">
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300">Your Message *</label>
                            <span class="text-[10px] text-slate-400 font-mono" id="charCounter">0 / 2000</span>
                        </div>
                        <textarea name="body" id="messageBody" rows="5" required
                            class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-[#080c15] text-slate-800 dark:text-slate-100 focus:ring-2 focus:ring-slate-400 dark:focus:ring-slate-500 focus:border-transparent outline-none transition resize-none text-sm"
                            placeholder="Provide details about your project or opportunity...">{{ old('body') }}</textarea>
                        @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" id="submitBtn" class="w-full px-6 py-3.5 bg-slate-900 hover:bg-slate-800 dark:bg-indigo-600 dark:hover:bg-indigo-500 text-white font-semibold rounded-xl transition shadow-sm flex items-center justify-center gap-2 cursor-pointer text-sm">
                        <svg id="submitIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
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

    // 3. Form submit handler (supports both local Laravel POST and static GitHub Pages mailto)
    form?.addEventListener('submit', (e) => {
        // If hosted statically (GitHub Pages or local file)
        if (window.location.protocol === 'file:' || window.location.hostname.includes('github.io')) {
            e.preventDefault();
            const name = form.querySelector('[name="name"]')?.value || '';
            const email = form.querySelector('[name="email"]')?.value || '';
            const subject = form.querySelector('[name="subject"]')?.value || 'Portfolio Inquiry';
            const body = form.querySelector('[name="body"]')?.value || '';
            const targetEmail = "{{ $profile->email ?? 'muhtasin.ifti@gmail.com' }}";
            
            const mailtoUrl = `mailto:${targetEmail}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent("Sender: " + name + " (" + email + ")\n\n" + body)}`;
            window.location.href = mailtoUrl;

            if (window.showToast) {
                window.showToast('Opening your email client to send message to ' + targetEmail);
            }
            form.reset();
            return;
        }

        // Running on local Laravel server
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