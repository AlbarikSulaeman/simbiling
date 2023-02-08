<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'getHome']);

Route::get('/test', function () {
    return view('test.home.home');
});

Route::post('test/auth/authanticate', [App\Http\Controllers\AuthController::class, 'authanticate']);
Route::get('test/auth/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('test/auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/login', 'App\Http\Controllers\AuthController' .'@login');
Route::post('/login', 'App\Http\Controllers\AuthController' .'@authanticate');

Route::get('/file-import',[App\Http\Controllers\UserController::class,
        'importView'])->name('import-view');
Route::post('/import',[App\Http\Controllers\UserController::class,
        'import'])->name('import');
Route::get('/export-users',[App\Http\Controllers\UserController::class,
        'exportUsers'])->name('export');
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'simbiling', 'middlewareGroup' => ['web']], function () {

});

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'simbiling', 'middlewareGroup' => ['web']], function () {
       Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'getDashboard']);
       Route::get('/', [App\Http\Controllers\HomeController::class, 'getHome']);
       Helper::makeRoute('content', 'ContentController');
       Helper::makeRoute('contentfor', 'ContentForController');
    });

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'test', 'middlewareGroup' => ['web']], function () {
    \App\Helpers\Helper::makeRoute('auth', 'AuthController');
    \App\Helpers\Helper::makeRoute('student', 'StudentController');
    \App\Helpers\Helper::makeRoute('user', 'UserController');
    // Route::get('auth', [AuthController::class, 'index']);
    // Route::get('auth/create', [AuthController::class, 'create']);
    // Route::post('auth/create', [AuthController::class, 'store']);
    // Route::get('auth/edit/{id}', [AuthController::class, 'edit']);
    // Route::post('auth/edit/{id}', [AuthController::class, 'update']);
    // Route::delete('auth/delete/{id}', [AuthController::class, 'destroy']);
});

Route::get('/contact', function () {
    return view('simbiling.reference.contact');
});
