<?php

use App\Http\Controllers\Api\V1\PatientController as V1PatientController;
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
    Route::post('/register', [V1PatientController::class, 'register']);
    Route::get('/patients/{id}', [V1PatientController::class, 'show']);
});