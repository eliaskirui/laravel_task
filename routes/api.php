<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/tasks', TaskController::class);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthenticationController::class, 'logout'])->name('auth.logout');
});

Route::post('/signup', [\App\Http\Controllers\Api\AuthenticationController::class, 'signup'])->name('auth.signup');
Route::post('/login', [\App\Http\Controllers\Api\AuthenticationController::class, 'login'])->name('auth.login');
