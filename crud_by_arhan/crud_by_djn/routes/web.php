<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

// Route::get('/', function () {
//     return view('welcome');
// });

//route di definisikan satu persatu
// Route::get('/',[GuruController::class,'index'])->name('guru.index');

// Route::get('/create',[GuruController::class, 'create'])->name('guru.create');
// Route::post('/create',[GuruController::class, 'store'])->name('guru.store');

// Route::get('/show/{id}',[GuruController::class, 'show'])->name('guru.show');

// Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
// Route::put('/edit/{id}', [GuruController::class, 'update'])->name('guru.update');

// Route::delete('/delete/{id}',[GuruController::class, 'destroy'])->name('guru.destroy');

//atau pake yang ini sudah mendefinisikan semua route
Route::get('/', [GuruController::class, 'index']);
Route::resource('guru', GuruController::class);