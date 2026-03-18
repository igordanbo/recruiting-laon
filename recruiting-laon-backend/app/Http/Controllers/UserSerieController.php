<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSerieRequest;
use App\Models\Serie;

class UserSerieController extends Controller
{
    public function store(UserSerieRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $already_sync = $serie->users()
            ->where('users.id', $request->id_user)
            ->exists();

        if ($already_sync) {
            return response()->json([
                'message' => 'A série já está marcada como assistida por este usuário.'
            ], 400);
        }

        $serie->users()->syncWithoutDetaching([
            $request->id_user
        ]);

        return response()->json([
            'message' => 'A série foi marcada como assistida pelo usuário.'
        ], 200);
    }

    public function destroy(UserSerieRequest $request, $id_serie)
    {

        $serie = Serie::findOrFail($id_serie);

        $already_sync = $serie->users()
            ->where('users.id', $request->id_user)
            ->exists();

        if (!$already_sync) {
            return response()->json([
                'message' => 'A série ainda não foi assistida por este usuário.'
            ], 400);
        }

        $serie->users()->detach($request->id_user);

        return response()->json([
            'message' => 'A série foi desmarcada como assistida.'
        ], 200);
    }
}
