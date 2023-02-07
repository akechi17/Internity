<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VacancyController;
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

    Route::get('departments/search/{schoolId}', [DepartmentController::class, 'search'])->name('departments.search');
    Route::get('departments/{schoolId}', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('departments/create/{schoolId}', [DepartmentController::class, 'create'])->name('departments.create');
    Route::resource('/departments', DepartmentController::class)->except(['index', 'create']);

    Route::get('courses/search/{departmentId}', [CourseController::class, 'search'])->name('courses.search');
    Route::get('courses/{departmentId}', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create/{departmentId}', [CourseController::class, 'create'])->name('courses.create');
    Route::resource('/courses', CourseController::class)->except(['index', 'create']);

    Route::resource('/companies', CompanyController::class);

    Route::get('vacancies/search/{companyId}', [VacancyController::class, 'search'])->name('vacancies.search');
    Route::get('vacancies/{companyId}', [VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('vacancies/create/{companyId}', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::resource('/vacancies', VacancyController::class)->except(['index', 'create']);

    Route::get('students', [StudentController::class, 'index'])->name('students.index');
});
