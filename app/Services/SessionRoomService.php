<?php

namespace App\Services;

use App\Repositories\Contracts\SessionRoomRepositoryInterface;
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

    public function updateRoom($id, $sessionRoom)
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
}
