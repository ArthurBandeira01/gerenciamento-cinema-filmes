<?php

namespace App\Services;

use App\Repositories\Contracts\RoomRepositoryInterface;
use Illuminate\Support\Str;

class RoomService
{
    protected $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getAllRooms()
    {
        return $this->roomRepository->getAllRooms();
    }

    public function getRoomById($id)
    {
        return $this->roomRepository->getRoomById($id);
    }

    public function makeRoom($room)
    {
        $room['url'] = Str::kebab($room['name']);
        $room['uuid'] = Str::uuid();

        return $this->roomRepository->createRoom($room);
    }

    public function updateRoom($id, $room)
    {
        $rooms = $this->roomRepository->getRoomById($id);

        if (!$rooms) {
            return response()->json(['message' => 'Room Not Found'], 404);
        }

        $this->roomRepository->updateRoom($rooms, $room);
        return response()->json(['message' => 'Room Updated'], 200);
    }

    public function destroyRoom($id)
    {
        $room = $this->roomRepository->getRoomById($id);

        if (!$room) {
            return response()->json(['message' => 'Room Not Found'], 404);
        }
        $this->roomRepository->destroyRoom($room);

        return response()->json(['message' => 'Room Deleted'], 200);
    }
}
