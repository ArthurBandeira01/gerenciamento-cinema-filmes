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

    public function getRoomById($id)
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createRoom($room)
    {
        return $this->entity->create($room);
    }

    public function updateRoom($room, $categorie)
    {
        return $room->update($categorie);
    }

    public function destroyRoom($room)
    {
        return $room->delete();
    }
}
