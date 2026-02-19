<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:2',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título do prêmio é obrigatório.',
            'title.max' => 'O título do prêmio deve ter no máximo 255 caracteres.',
            'title.min' => 'O título do prêmio deve ter no mínimo 2 caracteres.',
        ];
    }
}
