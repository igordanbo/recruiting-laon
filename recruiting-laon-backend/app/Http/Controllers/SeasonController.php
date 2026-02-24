<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonRequest;
use App\Models\Season;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons  = Season::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($seasons);
    }

    public function show($id_season)
    {
        $season = Season::findOrFail($id_season);

        return response()->json([
            'season' => $season
        ], 200);
    }

    public function store(SeasonRequest $request)
    {
        $data = $request->validated();

        $season = Season::create($data);

        return response()->json([
            'message' => 'Temporada cadastrada',
            'season' => $season
        ], 201);
    }

    public function update(SeasonRequest $request, $id_season)
    {
        $season = Season::findOrFail($id_season);

        $data = $request->validated();

        $season->update($data);

        return response()->json([
            'message' => 'Temporada atualizada.',
            'season' => $season
        ], 200);
    }

    public function destroy($id_season)
    {
        $season = Season::findOrFail($id_season);

        $season->delete();

        return response()->json([
            'message' => 'Temporada deletada com sucesso.'
        ]);
    }
}
