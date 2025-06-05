<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// Your main routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Blog routing
foreach (ArticleController::getRoutes() as $postRoute) {
    Route::{$postRoute['method']}($postRoute['uri'], [ArticleController::class, $postRoute['action']])
        ->name($postRoute['name']);
}

// Load authentication routes (login, register, etc)
require __DIR__ . '/auth.php';
