<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->middleware('guest')->name('forgot-password');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('reset-password');

Route::middleware(['verified.email', 'auth'])->group( function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
