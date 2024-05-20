<?php

namespace App\Services;

use App\Repositories\Contracts\SessionRoomRepositoryInterface;
use App\Models\SessionRoom;
use Illuminate\Support\Str;

class SessionRoomService
{
    protected $sessionRoomRepository;

    public function __construct(SessionRoomRepositoryInterface $sessionRoomRepository)
    {
        $this->sessionRoomRepository = $sessionRoomRepository;
    }

    public function getAllSessionRooms()
    {
        return $this->sessionRoomRepository->getAllSessionRooms();
    }

    public function getSessionRoomById($id)
    {
        return $this->sessionRoomRepository->getSessionRoomById($id);
    }

    public function makeSessionRoom(array $sessionRoom)
    {
        return $this->sessionRoomRepository->createSessionRoom($sessionRoom);
    }

    public function updateSessionRoom($id, $sessionRoom)
    {
        $sessionRooms = $this->sessionRoomRepository->getSessionRoomById($id);

        if (!$sessionRooms) {
            return response()->json(['message' => 'Sala de sessão não encontrado'], 404);
        }

        $this->sessionRoomRepository->updateSessionRoom($sessionRooms, $sessionRoom);
        return response()->json(['message' => 'Sala de sessão atualizada.'], 200);
    }

    public function destroySessionRoom($id)
    {
        $sessionRoom = $this->sessionRoomRepository->getSessionRoomById($id);

        if (!$sessionRoom) {
            return response()->json(['message' => 'Sala de sessão não encontrada'], 404);
        }
        $this->sessionRoomRepository->destroySessionRoom($sessionRoom);

        return response()->json(['message' => 'Sala de sessão excluída'], 200);
    }

    //Verifica se já existe sessão ativa na mesma data e horário
    public function verifyRoomAvailable(string $date, string $time)
    {
        $verifyRoomAvailable = SessionRoom::where('sessionDate', $date)
                                            ->where('sessionTime', $time)
                                            ->count();

        return ($verifyRoomAvailable > 0) ? true : false;
    }

    public function verifyStatusSession(): array
    {
        $sessions = $this->sessionRoomRepository->getAllSessionRooms();
        $sessionsRooms = [];

        foreach ($sessions as $sessionRoom) {
            if ($sessionRoom->status === true) {
                $sessionsRooms[] = $sessionRoom;
            }
        }

        return $sessionsRooms;
    }

    public function removeSeatSessionRoom(int $id): void
    {
        $sessionRoom = $this->sessionRoomRepository->getSessionRoomById($id);
        $sessionRoom->numberSeats -= 1;
        $sessionRoom->save();
    }

    public function addSeatSessionRoom(int $id): void
    {
        $sessionRoom = $this->sessionRoomRepository->getSessionRoomById($id);
        $sessionRoom->numberSeats += 1;
        $sessionRoom->save();
    }
}
