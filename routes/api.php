<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\BillingFeesController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanModalityController;
use App\Http\Controllers\PlanPriceController;
use App\Http\Controllers\PlanServiceController;
use App\Http\Controllers\UserController;
use App\Models\Plan;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/user/gym-goer', [UserController::class, 'storeGymGoer']);
    Route::get('/user/gym-goer', [UserController::class, 'indexGymGoer']);

    Route::get('/income/monthly', [BillingController::class, 'getStaticsInfoForCard']);

    // =======@ PLANOS @=======
    Route::get('/plans/{idBussinessPartners}', [PlanController::class, 'index']);
    Route::get('/plans/{idBussinessPartners}/{idPlan}', [PlanController::class, 'show']);

    Route::apiResources([
        '/frequency' => PlanPriceController::class,
        '/services' => PlanServiceController::class,
        '/modalities' => PlanModalityController::class,
        '/plans' => PlanController::class,
        '/billing-fees' => BillingFeesController::class,
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
