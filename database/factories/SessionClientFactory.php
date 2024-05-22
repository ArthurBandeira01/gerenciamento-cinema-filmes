<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\FunctionsHelper;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionClient>
 */
class SessionClientFactory extends Factory
{

    public function definition(): array
    {
        return [
            'sessionRoomId' => 14,
            'cpf' => FunctionsHelper::generateValidCPF(),
            'numberSeat' => 1,
        ];
    }
}
