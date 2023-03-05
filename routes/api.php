<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Controllers\Api\ApplianceController;

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

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/change-password', [AuthController::class, 'changePassword']);

    Route::put('/change-profile', [UserController::class, 'update']);
    Route::post('/avatars', [UserController::class, 'uploadAvatar']);
    Route::post('/resumes', [UserController::class, 'uploadResume']);

    Route::get('/news', [NewsController::class, 'index']);

    Route::get('/vacancies', [VacancyController::class, 'index']);
    Route::get('/vacancies/recommended', [VacancyController::class, 'recommended']);
    Route::get('/vacancies/{id}', [VacancyController::class, 'show']);

    Route::resource('appliances', ApplianceController::class)->only([
        'index', 'store', 'destroy'
    ]);
    Route::get('/appliances/accepted', [ApplianceController::class, 'accepted']);
    Route::put('/appliances/{id}/edit-date', [ApplianceController::class, 'editDate']);
});
