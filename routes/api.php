<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeliveryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

Route::post('/register', [ AuthController::class, 'register']);
Route::post('/login', [ AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [ AuthController::class, 'logout']);
    Route::prefix('deliveries')->as('deliveries.')->group(function () {
        Route::get('/', [DeliveryController::class, 'index'])->name('index');
        Route::put('/{delivery}', [DeliveryController::class, 'update'])->name('update');
        Route::put('/{delivery}/unit/{unit}', [DeliveryController::class, 'updateDeliveryUnit'])->name('updateDeliveryUnit');
        Route::post('/', [DeliveryController::class, 'store'])->name('store');
        Route::post('/{delivery}/unit', [DeliveryController::class, 'storeDeliveryUnit'])->name('storeDeliveryUnit');
    });

});
