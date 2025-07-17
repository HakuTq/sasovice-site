<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuntingAssociationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HuntingAssociationController::class, 'index'])
     ->name('hunting.association');

Route::get('/contact', [ContactsController::class, 'index'])->name('contact');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
