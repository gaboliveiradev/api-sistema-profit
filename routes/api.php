<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingFeesController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResources([
        '/plans' => PlanController::class,
        '/billing-fees' => BillingFeesController::class,
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
