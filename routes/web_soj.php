<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\Admin\Auth\AdminResetPasswordController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\OrderController;

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



// Seller route
Route::prefix('seller')->group(function() {
    Route::get('/register', [VendorController::class, 'sellerRegister'])->name('seller.register');

    Route::get('/verify-seller/{email?}', [VendorController::class, 'verifyShowForm'])->name('seller.verify.showform');
    Route::post('/verify-seller', [VendorController::class, 'verifySeller'])->name('seller.verify');
    Route::get('/resend/otp/{email?}', [VendorController::class, 'resendOtp'])->name('seller.resend-otp');

    Route::post('/register/store', [VendorController::class, 'sellerRegisterStore'])->name('seller.register.store');

    Route::get('/login', [VendorController::class, 'sellerLoginForm'])->name('seller.login');
    Route::post('/login/check', [VendorController::class, 'sellerLogin'])->name('seller.login.check');
    Route::post('/logout', [VendorController::class, 'sellerLogout'])->name('seller.logout');


	Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('seller.password.email');
	Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])
		->name('seller.password.request');

	Route::post('/password/reset', [AdminResetPasswordController::class, 'reset']);

	Route::get('/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('seller.password.reset');
});

Route::prefix('cart')->group( function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('/update/cart/', 'updateCart')->name('cart.update');
        Route::post('/delete/item/', 'deleteCartItem')->name('cart.item.delete');
        Route::post('/destroy/cart/', 'destroy')->name('cart.destroy');
        Route::post('/apply-promoCod', 'applyPromocode')->name('apply.promocode');
    });
});

Route::prefix('user')->middleware(['auth'])->name('user.')->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order/pdf/{orderId}', 'orderPDF')->name('order.pdf');
    });
});