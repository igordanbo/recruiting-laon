<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories  = Category::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($categories);
    }

    public function show($id_category)
    {
        $category = Category::findOrFail($id_category);

        return response()->json([
            'category' => $category
        ], 200);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = Category::create([
            'name' => $data['name'],
        ]);

        return response()->json([
            'message' => 'Categoria cadastrada',
            'category' => $category
        ], 201);
    }

    public function update(CategoryRequest $request, $id_category)
    {
        $category = Category::findOrFail($id_category);

        $data = $request->validated();

        $category->update($data);

        return response()->json([
            'message' => 'Categoria atualizada.',
            'category' => $category
        ], 200);
    }

    public function destroy($id_category)
    {
        $category = Category::findOrFail($id_category);

        $category->delete();

        return response()->json([
            'message' => 'Categoria deletada com sucesso.'
        ]);
    }
}
