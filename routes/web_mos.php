<?php

use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ProductController;






Route::post('cart/add',[CartController::class,'addToCart'])->name('cart.add');
