<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmCategoryRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'film_id.required' => 'O ID do filme é obrigatório.',
            'film_id.exists' => 'O filme especificado não existe.',

            'category_id.required' => 'O ID da categoria é obrigatório.',
            'category_id.exists' => 'A categoria especificada não existe.',
        ];
    }
}
