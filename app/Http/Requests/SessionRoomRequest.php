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
            'numberSeats' => 'required',
            'priceTicket' => 'required',
            'sessionDate' => 'required',
            'sessionTime' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'movie.required' => 'O nome da sala é obrigatório.',
            'movieImage.required' => 'A imagem do filme é obrigatório.',
            'numberSeats.required' => 'O número de assentos é obrigatório.',
            'priceTicket.required' => 'O valor do ingresso é obrigatório.',
            'sessionDate.required' => 'A data da sessão é obrigatória.',
            'sessionTime.required' => 'O horário da sessão é obrigatório.',
        ];
    }
}
