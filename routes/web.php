<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CategoryController;

Route::get('/', function () {
    return view('backend.dashboard');
});

// backend
Route::prefix('panel')
    // ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('dashboard', function () {
            return view('backend.dashboard');
        });

        Route::get('categories/serverside', [CategoryController::class, 'serverside'])->name('panel.categories.serverside');
        Route::resource('categories', CategoryController::class)->names('panel.categories');

        Route::get('tags/serverside', [TagController::class, 'serverside'])->name('panel.tags.serverside');
        Route::resource('tags', TagController::class)->names('panel.tags');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
