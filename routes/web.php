<?php

use App\Http\Controllers\BoardGameReviewController;
use App\Http\Controllers\GameNightController;
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

Route::prefix('boardgames')->name('boardgames.')->group(function () {
    Route::get('/', [BoardGameController::class, 'index'])->name('index');
    Route::middleware('auth')->group(function () {
        Route::post('/store', [BoardGameController::class, 'store'])->name('store');
        Route::get('/create', [BoardGameController::class, 'create'])->name('create');
        Route::post('/{boardGame}/review', [BoardGameReviewController::class, 'store'])->name('reviews.store');
        Route::get('/{boardGame}', [BoardGameController::class, 'show'])->name('show');
        Route::delete('/{boardGame}/reviews', [BoardGameReviewController::class, 'destroy'])->name('reviews.destroy');
    });
    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/edit/{boardgame}', [BoardGameController::class, 'edit'])->name('edit');
        Route::delete('/delete/{boardgame}', [BoardGameController::class, 'destroy'])->name('destroy');
        Route::patch('/{boardgame}', [BoardGameController::class, 'update'])->name('update');
    });
});

Route::prefix('gamenights')->name('gamenights.')->group(function () {
    Route::get('/', [GameNightController::class, 'index'])->name('index');
    Route::middleware('auth')->group(function () {
        Route::post('/store', [GameNightController::class, 'store'])->name('store');
        Route::get('/create', [GameNightController::class, 'create'])->name('create');
    });
});

Route::get('/language/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::patch('/user/{user}/role', [AdminController::class, 'updateRole'])->name('updateRole');
        Route::prefix('boardgames')->name('boardgames.')->group(function () {
            Route::get('/pending', [BoardGameController::class, 'pending'])->name('pendingGames');
            Route::get('/{boardGame}', [AdminController::class, 'show'])->name('show');
            Route::patch('/{boardGame}/approve', [BoardGameController::class, 'approve'])->name('approve');
            Route::patch('/{boardGame}/deny', [BoardGameController::class, 'deny'])->name('deny');
        });
    });
});

require __DIR__.'/auth.php';
