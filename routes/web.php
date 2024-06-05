<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
    Route::get('/contacts/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
    Route::post('/contacts', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/contacts-search', [\App\Http\Controllers\ContactController::class, 'searchPage'])->name('contact.search-page');
    Route::post('/contacts-search', [\App\Http\Controllers\ContactController::class, 'search'])->name('contact.search');
});

require __DIR__.'/auth.php';
