<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\FrameController;
use App\Http\Controllers\Admin\FrameImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoboothController;

// routes/web.php
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute autentikasi admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Rute admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', function () {
        // Redirect ke login jika belum login
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }
        return view('admin.dashboard');
    })->name('dashboard');

    // Rute CRUD frame
    Route::get('/frames', [FrameController::class, 'index'])->name('frames.index');
    Route::get('/frames/create', [FrameController::class, 'create'])->name('frames.create');
    Route::post('/frames', [FrameController::class, 'store'])->name('frames.store');
    Route::get('/frames/{frame}', [FrameController::class, 'show'])->name('frames.show');
    Route::get('/frames/{frame}/edit', [FrameController::class, 'edit'])->name('frames.edit');
    Route::put('/frames/{frame}', [FrameController::class, 'update'])->name('frames.update');
    Route::delete('/frames/{frame}', [FrameController::class, 'destroy'])->name('frames.destroy');

    Route::get('/frameimages', [FrameImageController::class, 'index'])->name('frameimages.index');
    Route::get('/frameimages/create', [FrameImageController::class, 'create'])->name('frameimages.create');
    Route::post('/frameimages', [FrameImageController::class, 'store'])->name('frameimages.store');
    Route::get('/frameimages/{frameimage}', [FrameImageController::class, 'show'])->name('frameimages.show');
    Route::get('/frameimages/{frameimage}/edit', [FrameImageController::class, 'edit'])->name('frameimages.edit');
    Route::put('/frameimages/{frameimage}', [FrameImageController::class, 'update'])->name('frameimages.update');
    Route::delete('/frameimages/{frameimage}', [FrameImageController::class, 'destroy'])->name('frameimages.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute photobooth
Route::get('/booth', [PhotoboothController::class, 'index'])->name('booth');
