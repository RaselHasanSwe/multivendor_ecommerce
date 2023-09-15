<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\BillingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Frontend\PayController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home');

Route::get('/',[PagesController::class, 'home'])->name('home');

Route::get('/about-us',[PagesController::class, 'aboutUs'])->name('about.us');

Route::get('/contact-us',[PagesController::class, 'contactsUs'])->name('contact.us');

Route::get('/faq',[PagesController::class, 'faq'])->name('faq');

Route::get('/privacy-policy',[PagesController::class, 'privacyPolicy'])->name('privacy.policy');

Route::get('/terms-of-use',[PagesController::class, 'termsOfUse'])->name('terms.of.use');

Route::get('/refund-policy',[PagesController::class, 'refundPolicy'])->name('refund.policy');


// Route::get('/cart', function () {
//     return view('frontend.pages.cart');
// })->name('cart');

Route::get('/cart',[CartController::class, 'index'])->name('cart');
Route::get('/billing',[BillingController::class, 'index'])->name('billing');
Route::post('/payment',[PayController::class, 'index'])->name('payment');
Route::get('/payment/success',[PayController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel',[PayController::class, 'cancel'])->name('payment.cancel');



Route::get('/checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');

Route::get('/order', function () {
    return view('frontend.pages.order');
})->name('order');

Route::get('/order-view', function () {
    return view('frontend.pages.order-view');
})->name('order-view');

Route::get('/product', function () {
    return view('frontend.product');
})->name('product');

Route::get('/product-list', function () {
    return view('frontend.product-list');
})->name('product-list');

// Route::get('/wishlist', function () {
//     return view('frontend.pages.wishlist');
// })->name('wishlist');

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::get('/icons', function () {
        return view('admin.pages.la-icons');
    })->name('icons');
    
});
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist');
    Route::post('/add-to-wishlist', [WishlistController::class,'create'])->name('wishlist.add');
    Route::post('/delete-to-wishlist', [WishlistController::class,'delete'])->name('wishlist.delete');

    Route::post('/biling-address-save',[BillingController::class,'store'])->name('user.billing.address.save');

    Route::get('/order/show/{id}',[OrderController::class,'show'])->name('order.show');

});

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {
    Route::controller(OrderController::class)->name('order.')->group(function () {
        Route::get('/orders', 'index')->name('index');
    });
});