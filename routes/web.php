<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');

    })->name('home');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    foreach (ArticleController::getRoutes() as $postRoute) {
        Route::{$postRoute['method']}($postRoute['uri'], [ArticleController::class, $postRoute['action']])->name($postRoute['name']);
    }
});

require __DIR__ . '/auth.php';
