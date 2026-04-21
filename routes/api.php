<?php
/*use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;

Route::apiResource('personnels', PersonnelController::class);
*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\AdministratifController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormateurPermanentController;
use App\Http\Controllers\FormateurVacataireController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\AuthController;

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware(['auth:sanctum','throttle:60,1'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    

    // باقي الموارد → roles بجوج
    Route::middleware('role:directeur du complexe,gestionnaire CFMR')->group(function () {
    
            Route::apiResource('etablissements', EtablissementController::class);
            
            Route::apiResource('personnels', PersonnelController::class);
            Route::apiResource('administratifs', AdministratifController::class);
            Route::apiResource('formateurs', FormateurController::class);

            Route::apiResource('formateurs-permanents', FormateurPermanentController::class);
            Route::apiResource('formateurs-vacataires', FormateurVacataireController::class);

            Route::apiResource('conges', CongeController::class);
            Route::apiResource('absences', AbsenceController::class);

            Route::apiResource('users', UserController::class);
    });
});