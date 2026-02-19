<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Models\Actor;

class ActorController extends Controller
{
    public function index()
    {
        $actors  = Actor::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($actors);
    }

    public function show($id_actor)
    {
        $actor = Actor::findOrFail($id_actor);

        return response()->json([
            'actor' => $actor
        ], 200);
    }

    public function store(ActorRequest $request)
    {
        $data = $request->validated();

        $actor = Actor::create([
            'name' => $data['name'],
        ]);

        return response()->json([
            'message' => 'Ator cadastrado',
            'actor' => $actor
        ], 201);
    }

    public function update(ActorRequest $request, $id_actor)
    {
        $actor = Actor::findOrFail($id_actor);

        $data = $request->validated();

        $actor->update($data);

        return response()->json([
            'message' => 'Ator atualizado.',
            'actor' => $actor
        ], 200);
    }

    public function destroy($id_actor)
    {
        $actor = Actor::findOrFail($id_actor);

        $actor->delete();

        return response()->json([
            'message' => 'Ator deletado com sucesso.'
        ], 200);
    }
}
