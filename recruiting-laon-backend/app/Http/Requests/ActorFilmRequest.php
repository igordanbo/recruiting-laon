<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorFilmRequest extends FormRequest
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
            'actor_id' => 'required|exists:actors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'film_id.required' => 'O ID do filme é obrigatório.',
            'film_id.exists' => 'O filme especificado não existe.',

            'actor_id.required' => 'O ID do ator é obrigatório.',
            'actor_id.exists' => 'O ator especificado não existe.',
        ];
    }
}
