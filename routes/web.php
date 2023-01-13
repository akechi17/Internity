<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::middleware(['verified.email', 'auth'])->group( function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::put('roles/{id}/updateStatus', [RoleController::class, 'updateStatus'])->name('roles.updateStatus');
    Route::resource('/roles', RoleController::class);

    Route::put('users/{id}/updateStatus', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::resource('/users', UserController::class);

    Route::resource('/schools', SchoolController::class);

    Route::resource('/departments', DepartmentController::class);
});
