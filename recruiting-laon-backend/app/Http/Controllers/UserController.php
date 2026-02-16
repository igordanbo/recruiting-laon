<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users  = User::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($users);
    }

    public function show($id_user)
    {
        $user = User::findOrFail($id_user);

        return response()->json([
            'user' => $user
        ], 200);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return response()->json([
            'message' => 'Usuário cadastrado',
            'user' => $user
        ], 201);
    }

    public function update(UserUpdateRequest $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $data = $request->validated();

        //criptografar senha
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Usuário atualizado.',
            'user' => $user
        ], 200);
    }

    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso.'
        ]);
    }
}
