<?php
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\PatientController;
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


// Api routes for version 1
Route::prefix('v1')->group(function () {
    Route::get('/health-check', function () {
        return "API running...";
    })->name('health_check');

    // Authentication routes
    Route::prefix('auth')->group(function () { 
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('jwt.verify');
    });

    // Protected routes with JWT
    Route::prefix('patients')->middleware('jwt.verify')->group(function () {
        Route::post('/register', [PatientController::class, 'register'])->name('patient.register');;
        Route::get('/{id}', [PatientController::class, 'show'])->name('patient.show');
    });
});
