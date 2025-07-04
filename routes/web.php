<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuntingAssociationController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/hasici', function () {
    return view('ff');
})->name('ff');

// aktuality
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/honebni-spolecenstvo', [HuntingAssociationController::class, 'index'])
     ->name('hunting.association');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kontakt', function () {
        return view('contact');
    })->name('contact');
});

require __DIR__.'/auth.php';
