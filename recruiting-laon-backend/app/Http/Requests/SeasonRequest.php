<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:3',
            'year' => 'required|integer|digits:4|min:1800|max:' . date('Y'),
            'season_number' => 'required|integer|min:0',

        ];
    }

    public function messages(): array
    {
        return [
            'serie_id.required' => 'O ID da série é obrigatório.',
            'serie_id.exists' => 'A série especificada não existe.',

            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',

            'year.required' => 'O ano é obrigatório.',
            'year.integer' => 'O ano deve ser um número inteiro.',
            'year.digits' => 'O ano deve conter 4 dígitos.',
            'year.min' => 'O ano informado é inválido.',
            'year.max' => 'O ano não pode ser maior que o ano atual.',

            'season_number.required' => 'O número da temporada é obrigatório.',
            'season_number.integer' => 'O número da temporada deve ser um número inteiro.',
            'season_number.min' => 'O número da temporada deve ser maior que 0.',
            'season_number.max' => 'O número da temporada parece inválida.',

        ];
    }
}
