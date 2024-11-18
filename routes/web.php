<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome'); // Atau halaman utama aplikasi Anda
});

Route::get('/suppliers', [SupplierController::class, 'index']);
