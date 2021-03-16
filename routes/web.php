<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'showMain'])->name('home');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/article', function () {
    return view('article');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginUser']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'createUser']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/new/{new_id}', [ArticleController::class, 'showNew'])->name('show-new');
Route::get('/courses/{course_url}/{lesson_url}', [ArticleController::class, 'showLesson'])->name('show-lesson');

Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

Route::group(['middleware' => ['auth', 'permission:dashboard']], function() {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/admin/roles', [DashboardController::class, 'showRoles'])->middleware('permission:add roles')->name('admin-roles');
    Route::get('/admin/courses', [DashboardController::class, 'showCourses'])->middleware('permission:create courses')->name('admin-courses');
    Route::get('/admin/course/{course_id}', [DashboardController::class, 'showCourse'])->middleware('permission:edit courses')->name('admin-course');
    Route::get('/admin/write/lesson', [DashboardController::class, 'writeLesson'])->middleware('permission:create lessons')->name('write-lesson');
    Route::get('/admin/lessons', [DashboardController::class, 'showLessons'])->middleware('permission:create lessons')->name('admin-lessons');
    Route::get('/admin/edit/lesson/{lesson_id}', [DashboardController::class, 'showOneLesson'])->middleware('permission:edit lessons')->name('admin-one-lesson');
    Route::get('/admin/news', [DashboardController::class, 'showNews'])->middleware('permission:create news')->name('admin-news');
    Route::get('/admin/edit/new/{new_id}', [DashboardController::class, 'showNew'])->middleware('permission:edit news')->name('admin-new');
    Route::get('/admin/cheats', [DashboardController::class, 'showCheats'])->middleware('permission:create cheats')->name('admin-cheats');
    Route::get('/admin/edit/cheat/{cheat_id}', [DashboardController::class, 'showCheat'])->middleware('permission:edit cheats')->name('admin-cheat');

    Route::post('/admin/verify', [DashboardController::class, 'verifyAccount'])->middleware('permission:verify accounts')->name('verify');
    Route::post('/admin/add/role', [DashboardController::class, 'addRole'])->middleware('permission:add roles')->name('add-role');
    Route::post('/admin/remove/role', [DashboardController::class, 'removeRole'])->middleware('permission:remove roles')->name('remove-role');

    Route::post('/admin/create/course', [DashboardController::class, 'createCourse'])->middleware('permission:create courses')->name('create-course');
    Route::post('/admin/edit/course', [DashboardController::class, 'editCourse'])->middleware('permission:edit courses')->name('edit-course');
    Route::post('/admin/delete/course', [DashboardController::class, 'deleteCourse'])->middleware('permission:delete courses')->name('delete-course');

    Route::post('/admin/create/lesson', [DashboardController::class, 'createLesson'])->middleware('permission:create lessons')->name('create-lesson');
    Route::post('/admin/edit/lesson', [DashboardController::class, 'editLesson'])->middleware('permission:edit lessons')->name('edit-lesson');
    Route::post('/admin/delete/lesson', [DashboardController::class, 'deleteLesson'])->middleware('permission:delete lessons')->name('delete-lesson');

    Route::post('/admin/create/new', [DashboardController::class, 'createNew'])->middleware('permission:create news')->name('create-new');
    Route::post('/admin/edit/new', [DashboardController::class, 'editNew'])->middleware('permission:edit news')->name('edit-new');
    Route::post('/admin/delete/new', [DashboardController::class, 'deleteNew'])->middleware('permission:delete news')->name('delete-new');

    Route::post('/admin/create/cheat', [DashboardController::class, 'createCheat'])->middleware('permission:create cheats')->name('create-cheat');
    Route::post('/admin/edit/cheat', [DashboardController::class, 'editCheat'])->middleware('permission:edit cheats')->name('edit-cheat');
    Route::post('/admin/delete/cheat', [DashboardController::class, 'deleteCheat'])->middleware('permission:delete cheats')->name('delete-cheat');
});



