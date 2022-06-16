<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('product',ProductController::class)->names('product');
Route::post('product/search', [ProductController::class, 'search'])->name('product.search');



