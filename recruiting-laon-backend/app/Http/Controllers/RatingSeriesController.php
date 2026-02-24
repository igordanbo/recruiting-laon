<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Serie;

class RatingSeriesController extends Controller
{
    public function index($id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        return response()->json([
            'ratings' => $serie->ratings
        ], 200);
    }

    public function store(RatingRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $rating = $serie->ratings()->create(
            $request->validated()
        );

        return response()->json([
            'rating' => $rating,
            'serie' => $serie
        ], 201);
    }

    public function update(RatingRequest $request, $id_serie, $id_rating)
    {
        $serie = Serie::findOrFail($id_serie);
        $rating = $serie->ratings()->findOrFail($id_rating);

        $rating->update($request->validated());

        return response()->json($rating, 200);
    }

    public function destroy($id_serie, $id_rating)
    {
        $serie = Serie::findOrFail($id_serie);
        $rating = $serie->ratings()->findOrFail($id_rating);

        $rating->delete();

        return response()->json([
            'message' => 'Avaliação removida com sucesso.'
        ], 200);
    }
}
