<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DurationController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('cities', CityController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('durations', DurationController::class);
    Route::resource('registers', RegisterController::class)->only('index', 'destroy');

    Route::get('/settings/name-email', [AuthController::class, 'showChangeInfoForm'])->name('settings.info');
    Route::put('/settings/name-email', [AuthController::class, 'updateInfo'])->name('update.info');

    Route::get('/settings/password', [AuthController::class, 'showChangePasswordForm'])->name('settings.password');
    Route::put('/settings/password', [AuthController::class, 'updatePassword'])->name('update.password');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
