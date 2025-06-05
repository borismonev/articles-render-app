<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Breeze / Laravel starter routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Your old routes — add them here
Route::middleware('auth')->group(function () {
    foreach (ArticleController::getRoutes() as $postRoute) {
        Route::{$postRoute['method']}($postRoute['uri'], [ArticleController::class, $postRoute['action']])->name($postRoute['name']);
    }
});

// Load Breeze authentication routes (login, register, etc)
require __DIR__ . '/auth.php';
