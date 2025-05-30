<?php

use App\Http\Controllers\BoardGameReviewController;
use App\Http\Controllers\GameNightController;
use App\Http\Controllers\GameSuggestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BoardGameController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

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
    Route::controller(GameNightController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::post('/{gameNight}/register', 'register')->name('register');
            Route::delete('/{gameNight}/unregister', 'unregister')->name('unregister');
            Route::post('/store', 'store')->name('store');
            Route::get('/create', 'create')->name('create');
        });
        Route::get('/', 'index')->name('index');
        Route::get('/{gameNight}', 'show')->name('show');
    });
    Route::controller(GameSuggestionController::class)->group(function () {
        Route::middleware('auth')->group(function () {
            Route::post('/{gameNight}/suggest', 'store')->name('suggest');
            Route::post('/{gameNight}/vote/{suggestion}', 'vote')->name('vote');
        });
    });
});

Route::middleware('language')->group(function () {
    Route::get('/language/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
});

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
