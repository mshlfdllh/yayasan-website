<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ProgramController;
use App\Http\Controllers\Public\AchievementController;
use App\Http\Controllers\Public\GalleryController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\DonationController;
use App\Http\Controllers\Public\ContactController;
use Illuminate\Support\Facades\Route;

// ============================================================
// PUBLIC ROUTES
// ============================================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');
Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{news:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/donasi', [DonationController::class, 'index'])->name('donation.index');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');

// ============================================================
// ADMIN AUTH ROUTES
// ============================================================

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest middleware (not logged in)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    });

    // Auth middleware (must be logged in and admin)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Livewire-powered pages
        Route::get('/prestasi',  fn() => view('admin.achievements.index'))->name('achievements.index');
        Route::get('/galeri',    fn() => view('admin.gallery.index'))->name('gallery.index');
        Route::get('/program',   fn() => view('admin.programs.index'))->name('programs.index');
        Route::get('/berita',    fn() => view('admin.news.index'))->name('news.index');
        Route::get('/donasi',    [\App\Http\Controllers\Admin\DonationController::class, 'index'])->name('donations.index');
        Route::patch('/donasi/{donation}/confirm', [\App\Http\Controllers\Admin\DonationController::class, 'confirm'])->name('donations.confirm');
        Route::get('/pengguna',  [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/pengaturan', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('/pengaturan', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});