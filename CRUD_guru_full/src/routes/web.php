<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
// Group route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru.index');
    Route::resource('guru', GuruController::class);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

