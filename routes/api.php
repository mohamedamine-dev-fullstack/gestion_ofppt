<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\DashboardController;


// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware(['auth:sanctum','throttle:60,1'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    

    // controller → باقي الموارد → roles (directeur du complexe,gestionnaire CFMR)
    Route::middleware('role:directeur du complexe|gestionnaire CFMR')->group(function () {
    
            Route::apiResource('etablissements', EtablissementController::class);
            
            Route::apiResource('personnels', PersonnelController::class);

            Route::apiResource('diplomes', DiplomeController::class);

            Route::apiResource('specialites', SpecialiteController::class);

            Route::apiResource('conges', CongeController::class);

            Route::apiResource('absences', AbsenceController::class);

            Route::apiResource('users', UserController::class);
            
            // Dashboard route
            Route::get('/dashboard/stats', [DashboardController::class, 'stats']);
    });
});