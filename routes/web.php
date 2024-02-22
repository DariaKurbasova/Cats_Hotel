<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Admin\RoomsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('rooms', [RoomsController::class, 'index']);
});

Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/selectRoom/{roomId}', [BookingController::class, 'selectRoom']);
});
