<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorSerieRequest;
use App\Models\Serie;

class ActorSerieController extends Controller
{
    public function store(ActorSerieRequest $request, $serie_id)
    {
        $serie = Serie::findOrFail($serie_id);

        $already_sync = $serie->actors()
            ->where('actors.id', $request->actor_id)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'Este ator já está vinculado a série.'
            ], 422);
        }

        $serie->actors()->attach($request->actor_id);
        return response()->json([
            'message' => 'Ator adicionado a série.'
        ], 201);
    }

    public function destroy(ActorSerieRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $exists = $serie->actors()
            ->where('actors.id', $request->actor_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Este ator não está vinculado a esta série.'
            ], 422);
        }

        $serie->actors()->detach($request->actor_id);
        return response()->json([
            'message' => 'Ator removido da série.'
        ], 200);
    }
}
