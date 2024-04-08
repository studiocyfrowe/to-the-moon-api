<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedUserController::class, 'store']);
});

Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user'
], function ($router) {
    Route::get('/dataProfile', [\App\Http\Controllers\UserProfileController::class, 'getDataProfile']);
    Route::post('/logout', [\App\Http\Controllers\UserProfileController::class, 'logout']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user/posts'
], function ($router) {
    Route::get('/get/user', [\App\Http\Controllers\PostController::class, 'indexOfUser']);
    Route::get('/statuses', [\App\Http\Controllers\PostStatusController::class, 'index']);
});


