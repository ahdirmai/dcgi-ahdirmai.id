<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class);
Route::get('/galery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/achievements', [App\Http\Controllers\AchievementController::class, 'index'])->name('achievements.index');
Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members.index');

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('vision-mission', App\Http\Controllers\Admin\VisionMissionController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('albums', App\Http\Controllers\Admin\AlbumController::class);
    Route::get('achievements/template', [App\Http\Controllers\Admin\AchievementController::class, 'downloadTemplate'])->name('achievements.template');
    Route::post('achievements/import', [App\Http\Controllers\Admin\AchievementController::class, 'import'])->name('achievements.import');
    Route::post('achievements/{achievement}/toggle-featured', [App\Http\Controllers\Admin\AchievementController::class, 'toggleFeatured'])->name('achievements.toggle-featured');
    Route::resource('achievements', App\Http\Controllers\Admin\AchievementController::class);

    Route::get('site-content', [App\Http\Controllers\Admin\SiteContentController::class, 'index'])->name('site-content.index');
    Route::patch('site-content', [App\Http\Controllers\Admin\SiteContentController::class, 'update'])->name('site-content.update');
    Route::post('site-content/sponsor', [App\Http\Controllers\Admin\SiteContentController::class, 'storeSponsor'])->name('site-content.sponsor.store');
    Route::delete('site-content/sponsor/{id}', [App\Http\Controllers\Admin\SiteContentController::class, 'destroySponsor'])->name('site-content.sponsor.destroy');

    Route::get('team/template', [App\Http\Controllers\Admin\TeamMemberController::class, 'downloadTemplate'])->name('team.template');
    Route::post('team/import', [App\Http\Controllers\Admin\TeamMemberController::class, 'import'])->name('team.import');
    Route::post('/team/{id}/toggle-star', [App\Http\Controllers\Admin\TeamMemberController::class, 'toggleStar'])->name('team.toggle-star');
    Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
