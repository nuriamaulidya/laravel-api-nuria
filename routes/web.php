<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome'); // Atau halaman utama aplikasi Anda
});
Route::get('/books', [\App\Http\Controllers\Api\BookController::class, 'index']);
