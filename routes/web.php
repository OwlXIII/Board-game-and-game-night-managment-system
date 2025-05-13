<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BoardGameController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::redirect('/dashboard', '/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/boardgames', [BoardGameController::class, 'index'])->name('boardgames.index');

Route::get('/language/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/user/{user}/role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
});

require __DIR__.'/auth.php';
