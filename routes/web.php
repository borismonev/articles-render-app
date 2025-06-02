<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

// Static pages
foreach (StaticPageController::getRoutes() as $name => $view) {
    Route::get("/{$name}", fn() => view($view))->name($name);
}

// Blog routing
foreach (PostController::getRoutes() as $postRoute) {
    Route::{$postRoute['method']}($postRoute['uri'], [PostController::class, $postRoute['action']])->name($postRoute['name']);
}
