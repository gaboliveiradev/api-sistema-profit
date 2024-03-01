<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingFeesController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/user/gym-goer', [UserController::class, 'storeGymGoer']);

    Route::apiResources([
        '/plans' => PlanController::class,
        '/billing-fees' => BillingFeesController::class,
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
