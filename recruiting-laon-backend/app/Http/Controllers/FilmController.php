<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    public function index(Request $request)
    {
        $query = Film::with(['categories', 'ratings', 'awards', 'actors']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $films = $query
            ->paginate(6)
            ->withQueryString();

        return response()->json($films);
    }

    public function show($id_film)
    {
        $film = Film::with(['categories', 'ratings', 'awards', 'actors'])
            ->findOrFail($id_film);

        return response()->json($film, 200);
    }

    public function store(FilmRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('films', 'public');
        }

        $film = Film::create($data);

        return response()->json([
            'message' => 'Filme cadastrada',
            'film' => $film
        ], 201);
    }

    public function update(FilmRequest $request, $id_film)
    {
        $film = Film::findOrFail($id_film);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('films', 'public');
        }

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
