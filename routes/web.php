<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminPublicationController;
use App\Http\Controllers\Admin\AdminExperienceController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminQualificationController;
use App\Http\Controllers\Admin\AdminAchievementController;
use App\Http\Controllers\Admin\AdminMessageController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/publications', [PublicationController::class, 'index'])->name('publications');
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');
Route::get('/academic', [AcademicController::class, 'index'])->name('academic');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/download-cv', function () {
    $profile = \App\Models\Profile::first();
    if ($profile && $profile->resume_url) {
        return redirect($profile->resume_url);
    }
    return redirect()->route('contact')->with('success', 'To receive my full CV, please send me a message through the form below.');
})->name('cv.download');

// Redirect default breeze dashboard to admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Admin routes (authenticated)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // Projects CRUD
    Route::resource('projects', AdminProjectController::class);

    // Publications CRUD
    Route::resource('publications', AdminPublicationController::class);

    // Experiences CRUD
    Route::resource('experiences', AdminExperienceController::class);

    // Qualifications CRUD
    Route::resource('qualifications', AdminQualificationController::class);

    // Achievements CRUD
    Route::resource('achievements', AdminAchievementController::class);

    // Skills CRUD
    Route::resource('skills', AdminSkillController::class);

    // Messages
    Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');
});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
