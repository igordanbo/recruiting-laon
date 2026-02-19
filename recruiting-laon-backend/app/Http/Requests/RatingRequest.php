<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'source' => 'required|string|max:50|min:2',

            'rating' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'source.required' => 'A fonte da avaliação é obrigatória.',
            'source.max' => 'A fonte deve ter no máximo 50 caracteres.',
            'source.min' => 'A fonte deve ter no mínimo 2 caracteres.',

            'rating.required' => 'A nota é obrigatória.',
            'rating.numeric' => 'A nota deve ser numérica.',
            'rating.min' => 'A nota não pode ser negativa.',
            'rating.max' => 'A nota não pode ser maior que 100.',
        ];
    }
}
