<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySerieRequest;
use App\Models\Serie;

class CategorySerieController extends Controller
{
    public function store(CategorySerieRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $already_sync = $serie->categories()
            ->where('categories.id', $request->category_id)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'Esta categoria já está vinculada a serie.'
            ], 422);
        }

        $serie->categories()->attach($request->category_id);

        return response()->json([
            'message' => 'Categoria adicionada.'
        ], 201);
    }

    public function destroy(CategorySerieRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $exists = $serie->categories()
            ->where('categories.id', $request->category_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Esta categoria não está vinculada a este serie.'
            ], 422);
        }

        $serie->categories()->detach($request->category_id);

        return response()->json([
            'message' => 'Categoria removida.'
        ], 200);
    }
}
