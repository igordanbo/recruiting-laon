<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpisodeRequest;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function index()
    {
        $episodes  = Episode::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($episodes);
    }

    public function show($id_episode)
    {
        $episode = Episode::findOrFail($id_episode);

        return response()->json([
            'episode' => $episode
        ], 200);
    }

    public function store(EpisodeRequest $request)
    {
        $data = $request->validated();

        $episode = Episode::create($data);

        return response()->json([
            'message' => 'Episódio cadastrado',
            'episode' => $episode
        ], 201);
    }

    public function update(EpisodeRequest $request, $id_episode)
    {
        $episode = Episode::findOrFail($id_episode);

        $data = $request->validated();

        $episode->update($data);

        return response()->json([
            'message' => 'Episódio atualizado.',
            'episode' => $episode
        ], 200);
    }

    public function destroy($id_episode)
    {
        $episode = Episode::findOrFail($id_episode);

        $episode->delete();

        return response()->json([
            'message' => 'Episódio deletado com sucesso.'
        ]);
    }
}
