<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\ProductController as FrontProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::resource('/product', ProductController::class);
    Route::post('/product/update',[ProductController::class, 'update'])->name('product.update');

    Route::get('/products/active',[ProductController::class, 'active'])->name('products.active');
    Route::get('/products/requested',[ProductController::class, 'requested'])->name('products.requested');
    Route::get('/products/rejected',[ProductController::class, 'rejected'])->name('products.rejected');
    Route::get('/products/hidden',[ProductController::class, 'hidden'])->name('products.hidden');

    Route::post('/product/delete',[ProductController::class, 'destroy'])->name('product.delete');
});