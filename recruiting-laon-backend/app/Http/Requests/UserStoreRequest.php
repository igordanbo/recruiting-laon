<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin',
            'birth_date' => 'date|before:today',
            'gender' => 'in:male,female,other',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Um nome é obrigatório para realizar o cadastro na plataforma.',
            'name.max' => 'Insira um nome com no máximo 255 caracteres.',
            'name.min' => 'Insira um nome com no mínimo 3 caracteres.',

            'email.unique' => 'Este e-mail já está cadastrado.',
            'email.email' => 'Insira um email válido.',
            'email.required' => 'Um email é obrigatório para realizar o cadastro na plataforma.',

            'password.required' => 'Uma senha é obrigatória para realizar o cadastro na plataforma.',
            'password.min' => 'Insira uma senha com no mínimo 6 caracteres.',

            'role.required' => 'O campo de função é obrigatório para realizar o cadastro na plataforma.',
            'role.in' => 'O campo de função deve ser "user" ou "admin".',

            'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
            'birth_date.before' => 'A data de nascimento deve ser uma data anterior à data atual.',

            'gender.in' => 'O campo de gênero deve ser "male", "female" ou "other".',
        ];
    }
}
