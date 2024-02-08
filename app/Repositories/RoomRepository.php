<?php

namespace App\Repositories;

use App\Repositories\Contracts\RoomRepositoryInterface;
use App\Models\Room;


class RoomRepository implements RoomRepositoryInterface
{

    protected $entity;

    public function __construct(Room $room)
    {
        $this->entity = $room;
    }

    public function getAllRooms(): array
    {
        return $this->entity->paginate();
    }

    public function getRoomById(int $id): object
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createRoom(array $room): object
    {
        return $this->entity->create($room);
    }

    public function updateRoom(object $room, array $categorie): object
    {
        return $room->update($categorie);
    }

    public function destroyRoom(object $room)
    {
        return $room->delete();
    }
}
