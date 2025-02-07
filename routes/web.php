<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_submit'])->name('login_submit');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Cars
    Route::get('cars/list', [CarController::class, 'index'])->name('cars');
    Route::get('cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('cars', [CarController::class, 'store'])->name('cars.store');
    Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    // Parts
    Route::get('parts/list/{car?}', [PartController::class, 'index'])->name('parts');
    Route::get('parts/create', [PartController::class, 'create'])->name('parts.create');
    Route::post('parts', [PartController::class, 'store'])->name('parts.store');
    Route::get('parts/{part}/edit', [PartController::class, 'edit'])->name('parts.edit');
    Route::put('parts/{part}', [PartController::class, 'update'])->name('parts.update');
    Route::delete('parts/{part}', [PartController::class, 'destroy'])->name('parts.destroy');
});
