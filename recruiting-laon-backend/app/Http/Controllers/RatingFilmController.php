<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Film;

class RatingFilmController extends Controller
{
    public function index($id_film)
    {
        $film = Film::findOrFail($id_film);

        return response()->json([
            'ratings' => $film->ratings
        ], 200);
    }

    public function store(RatingRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $rating = $film->ratings()->create(
            $request->validated()
        );

        return response()->json([
            'rating' => $rating,
            'film' => $film
        ], 201);
    }

    public function update(RatingRequest $request, $id_film, $id_rating)
    {
        $film = Film::findOrFail($id_film);
        $rating = $film->ratings()->findOrFail($id_rating);

        $rating->update($request->validated());

        return response()->json($rating, 200);
    }

    public function destroy($id_film, $id_rating)
    {
        $film = Film::findOrFail($id_film);
        $rating = $film->ratings()->findOrFail($id_rating);

        $rating->delete();

        return response()->json([
            'message' => 'Avaliação removida com sucesso.'
        ], 200);
    }
}
