<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ComentsController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/cards',[CardController::class,'index'])->name('cards.index');
    Route::get('/cards/create',[CardController::class,'create'])->name('cards.create');
    Route::get('/cards/{card}',[CardController::class,'show'])->name('cards.show');
    Route::post('/cards',[CardController::class,'store'])->name('cards.store');

    Route::get('/cards/{card}/edit',[CardController::class,'edit'])->name('cards.edit');
    Route::put('/cards/{card}',[CardController::class,'update'])->name('cards.update');
    Route::delete('/cards/{card}',[CardController::class,'destroy'])->name('cards.destroy');

    Route::resource('coments', ComentsController::class);
    Route::post('cards/{card}/reviews',[ComentsController::class,'store'])->name('reviews.store');

require __DIR__.'/auth.php';


