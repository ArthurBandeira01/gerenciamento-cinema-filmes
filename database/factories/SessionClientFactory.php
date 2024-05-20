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
        // Get the next available seat number
        $nextSeatNumber = $this->getNextSeatNumber();

        return [
            'sessionRoomId' => 9,
            'cpf' => FunctionsHelper::generateValidCPF(),
            'numberSeat' => $nextSeatNumber,
        ];
    }

    protected function getNextSeatNumber()
    {
        // Get the maximum seat number currently in the database
        $maxSeatNumber = DB::table('sessions_clients')->max('numberSeat');
        return $maxSeatNumber ? $maxSeatNumber + 1 : 1;
    }
}
