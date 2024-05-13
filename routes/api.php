<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedUserController::class, 'store']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::group([
    'middleware' => [
        'auth:api', 'role:admin'
    ],
    'prefix' => 'admin'
], function ($router) {
    Route::post('/movies/create',  [\App\Http\Controllers\MovieController::class, 'store']);
    Route::post('/movies/attach/{movie}/{cinema}',  [\App\Http\Controllers\MovieController::class, 'attachMovieToCinema']);
    Route::post('/cities/store',  [\App\Http\Controllers\CityController::class, 'store']);
    Route::post('/cinema/types/store', [\App\Http\Controllers\CinemaTypeController::class, 'store']);
    Route::delete('/cinema/types/remove/{cinemaType}', [\App\Http\Controllers\CinemaTypeController::class, 'destroy']);
    Route::post('/post/status/new', [\App\Http\Controllers\PostStatusController::class, 'store']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'users'
], function ($router) {
    Route::get('/search', [\App\Http\Controllers\UserController::class, 'searchUser']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user'
], function ($router) {
    Route::get('/dataProfile', [\App\Http\Controllers\UserProfileController::class, 'getDataProfile']);
    Route::get('/followed', [\App\Http\Controllers\UserProfileController::class, 'getFollowedUsersByAuthUser']);
    Route::get('/following', [\App\Http\Controllers\UserProfileController::class, 'getFollowingUsersByAuthUser']);
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedUserController::class, 'logout']);
    Route::post('/update/details', [\App\Http\Controllers\UserProfileController::class, 'updateUserDetails']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user/place'
], function ($router) {
    Route::post('/set', [\App\Http\Controllers\UserLocationController::class, 'create']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'posts'
], function ($router) {
    Route::get('/statuses', [\App\Http\Controllers\PostStatusController::class, 'index']);
    Route::post('/update/{post}', [\App\Http\Controllers\PostController::class, 'update']);
    Route::get('/getAll', [\App\Http\Controllers\PostController::class, 'indexOfUser']);
    Route::post('/details/{post}', [\App\Http\Controllers\PostController::class, 'show']);
    Route::get('/change/status/{post}/{status}', [\App\Http\Controllers\PostController::class, 'changeStatus']);
    Route::post('/new/{movie}', [\App\Http\Controllers\PostController::class, 'store']);
});

Route::group([
    'prefix' => 'cinemas'
], function ($router) {
    Route::get('/getAll',  [\App\Http\Controllers\CinemaController::class, 'index']);
    Route::get('/getRandomCinemas',  [\App\Http\Controllers\CinemaController::class, 'getRandomCinemas']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'cinemas'
], function ($router) {
    Route::post('/store/{cinemaType}/{city}',  [\App\Http\Controllers\CinemaController::class, 'store']);
    Route::get('/single/{cinema}',  [\App\Http\Controllers\CinemaController::class, 'show']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'favorites'
], function ($router) {
    Route::get('/getAll',  [\App\Http\Controllers\FavoriteController::class, 'index']);
    Route::post('/add/movie/{movie}',  [\App\Http\Controllers\FavoriteController::class, 'store']);
});

Route::group([
    'prefix' => 'reviews'
], function ($router) {
    Route::get('/getOfMovie/{movie}',  [\App\Http\Controllers\ReviewController::class, 'index']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'reviews'
], function ($router) {
    Route::post('/store/{movie}',  [\App\Http\Controllers\ReviewController::class, 'store']);
    Route::get('/single/{review}',  [\App\Http\Controllers\ReviewController::class, 'show']);
});

Route::group([
    'prefix' => 'movies'
], function ($router) {
    Route::get('/getAll',  [\App\Http\Controllers\MovieController::class, 'index']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'movies'
], function ($router) {
    Route::get('/single/{cinema}',  [\App\Http\Controllers\MovieController::class, 'show']);
});

Route::group([
    'prefix' => 'cities'
], function ($router) {
    Route::get('/getAll',  [\App\Http\Controllers\CityController::class, 'index']);
    Route::get('/single/{city}',  [\App\Http\Controllers\CityController::class, 'show']);
});

Route::group([
    'prefix' => 'cinema/types'
], function ($router) {
    Route::get('/getAll',  [\App\Http\Controllers\CinemaTypeController::class, 'index']);
    Route::get('/single/{cinemaType}',  [\App\Http\Controllers\CinemaTypeController::class, 'show']);
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


