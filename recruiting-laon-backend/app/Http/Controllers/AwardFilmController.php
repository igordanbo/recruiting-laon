<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRequest;
use App\Models\Film;

class AwardFilmController extends Controller
{
    public function index($id_film)
    {
        $film = Film::findOrFail($id_film);

        return response()->json([
            'awards' => $film->awards
        ], 200);
    }

    public function store(AwardRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $award = $film->awards()->create(
            $request->validated()
        );

        return response()->json([
            'award' => $award
        ], 201);
    }

    public function update(AwardRequest $request, $id_film, $id_award)
    {
        $film = Film::findOrFail($id_film);
        $award = $film->awards()->findOrFail($id_award);

        $award->update($request->validated());

        return response()->json($award, 200);
    }

    public function destroy($id_film, $id_award)
    {
        $film = Film::findOrFail($id_film);
        $award = $film->awards()->findOrFail($id_award);

        $award->delete();

        return response()->json([
            'message' => 'Prêmio removido com sucesso.'
        ], 200);
    }
}
