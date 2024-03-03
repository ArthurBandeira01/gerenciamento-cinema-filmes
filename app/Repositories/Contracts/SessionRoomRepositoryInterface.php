<?php

namespace App\Repositories\Contracts;

interface SessionRoomRepositoryInterface
{
    public function getAllSessionRooms();
    public function getSessionRoomById($id);
    public function createSessionRoom(array $sessionRoom);
    public function updateSessionRoom(int $id, array $sessionRoom);
    public function destroySessionRoom(int $id);
}
