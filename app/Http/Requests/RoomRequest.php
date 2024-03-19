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
        if ($this->isMethod('post')) {
            return [
                'name' => 'required',
                'seats' => 'required',
            ];
        }

        if ($this->isMethod('put')) {
            return [
                'name' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da sala é obrigatório.',
            'seats.required' => 'O número de assentos é obrigatório.',
        ];
    }
}
