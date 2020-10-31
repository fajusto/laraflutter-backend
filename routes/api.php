<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UsersController::class)->only('update', 'destroy')->middleware('auth:sanctum');
Route::post('users', [UsersController::class, 'store']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
