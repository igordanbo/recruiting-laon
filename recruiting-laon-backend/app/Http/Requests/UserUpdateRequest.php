<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255|min:3',

            'email' => [
                'sometimes',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('id_user'))
            ],

            'name' => 'sometimes|required|string|min:3|max:255',
            'email' => 'sometimes|required|email',

            'birth_date' => 'nullable|date|before:today',
            'gender' => 'nullable|in:male,female,other',
            'password' => 'sometimes|nullable|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.max' => 'Insira um nome com no máximo 255 caracteres.',
            'name.min' => 'Insira um nome com no mínimo 3 caracteres.',

            'email.unique' => 'Este e-mail já está cadastrado.',
            'email.email' => 'Insira um email válido.',

            'password.min' => 'Insira uma senha com no mínimo 6 caracteres.',

            'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
            'birth_date.before' => 'A data de nascimento deve ser uma data anterior à data atual.',

            'gender.in' => 'O campo de gênero deve ser "male", "female" ou "other".',
        ];
    }
}
