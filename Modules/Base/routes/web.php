<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\BaseController;

Route::middleware(['auth'])->group(function () {
    Route::get("/",[BaseController::class,"index"])->name("base");
});
