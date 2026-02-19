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
            'film_id' => 'required|exists:films,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'film_id.required' => 'O ID do filme é obrigatório.',
            'film_id.exists' => 'O filme especificado não existe.',

            'user_id.required' => 'O ID do usuário é obrigatório.',
            'user_id.exists' => 'O usuário especificado não existe.',
        ];
    }
}
