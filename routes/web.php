<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MoodleController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\{Route, Auth};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
*/
// client
// Route::get('/', [HomeController::class, 'index']);
// Auth::routes();
Route::get('/', [MoodleController::class, 'getCourse']);

Route::get('/about', [AboutController::class, 'index']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('dashboard/courses', CourseController::class);

Route::get('/generate-token', [MoodleController::class, 'getToken']);
Route::get('/get-course-id', [MoodleController::class, 'getCourseId']);

// Route::get('logout', function () {
//     Auth::logout();
//     return redirect('/login');
// });


// Route::get('/home', [HomeController::class, 'index'])->name('home');
