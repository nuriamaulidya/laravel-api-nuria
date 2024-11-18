<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::prefix('v1')->group(function () {

    Route::resource('product', ProductController::class);

    Route::get('/test', function () {
        return view('welcome');
    });
});
