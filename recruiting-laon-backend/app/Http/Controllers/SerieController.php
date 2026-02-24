<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;


class SerieController extends Controller
{
    public function index(Request $request)
    {
        $query = Serie::with(['categories', 'ratings', 'awards', 'actors', 'seasons', 'seasons.episodes']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        }

        $series = $query
            ->paginate(6)
            ->withQueryString();

        return response()->json($series);
    }

    public function show($id_serie)
    {
        $serie = Serie::with(['categories', 'ratings', 'awards', 'actors', 'seasons', 'seasons.episodes'])
            ->findOrFail($id_serie);

        return response()->json($serie, 200);
    }

    public function store(SerieRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('series', 'public');
        }

        $serie = Serie::create($data);

        return response()->json([
            'message' => 'Série cadastrada',
            'serie' => $serie
        ], 201);
    }

    public function update(SerieRequest $request, $id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('series', 'public');
        }

        $serie->update($data);

        return response()->json([
            'message' => 'seriee atualizado.',
            'serie' => $serie
        ], 200);
    }

    public function destroy($id_serie)
    {
        $serie = Serie::findOrFail($id_serie);

        $serie->delete();

        return response()->json([
            'message' => 'Série deletada com sucesso.'
        ]);
    }
}
