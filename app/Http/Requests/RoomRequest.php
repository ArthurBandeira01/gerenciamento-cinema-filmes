<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'seats' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da sala é obrigatório.',
            'seats.required' => 'O número de assentos é obrigatório.',
        ];
    }
}
