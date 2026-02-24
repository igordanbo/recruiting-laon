<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorSerieRequest extends FormRequest
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
            'serie_id' => 'required|exists:series,id',
            'actor_id' => 'required|exists:actors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'serie_id.required' => 'O ID da série é obrigatória.',
            'serie_id.exists' => 'A série especificada não existe.',

            'actor_id.required' => 'O ID do ator é obrigatório.',
            'actor_id.exists' => 'O ator especificado não existe.',
        ];
    }
}
