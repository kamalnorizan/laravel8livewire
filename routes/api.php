<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\PostController;
Use App\Http\Controllers\AuthController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/posts',[PostController::class,'apiShow']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::post('/store',[PostController::class,'store']);
    Route::get('/post/{post}',[PostController::class,'show']);
});

Route::post('/login',[AuthController::class,'login']);
