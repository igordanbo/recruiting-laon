<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardRequest;
use App\Models\Serie;

class AwardSerieController extends Controller
{
    public function index($id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        return response()->json([
            'awards' => $serie->awards
        ], 200);
    }

    public function store(AwardRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $award = $serie->awards()->create(
            $request->validated()
        );

        return response()->json([
            'award' => $award
        ], 201);
    }

    public function update(AwardRequest $request, $id_serie, $id_award)
    {
        $serie = Serie::findOrFail($id_serie);
        $award = $serie->awards()->findOrFail($id_award);

        $award->update($request->validated());

        return response()->json($award, 200);
    }

    public function destroy($id_serie, $id_award)
    {
        $serie = Serie::findOrFail($id_serie);
        $award = $serie->awards()->findOrFail($id_award);

        $award->delete();

        return response()->json([
            'message' => 'Prêmio removido com sucesso.'
        ], 200);
    }
}
