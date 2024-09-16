<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', ProductController::class);

Route::resource('customer', CustomerController::class);

Route::resource('service', ServiceController::class);

Route::get('/services/{filter}', [ServiceController::class, 'filterServices'])->name('services');
