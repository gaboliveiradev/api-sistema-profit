<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BillingFeesController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\PlanPrice;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/user/gym-goer', [UserController::class, 'storeGymGoer']);
    Route::get('/user/gym-goer', [UserController::class, 'indexGymGoer']);

    Route::get('/income/monthly', [BillingController::class, 'getStaticsInfoForCard']);

    Route::apiResources([
        '/frequency' => PlanPrice::class,
        '/services' => ServiceController::class,
        '/modalities' => ModalityController::class,
        '/plans' => PlanController::class,
        '/billing-fees' => BillingFeesController::class,
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
