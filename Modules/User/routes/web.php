<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

//Route::middleware(['auth', 'verified'])->group(function () {
//
//});

Route::middleware('guest')->prefix("login")->as("login.")->group(function () {
    Route::get('', [UserController::class,'create'])->name('create');
    Route::post('', [UserController::class,'login'])->name('store');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class,'logout'])->name('logout');
});
