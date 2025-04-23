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

    // routing untuk lemari
    //route lemari
    Route::get('lemari', [LemariController::class, 'index'])->name('lemari.index'); //route index menamplilkan halaman list data
    Route::get('lemari/create', [LemariController::class, 'create'])->name('lemari.create'); //route untuk menampilkan halaman create
    Route::post('lemari', [LemariController::class, 'store'])->name('lemari.post'); // route mengirimkan data lemari
    Route::get('lemari/{param}', [LemariController::class, 'show'])->name('lemari.show'); //route detail menampilkan halaman detail lemari
    Route::put('lemari/{param}', [LemariController::class, 'update'])->name('lemari.update'); //route mengupdate data lemari
    Route::delete('lemari/{param}', [LemariController::class, 'delete'])->name('lemari.delete'); //route menghapus data lemari.


});


require __DIR__ . '/auth.php';
