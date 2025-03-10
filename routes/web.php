<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    Route::get('edition/create', [App\Http\Controllers\EditionController::class, 'create'])->name('admin.edition.create');
    Route::post('edition', [App\Http\Controllers\EditionController::class, 'store'])->name('admin.edition.store');

});
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
