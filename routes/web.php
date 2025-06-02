<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Breeze / Laravel starter routes
Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('', [TaskController::class, 'index'])->name('home');
    Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('', [TaskController::class, 'store'])->name('tasks.store');
    //Route::post('{task}', [TaskController::class, 'toggleCompleted'])->name('tasks.toggleCompleted');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::view('/about', 'about')->name('about');

    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/comments', [PostController::class, 'storeComment'])->name('posts.storeComment');

    Route::resource('projects', ProjectController::class);
});

// Load Breeze authentication routes (login, register, etc)
require __DIR__ . '/auth.php';
