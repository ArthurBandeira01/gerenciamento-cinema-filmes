<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cpf' => 'required',
            'numberSeat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é obrigatório.',
            'numberSeat.required' => 'O número de assentos é obrigatório.',
        ];
    }
}
