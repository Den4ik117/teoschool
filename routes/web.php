<?php

use App\Http\Controllers\Dashboard\CheatsheetController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InformationController;
use App\Http\Controllers\Dashboard\ModuleController;
use App\Http\Controllers\Dashboard\PartController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\CourseController as ProfileCourseController;
use App\Http\Controllers\Profile\ModuleController as ProfileModuleController;
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
Route::get('subscribe', function() {})->name('subscribe');
Route::get('privacy', function() {})->name('privacy');
Route::get('contacts', function() {})->name('contacts');

Route::get('/', HomeController::class);

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/courses', [ProfileCourseController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.courses.index');
Route::post('/profile/courses/{course}', [ProfileCourseController::class, 'store'])->middleware(['auth', 'verified'])->name('profile.courses.store');
Route::get('/profile/{slug}', ProfileController::class)->middleware(['auth', 'verified'])->name('profile');
Route::get('/courses/{course:slug}', [ProfileCourseController::class, 'show'])->middleware(['auth', 'verified'])->name('profile.courses.show');
Route::get('/courses/{course:slug}/modules/{module}', [ProfileModuleController::class, 'show'])->middleware(['auth', 'verified'])->name('profile.courses.modules.show');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/courses', CourseController::class)->except('show');
    Route::resource('/cheatsheets', CheatsheetController::class)->except('show');
    Route::resource('/information', InformationController::class)->except('show');
    Route::resource('/modules', ModuleController::class)->except('show');
    Route::resource('/modules.parts', PartController::class)->shallow()->except('show');
});

require __DIR__.'/auth.php';
