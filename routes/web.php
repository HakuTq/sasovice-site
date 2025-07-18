<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuntingAssociationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LanguageController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HuntingAssociationController::class, 'index'])
     ->name('hunting.association');

Route::get('/contact', [ContactsController::class, 'index'])->name('contact');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

Route::get('/land', function () {
    return view('land');
})->name('land');

Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

require __DIR__.'/auth.php';
