<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\WelcomeController::class);
Route::get('/galery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members.index');

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('vision-mission', App\Http\Controllers\Admin\VisionMissionController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('albums', App\Http\Controllers\Admin\AlbumController::class);
    Route::resource('achievements', App\Http\Controllers\Admin\AchievementController::class);
    Route::resource('achievements', App\Http\Controllers\Admin\AchievementController::class);
    
    Route::get('team/template', [App\Http\Controllers\Admin\TeamMemberController::class, 'downloadTemplate'])->name('team.template');
    Route::post('team/import', [App\Http\Controllers\Admin\TeamMemberController::class, 'import'])->name('team.import');
    Route::resource('team', App\Http\Controllers\Admin\TeamMemberController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
