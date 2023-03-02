<?php

use App\Models\Appliance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ApplianceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\PresenceStatusController;
use App\Http\Controllers\ScorePredicateController;

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

// Route::middleware(['verified.email', 'auth'])->group( function () {
Route::middleware(['auth'])->group( function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::put('roles/{id}/updateStatus', [RoleController::class, 'updateStatus'])->name('roles.updateStatus');
    Route::resource('/roles', RoleController::class);

    Route::get('users/search', [UserController::class, 'search'])->name('users.search');
    Route::put('users/{id}/updateStatus', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::resource('/users', UserController::class);

    Route::resource('/schools', SchoolController::class);

    Route::get('departments/search', [DepartmentController::class, 'search'])->name('departments.search');
    Route::resource('/departments', DepartmentController::class);

    Route::get('courses/search', [CourseController::class, 'search'])->name('courses.search');
    Route::resource('/courses', CourseController::class);

    Route::resource('/companies', CompanyController::class);

    Route::get('vacancies/search', [VacancyController::class, 'search'])->name('vacancies.search');
    Route::resource('/vacancies', VacancyController::class);

    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/update/{id}', [StudentController::class, 'update'])->name('students.update');

    Route::resource('/appliances', ApplianceController::class);
    Route::put('appliances/{id}/accept', [ApplianceController::class, 'accept'])->name('appliances.accept');
    Route::put('appliances/{id}/reject', [ApplianceController::class, 'reject'])->name('appliances.reject');

    Route::get('presence-statuses/search', [PresenceStatusController::class, 'search'])->name('presence-statuses.search');
    Route::resource('presence-statuses', PresenceStatusController::class);

    Route::resource('score-predicates', ScorePredicateController::class);

    Route::resource('journals', JournalController::class);

    Route::resource('presences', PresenceController::class);
});
