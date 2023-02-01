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

Route::get('/', function () {
    return view('welcome');
});
Route::post('test/auth/authanticate', [App\Http\Controllers\AuthController::class, 'authanticate']);
Route::get('test/auth/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('test/auth/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'test', 'middlewareGroup' => ['web']], function () {
    \App\Helpers\Helper::makeRoute('auth', 'AuthController');
    \App\Helpers\Helper::makeRoute('student', 'StudentController');
    // Route::get('auth', [AuthController::class, 'index']);
    // Route::get('auth/create', [AuthController::class, 'create']);
    // Route::post('auth/create', [AuthController::class, 'store']);
    // Route::get('auth/edit/{id}', [AuthController::class, 'edit']);
    // Route::post('auth/edit/{id}', [AuthController::class, 'update']);
    // Route::delete('auth/delete/{id}', [AuthController::class, 'destroy']);
});