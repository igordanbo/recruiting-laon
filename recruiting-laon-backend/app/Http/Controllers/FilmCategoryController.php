<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmCategoryRequest;
use App\Models\Film;

class FilmCategoryController extends Controller
{
    public function store(FilmCategoryRequest $request, $film_id)
    {
        $request->validated();

        $film = Film::findOrFail($film_id);

        $film->categories()->syncWithoutDetaching([
            $request->category_id
        ]);

        return response()->json([
            'message' => 'Categoria adicionada.'
        ], 200);
    }

    public function destroy($film_id, $category_id)
    {
        $film = Film::findOrFail($film_id);
        $film->categories()->detach($category_id);

        return response()->json([
            'message' => 'Categoria removida.'
        ], 200);
    }
}
