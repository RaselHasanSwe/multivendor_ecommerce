<?php

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Auth::routes();
    Route::get('my-account', [PagesController::class, 'myAccount'])->name('user.account');
    Route::put('update', [UserController::class, 'updateUser'])->name('user.update');
    Route::put('change/password', [UserController::class, 'changePassword'])->name('user.change_password');
    Route::get('test', [UserController::class, 'test'])->name('test');
});
