<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/courses', [HomeController::class, 'sendCourses']);
Route::get('/news', [HomeController::class, 'sendNews']);
Route::get('/cheats', [HomeController::class, 'sendCheats']);
Route::post('/cheats', [HomeController::class, 'sendAnyCheats']);