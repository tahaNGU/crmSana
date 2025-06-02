<?php

use Illuminate\Support\Facades\Route;
use Modules\Task\Http\Controllers\TaskController;

Route::middleware(['auth'])->as("task.")->prefix("task/")->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('create', [TaskController::class, 'create'])->name('create');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::get('{task}', [TaskController::class, 'show'])->name('show');
    Route::get('{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::put('{task}', [TaskController::class, 'update'])->name('update');
    Route::delete('{task}', [TaskController::class, 'destroy'])->name('destroy');
    Route::post('/comment/{task}', [TaskController::class, 'addComment'])->name('comment');
});
