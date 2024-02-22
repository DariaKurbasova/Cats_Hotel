<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Admin\RoomsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index']);

// ToDo Авторизация
Route::prefix('admin')->group(function () {
    Route::prefix('rooms')->group(function () {
        Route::get('/', [RoomsController::class, 'index']);
        Route::post('list', [RoomsController::class, 'getList']);
    });
});

Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/selectRoom/{roomId}', [BookingController::class, 'selectRoom']);
});
