<?php

use App\Http\Controllers\BukuController;
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


    // Route buku
    Route::get('buku', [BukuController::class, 'index'])->name('buku.index'); //route index menamplilkan halaman list data
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create'); //route untuk menampilkan halaman create
    Route::post('buku', [BukuController::class, 'store'])->name('buku.post'); // route mengirimkan data buku
    Route::get('buku/{param}', [BukuController::class, 'show'])->name('buku.show'); //route detail menampilkan halaman detail buku
    Route::put('buku/{param}', [BukuController::class, 'update'])->name('buku.update'); //route mengupdate data buku
    Route::delete('buku/{param}', [BukuController::class, 'delete'])->name('buku.delete'); //route menghapus data buku.


});


require __DIR__ . '/auth.php';
