<?php

use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\StorageController;

Route::middleware('auth')->group(function () {
    Route::post("/download",[StorageController::class,"download"])->name("download");
    Route::get("/",function (){
        return redirect()->route("task.index");
    });
});
