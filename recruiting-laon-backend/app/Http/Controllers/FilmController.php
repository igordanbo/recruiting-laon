<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['categories', 'ratings'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($films);
    }

    public function show($id_film)
    {
        $film = Film::findOrFail($id_film);

        return response()->json([
            'film' => $film
        ], 200);
    }

    public function store(FilmRequest $request)
    {
        $data = $request->validated();

        $film = Film::create($data);

        return response()->json([
            'message' => 'Filme cadastrada',
            'film' => $film
        ], 201);
    }

    public function update(FilmRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $data = $request->validate();

        $film->update($data);

        return response()->json([
            'message' => 'Filme atualizado.',
            'film' => $film
        ], 200);
    }

    public function destroy($id_film)
    {
        $film = Film::findOrFail($id_film);

        $film->delete();

        return response()->json([
            'message' => 'Filme deletado com sucesso.'
        ]);
    }
}
