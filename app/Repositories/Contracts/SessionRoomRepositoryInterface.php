<?php

namespace App\Repositories\Contracts;

interface SessionRoomRepositoryInterface
{
    public function getAllSessionRooms();
    public function getSessionRoomById($id);
    public function createSessionRoom($sessionRoom);
    public function updateSessionRoom($id, $sessionRoom);
    public function destroySessionRoom($id);
}
