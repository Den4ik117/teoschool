<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('users', UserController::class)->except('show');
});
//Route::get('/dashboard', function () {
//    dd(\App\Enums\Role::values());
//    return view('admin.index');
//})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
