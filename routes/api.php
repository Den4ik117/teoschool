<?php

use App\Http\Controllers\CheatsheetController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/courses', CourseController::class);
Route::get('/information', InformationController::class);
Route::get('/cheatsheets', CheatsheetController::class);
Route::post('/check', [CheckController::class, 'index']);
