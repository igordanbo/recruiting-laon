<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_film' => 'required|exists:films,id',
            'id_user' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id_film.required' => 'O ID do filme é obrigatório.',
            'id_film.exists' => 'O filme especificado não existe.',

            'id_user.required' => 'O ID do usuário é obrigatório.',
            'id_user.exists' => 'O usuário especificado não existe.',
        ];
    }
}
