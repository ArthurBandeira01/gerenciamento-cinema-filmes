<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'movie' => 'required',
            'movieImage' => 'required',
            'priceTicket' => 'required',
            'sessionTime' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'movie.required' => 'O nome do filme é obrigatório.',
            'movieImage.required' => 'A imagem do filme é obrigatório.',
            'priceTicket.required' => 'O valor do ingresso é obrigatório.',
            'sessionTime.required' => 'O horário da sessão é obrigatório.',
            'status.required' => 'O status é obrigatório.',
        ];
    }
}
