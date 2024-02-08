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

    public function getAllRooms(): array
    {
        return $this->roomRepository->getAllRooms();
    }

    public function getRoomById(int $id): object
    {
        return $this->roomRepository->getRoomById($id);
    }

    public function makeRoom(array $room): object
    {
        $room['url'] = Str::kebab($room['name']);
        $room['uuid'] = Str::uuid();

        return $this->roomRepository->createRoom($room);
    }

    public function updateRoom(int $id, array $room)
    {
        $room = $this->roomRepository->getRoomById($id);

        if (!$room) {
            return response()->json(['message' => 'Room Not Found'], 404);
        }

        if ($room['name']) {
            $room['url'] = Str::kebab($room['name']);
        }
        $this->roomRepository->updateRoom($room, $room);
        return response()->json(['message' => 'Room Updated'], 200);
    }

    public function destroyRoom(int $id)
    {
        $room = $this->roomRepository->getRoomById($id);

        if (!$room) {
            return response()->json(['message' => 'Room Not Found'], 404);
        }
        $this->roomRepository->destroyRoom($room);

        return response()->json(['message' => 'Room Deleted'], 200);
    }
}
