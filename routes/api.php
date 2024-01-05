<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    /*Route::apiResources([
        '/users' => UsersController::class,
        '/clients' => ClientsController::class,
        '/contracts' => ContractsController::class,
        '/budget' => BudgetController::class,
        '/category' => CategoryController::class,
        '/datasheets' => DatasheetController::class,
        '/questions' => QuestionsController::class,
        '/projects' => ProjectsController::class,
        '/maintenance-flows' => MaintenanceFlowController::class,
        '/machines' => MachineController::class,
        '/pricelist' => PricelistController::class,
        '/accessories' => AccessoriesController::class,
    ]);*/
});

Route::post('/login', [AuthController::class, 'login']);
