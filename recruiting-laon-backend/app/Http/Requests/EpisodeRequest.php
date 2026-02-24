<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'season_id' => 'required|exists:seasons,id',
            'title' => 'required|string|max:255|min:3',
            'episode_number' => 'required|integer|min:0',
            'synopsis' => 'required|string|min:10',
            'duration' => 'required|integer|min:1|max:500',
            'video_url' => 'required|url',

        ];
    }

    public function messages(): array
    {
        return [
            'season_id.required' => 'O ID da temporada é obrigatório.',
            'season_id.exists' => 'A temporada especificada não existe.',

            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'title.max' => 'O título deve ter no máximo 255 caracteres.',

            'episode_number.required' => 'O número do episódio é obrigatório.',
            'episode_number.integer' => 'O número do episódio deve ser um número inteiro.',
            'episode_number.min' => 'O número do episódio deve ser maior que 0.',
            'episode_number.max' => 'O número do episódio parece inválido.',

            'synopsis.required' => 'A sinopse é obrigatória.',
            'synopsis.min' => 'A sinopse deve ter no mínimo 10 caracteres.',

            'duration.required' => 'A duração é obrigatória.',
            'duration.integer' => 'A duração deve ser um número inteiro.',
            'duration.min' => 'A duração deve ser maior que zero.',
            'duration.max' => 'A duração parece inválida.',

            'video_url.url' => 'Forneça uma url válida',
            'video_url.required' => 'Uma url do vídeo é obrigatória.',
        ];
    }
}
