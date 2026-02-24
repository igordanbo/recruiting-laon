<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerieRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:3',
            'original_title' => 'required|string|max:255|min:3',
            'year' => 'required|integer|digits:4|min:1800|max:' . date('Y'),
            'synopsis' => 'required|string|min:10',
            'director' => 'required|string|max:255|min:3',
            'trailer_url' => 'required|url',
            'status' => 'in:released,upcoming'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',

            'original_title.required' => 'O título original é obrigatório.',
            'original_title.min' => 'O título original deve ter no mínimo 3 caracteres.',
            'original_title.max' => 'O título original deve ter no máximo 255 caracteres.',

            'year.required' => 'O ano é obrigatório.',
            'year.integer' => 'O ano deve ser um número inteiro.',
            'year.digits' => 'O ano deve conter 4 dígitos.',
            'year.min' => 'O ano informado é inválido.',
            'year.max' => 'O ano não pode ser maior que o ano atual.',

            'duration.required' => 'A duração é obrigatória.',
            'duration.integer' => 'A duração deve ser um número inteiro.',
            'duration.min' => 'A duração deve ser maior que zero.',
            'duration.max' => 'A duração parece inválida.',

            'synopsis.required' => 'A sinopse é obrigatória.',
            'synopsis.min' => 'A sinopse deve ter no mínimo 10 caracteres.',

            'director.required' => 'O diretor é obrigatório.',
            'director.min' => 'O nome do diretor deve ter no mínimo 3 caracteres.',
            'director.max' => 'O nome do diretor deve ter no máximo 255 caracteres.',

            'trailer_url.url' => 'Forneça uma url válida.',
            'trailer_url.required' => 'A url do trailer é obrigatório',

            'status.in' => 'O status pode ser somente released (para lançado) ou upcoming (para filmes que lançarão em breve).'
        ];
    }
}
