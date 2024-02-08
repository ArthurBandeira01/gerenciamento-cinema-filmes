<?php

namespace App\Repositories\Contracts;

interface RoomRepositoryInterface
{
    public function getAllRooms();
    public function getRoomById($id);
    public function createRoom(array $room);
    public function updateRoom(int $id, array $room);
    public function destroyRoom(int $id);
}
