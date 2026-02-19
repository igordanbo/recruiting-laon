<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorFilmRequest;
use App\Models\Film;

class ActorFilmController extends Controller
{
    public function store(ActorFilmRequest $request, $film_id)
    {
        $film = Film::findOrFail($film_id);

        $already_sync = $film->actors()
            ->where('actors.id', $request->actor_id)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'Este ator já está vinculado ao filme.'
            ], 422);
        }

        $film->actors()->attach($request->actor_id);
        return response()->json([
            'message' => 'Ator adicionado ao filme.'
        ], 201);
    }

    public function destroy(ActorFilmRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $exists = $film->actors()
            ->where('actors.id', $request->actor_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Este ator não está vinculado a este filme.'
            ], 422);
        }

        $film->actors()->detach($request->actor_id);
        return response()->json([
            'message' => 'Ator removido do filme.'
        ], 200);
    }
}
