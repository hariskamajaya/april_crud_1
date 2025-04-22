<?php

use App\Http\Controllers\LemariController;
use App\Http\Controllers\ProfileController;
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

//route lemari
Route::get('lemari', [LemariController::class, 'index'])->name('lemari.index');
Route::get('lemari/create', [LemariController::class, 'create'])->name('lemari.create');


require __DIR__.'/auth.php';
