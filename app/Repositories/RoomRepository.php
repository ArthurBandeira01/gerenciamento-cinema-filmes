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

    public function getAllRooms()
    {
        return $this->entity->orderBy('id', 'asc')->paginate();
    }

    public function getRoomById($id)
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createRoom(array $room): object
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
