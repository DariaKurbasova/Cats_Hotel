<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MainPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index']);

Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/selectRoom/{roomId}', [BookingController::class, 'selectRoom']);
});
