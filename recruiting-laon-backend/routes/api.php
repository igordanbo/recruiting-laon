<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorFilmController;
use App\Http\Controllers\ActorSerieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\AwardFilmController;
use App\Http\Controllers\AwardSerieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryFilmController;
use App\Http\Controllers\CategorySerieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\RatingFilmController;
use App\Http\Controllers\RatingSeriesController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\UserFilmController;
use Illuminate\Support\Facades\Route;

// login routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
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

    // awards-films routes - para associar um prêmio a um filme
    Route::get('/films/{id_film}/awards', [AwardFilmController::class, 'index']);
    Route::post('/films/{id_film}/awards', [AwardFilmController::class, 'store']);
    Route::put('/films/{id_film}/awards/{id_award}', [AwardFilmController::class, 'update']);
    Route::delete('/films/{id_film}/awards/{id_award}', [AwardFilmController::class, 'destroy']);

    // rating-films routes - para associar uma avaliação a um filme
    Route::get('/films/{id_film}/ratings', [RatingFilmController::class, 'index']);
    Route::post('/films/{id_film}/ratings', [RatingFilmController::class, 'store']);
    Route::put('/films/{id_film}/ratings/{id_rating}', [RatingFilmController::class, 'update']);
    Route::delete('/films/{id_film}/ratings/{id_rating}', [RatingFilmController::class, 'destroy']);

    // film-category routes - para associar uma categoria a um filme
    Route::post('/films/{id_film}/categories', [CategoryFilmController::class, 'store']);
    Route::delete('/films/{id_film}/categories', [CategoryFilmController::class, 'destroy']);

    // film-actor routes - para associar um ator a um filme
    Route::post('/films/{id_film}/actors', [ActorFilmController::class, 'store']);
    Route::delete('/films/{id_film}/actors', [ActorFilmController::class, 'destroy']);

    // film-user routes - para marcar um filme como assistido por um usuário
    Route::post('/films/{id_film}/users', [UserFilmController::class, 'store']);
    Route::delete('/films/{id_film}/users', [UserFilmController::class, 'destroy']);

    // series routes
    Route::get('/series', [SerieController::class, 'index']);
    Route::get('/series/{id_serie}', [SerieController::class, 'show']);
    Route::post('/series', [SerieController::class, 'store']);
    Route::put('/series/{id_serie}', [SerieController::class, 'update']);
    Route::delete('/series/{id_serie}', [SerieController::class, 'destroy']);

    // awards-series routes - para associar um prêmio a uma serie
    Route::get('/series/{id_serie}/awards', [AwardSerieController::class, 'index']);
    Route::post('/series/{id_serie}/awards', [AwardSerieController::class, 'store']);
    Route::put('/series/{id_serie}/awards/{id_award}', [AwardSerieController::class, 'update']);
    Route::delete('/series/{id_serie}/awards/{id_award}', [AwardSerieController::class, 'destroy']);

    // rating-series routes - para associar uma avaliação a uma serie
    Route::get('/series/{id_serie}/ratings', [RatingSeriesController::class, 'index']);
    Route::post('/series/{id_serie}/ratings', [RatingSeriesController::class, 'store']);
    Route::put('/series/{id_serie}/ratings/{id_rating}', [RatingSeriesController::class, 'update']);
    Route::delete('/series/{id_serie}/ratings/{id_rating}', [RatingSeriesController::class, 'destroy']);

    // serie-category routes - para associar uma categoria a uma serie
    Route::post('/series/{id_serie}/categories', [CategorySerieController::class, 'store']);
    Route::delete('/series/{id_serie}/categories', [CategorySerieController::class, 'destroy']);

    // serie-actor routes - para associar um ator a uma serie
    Route::post('/series/{id_serie}/actors', [ActorSerieController::class, 'store']);
    Route::delete('/series/{id_serie}/actors', [ActorSerieController::class, 'destroy']);

    // season routes
    Route::get('/seasons', [SeasonController::class, 'index']);
    Route::get('/seasons/{id_season}', [SeasonController::class, 'show']);
    Route::post('/seasons', [SeasonController::class, 'store']);
    Route::put('/seasons/{id_season}', [SeasonController::class, 'update']);
    Route::delete('/seasons/{id_season}', [SeasonController::class, 'destroy']);

    // episodes routes
    Route::get('/episodes', [EpisodeController::class, 'index']);
    Route::get('/episodes/{id_episode}', [EpisodeController::class, 'show']);
    Route::post('/episodes', [EpisodeController::class, 'store']);
    Route::put('/episodes/{id_episode}', [EpisodeController::class, 'update']);
    Route::delete('/episodes/{id_episode}', [EpisodeController::class, 'destroy']);
});
