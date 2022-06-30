<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('tour.')->prefix('/tours')->group(function () {
    Route::post('/', [TourController::class, 'list'])->name('list');
    Route::post('/{id}', [TourController::class, 'show'])->name('show');
});

Route::name('order.')->prefix('/orders')->group(function () {
    Route::post('/', [OrderController::class, 'list'])->name('list');
    Route::post('/{id}', [OrderController::class, 'show'])->name('show');

    Route::post('/store', [OrderController::class, 'store'])->name('store');
});
