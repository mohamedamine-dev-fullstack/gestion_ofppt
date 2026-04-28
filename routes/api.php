<?php

use Illuminate\Http\Request;
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
use App\Http\Controllers\ProfileController;


// Auth routes
Route::post('/login', [AuthController::class, 'login'])
       ->middleware('throttle:10,1'); // Limit login attempts to 10 per minute

// Registration route (optional, can be removed if only admins create users)       
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // User profile route
    Route::get('/profile', [ProfileController::class, 'me']);
         

    // controller → باقي الموارد → roles (directeur du complexe,gestionnaire CFMR)
    Route::middleware('role:directeur du complexe,gestionnaire CFMR')->group(function () {
    
        // Etablissements
        Route::apiResource('etablissements', EtablissementController::class);

        // Personnels
        Route::apiResource('personnels', PersonnelController::class);

        // Diplomes
        Route::apiResource('diplomes', DiplomeController::class);

        // Specialites
        Route::apiResource('specialites', SpecialiteController::class);

        // Conges
        Route::apiResource('conges', CongeController::class);

        // Absences
        Route::apiResource('absences', AbsenceController::class);

        // Users
        Route::apiResource('users', UserController::class);

        // Dashboard
        Route::get('/dashboard/stats', [DashboardController::class, 'stats']);

    });
});