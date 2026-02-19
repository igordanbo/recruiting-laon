<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorFilmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryFilmController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserFilmController;
use Illuminate\Support\Facades\Route;

// login routes
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

    // actors routes0
    Route::get('/actors', [ActorController::class, 'index']);
    Route::get('/actors/{id_actor}', [ActorController::class, 'show']);
    Route::post('/actors', [ActorController::class, 'store']);
    Route::put('/actors/{id_actor}', [ActorController::class, 'update']);
    Route::delete('/actors/{id_actor}', [ActorController::class, 'destroy']);

    // awards routes
    Route::get('/films/{id_film}/awards', [AwardController::class, 'index']);
    Route::post('/films/{id_film}/awards', [AwardController::class, 'store']);
    Route::put('/films/{id_film}/awards/{id_award}', [AwardController::class, 'update']);
    Route::delete('/films/{id_film}/awards/{id_award}', [AwardController::class, 'destroy']);

    // rating routes
    Route::get('/films/{id_film}/ratings', [RatingController::class, 'index']);
    Route::post('/films/{id_film}/ratings', [RatingController::class, 'store']);
    Route::put('/films/{id_film}/ratings/{id_rating}', [RatingController::class, 'update']);
    Route::delete('/films/{id_film}/ratings/{id_rating}', [RatingController::class, 'destroy']);

    // film-category routes - para associar uma categoria a um filme
    Route::post('/films/{id_film}/categories', [CategoryFilmController::class, 'store']);
    Route::delete('/films/{id_film}/categories', [CategoryFilmController::class, 'destroy']);

    // film-actor routes - para associar um ator a um filme
    Route::post('/films/{id_film}/actors', [ActorFilmController::class, 'store']);
    Route::delete('/films/{id_film}/actors', [ActorFilmController::class, 'destroy']);

    // film-user routes - para marcar um filme como assistido por um usuário
    Route::post('/films/{id_film}/users', [UserFilmController::class, 'store']);
    Route::delete('/films/{id_film}/users', [UserFilmController::class, 'destroy']);
});
