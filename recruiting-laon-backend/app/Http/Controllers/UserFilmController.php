<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFilmRequest;
use App\Models\Film;

class UserFilmController extends Controller
{
    public function store(UserFilmRequest $request, $film_id)
    {
        $film = Film::findOrFail($film_id);

        $already_sync = $film->users()
            ->where('users.id', $request->user_id)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'O filme já está marcado como assistido por este usuário.'
            ], 400);
        }

        $film->users()->syncWithoutDetaching([
            $request->user_id
        ]);

        return response()->json([
            'message' => 'Filme marcado como assistido pelo usuário.'
        ], 200);
    }

    public function destroy(UserFilmRequest $request, $id_film)
    {

        $film = Film::findOrFail($id_film);

        $already_sync = $film->users()
            ->where('users.id', $request->user_id)
            ->exists();

        if (!$already_sync) {
            return response()->json([
                'message' => 'O filme ainda não foi assistido por este usuário.'
            ], 400);
        }

        $film->users()->detach($request->user_id);

        return response()->json([
            'message' => 'Filme desmarcado como assistido.'
        ], 200);
    }
}
