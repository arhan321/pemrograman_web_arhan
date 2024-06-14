<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[GuruController::class,'index']);

Route::get('/create',[GuruController::class, 'create'])->name('guru.create');
Route::post('/create',[GuruController::class, 'store'])->name('guru.store');

