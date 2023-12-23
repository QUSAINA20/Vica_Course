<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DurationController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ServiceController;
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

Route::resource('services', ServiceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cities', CityController::class);
Route::resource('courses', CourseController::class);
Route::resource('durations', DurationController::class);
Route::resource('registers', RegisterController::class)->only('index');
