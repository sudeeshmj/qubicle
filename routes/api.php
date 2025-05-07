<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
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

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\CategoryApiController;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/posts', [PostApiController::class, 'index']);
    Route::get('/categories', [CategoryApiController::class, 'index']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/posts', [PostApiController::class, 'store']);
        Route::put('/posts/{post}', [PostApiController::class, 'update']);
        Route::delete('/posts/{post}', [PostApiController::class, 'destroy']);
    });
});
