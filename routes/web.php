<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\FrameController;
use App\Http\Controllers\PhotoboothController;

// Rute landing page
Route::get('/', function () {
    return view('welcome');
})->name('home');

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
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Rute photobooth
Route::get('/booth', [PhotoboothController::class, 'index'])->name('booth');
