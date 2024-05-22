<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SessionClient;
use App\Models\SessionRoom;
use App\Models\Tenant;

class SessionClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::all()->runForEach(function () {
        // Preenche uma sessão com 20 assentos
        $this->createSessionClients(14, 2);
        });
    }

    private function createSessionClients($sessionRoomId, $numSeats)
    {
        foreach (range(1, $numSeats) as $seatNumber) {
            SessionClient::factory()->create([
                'sessionRoomId' => $sessionRoomId,
                'numberSeat' => $seatNumber,
            ]);

            // Atualiza o número de assentos na tabela sessions_rooms
            $sessionRoom = SessionRoom::find($sessionRoomId);
            $sessionRoom->numberSeats = max(0, $sessionRoom->numberSeats - 1); // Assegura que o valor não fique negativo
            $sessionRoom->save();
        }
    }
}
