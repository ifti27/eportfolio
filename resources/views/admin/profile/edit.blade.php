@extends('layouts.admin')
@section('title', 'Edit Profile')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Profile & Bio Information</h1>
            <p class="text-gray-500 text-sm mt-1">This information is displayed on your homepage hero, about, and footer sections</p>
        </div>
    </div>

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-2xl p-6 sm:p-8 border border-gray-200 dark:border-gray-700 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        <!-- Avatar preview & upload -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 pb-6 border-b border-gray-100 dark:border-gray-700">
            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100 dark:bg-gray-700 border-2 border-indigo-500/50 flex-shrink-0">
                @if($profile->avatar)
                    <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center font-bold text-2xl text-gray-400">
                        {{ substr($profile->name ?? 'A', 0, 1) }}
                    </div>
                @endif
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Avatar / Profile Picture</label>
                <input type="file" name="avatar" accept="image/*" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/40 dark:file:text-indigo-300 cursor-pointer">
                <p class="text-xs text-gray-400 mt-1">Upload a clear photo (JPG, PNG, or WEBP up to 4MB). It will automatically render in the circular frame.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Primary Title</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Software Engineer & IoT Researcher">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Animated Typing Titles (comma-separated)</label>
            <input type="text" name="typing_titles" value="{{ old('typing_titles', is_array($profile->typing_titles) ? implode(', ', $profile->typing_titles) : $profile->typing_titles) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Full Stack Developer, IoT Specialist, Problem Solver">
            <p class="text-xs text-gray-400 mt-1">These words cycle with a typewriter effect in the hero section</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Biography / About Me</label>
            <textarea name="bio" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <!-- Co-Curricular Activities -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Co-Curricular & Leadership Activities (One per line)</label>
            <textarea name="co_curricular" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="• President, University Robotics Club (2023 - 2024)&#10;• Finalist, National IoT Hackathon 2023&#10;• Volunteer Mentor, Tech Education Initiative">{{ old('co_curricular', $profile->co_curricular) }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Appears seamlessly on the Home page alongside skills without requiring a dedicated navigation page.</p>
        </div>

        <!-- Contact details displayed in footer and contact page -->
        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Location / Address</label>
                <input type="text" name="location" value="{{ old('location', $profile->location) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Dhaka, Bangladesh">
            </div>
        </div>

        <!-- Social Networks -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <!-- Resume / CV Upload & Link -->
        <div class="p-5 rounded-2xl bg-indigo-50/50 dark:bg-indigo-950/30 border border-indigo-100 dark:border-indigo-900/40 space-y-4">
            <h3 class="text-sm font-bold text-indigo-900 dark:text-indigo-200 flex items-center gap-2">
                <span>📄</span>
                <span>Curriculum Vitae (CV) / Resume Management</span>
            </h3>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Upload CV File (.pdf, .doc)</label>
                    <input type="file" name="resume_file" accept=".pdf,.doc,.docx" class="text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer">
                    <p class="text-xs text-gray-400 mt-1">Upload your latest PDF. It will automatically power the "Download CV" button.</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Or Direct CV URL / Cloud Link</label>
                    <input type="text" name="resume_url" value="{{ old('resume_url', $profile->resume_url) }}" class="w-full px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-sm outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://drive.google.com/... or /storage/resumes/...">
                    @if($profile->resume_url)
                    <div class="mt-1.5 text-xs text-indigo-600 dark:text-indigo-400">
                        Current CV: <a href="{{ $profile->resume_url }}" target="_blank" class="underline font-semibold">View current file &rarr;</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition">
                Save Profile Changes
            </button>
        </div>
    </form>
</div>
@endsection
