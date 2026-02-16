<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmCategoryController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // users routes
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id_user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id_user}', [UserController::class, 'update']);
    Route::delete('/users/{id_user}', [UserController::class, 'destroy']);

    // categories routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id_category}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id_category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id_category}', [CategoryController::class, 'destroy']);

    // films routes
    Route::get('/films', [FilmController::class, 'index']);
    Route::get('/films/{id_film}', [FilmController::class, 'show']);
    Route::post('/films', [FilmController::class, 'store']);
    Route::put('/films/{id_film}', [FilmController::class, 'update']);
    Route::delete('/films/{id_film}', [FilmController::class, 'destroy']);

    // film-category routes
    Route::post('/films/{film_id}/categories', [FilmCategoryController::class, 'store']);
    Route::delete('/films/{film_id}/categories/{category_id}', [FilmCategoryController::class, 'destroy']);

    // ratings routes
    Route::get('/films/{id_film}/ratings', [RatingController::class, 'index']);
    Route::post('/films/{id_film}/ratings', [RatingController::class, 'store']);
    Route::put('/films/{id_film}/ratings/{id_rating}', [RatingController::class, 'update']);
    Route::delete('/films/{id_film}/ratings/{id_rating}', [RatingController::class, 'destroy']);
});
