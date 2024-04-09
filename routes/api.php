<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function ($router) {
//
//});

Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedUserController::class, 'store']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user'
], function ($router) {
    Route::get('/dataProfile', [\App\Http\Controllers\UserProfileController::class, 'getDataProfile']);
    Route::get('/followed', [\App\Http\Controllers\UserProfileController::class, 'getFollowedUsersByAuthUser']);
    Route::get('/following', [\App\Http\Controllers\UserProfileController::class, 'getFollowingUsersByAuthUser']);
    Route::post('/logout', [\App\Http\Controllers\UserProfileController::class, 'logout']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user/social'
], function ($router) {
    Route::post('/follow/{user}', [\App\Http\Controllers\FollowController::class, 'getFollowUser']);
    Route::post('/unfollow/{user}', [\App\Http\Controllers\FollowController::class, 'getUnFollowUser']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user/posts'
], function ($router) {
    Route::get('/get/user', [\App\Http\Controllers\PostController::class, 'indexOfUser']);
    Route::get('/statuses', [\App\Http\Controllers\PostStatusController::class, 'index']);
});


