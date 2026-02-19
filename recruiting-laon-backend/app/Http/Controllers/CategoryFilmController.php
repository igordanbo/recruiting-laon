<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFilmRequest;
use App\Models\Film;

class CategoryFilmController extends Controller
{
    public function store(CategoryFilmRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $already_sync = $film->categories()
            ->where('categories.id', $request->category_id)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'Esta categoria já está vinculada ao filme.'
            ], 422);
        }

        $film->categories()->attach($request->category_id);

        return response()->json([
            'message' => 'Categoria adicionada.'
        ], 201);
    }

    public function destroy(CategoryFilmRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $exists = $film->categories()
            ->where('categories.id', $request->category_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Esta categoria não está vinculada a este filme.'
            ], 422);
        }

        $film->categories()->detach($request->category_id);

        return response()->json([
            'message' => 'Categoria removida.'
        ], 200);
    }
}
