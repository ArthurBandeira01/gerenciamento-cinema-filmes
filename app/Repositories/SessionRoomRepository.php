<?php

namespace App\Repositories;

use App\Repositories\Contracts\SessionRoomRepositoryInterface;
use App\Models\SessionRoom;


class SessionRoomRepository implements SessionRoomRepositoryInterface
{

    protected $entity;

    public function __construct(SessionRoom $sessionRoom)
    {
        $this->entity = $sessionRoom;
    }

    /**
     * Get all SessionRooms
     * @return array
     */
    public function getAllSessionRooms()
    {
        return $this->entity->orderBy('id', 'desc')->paginate();
    }

    public function getSessionRoomById($id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria uma nova categoria
     * @param array $sessionRoom
     * @return object
     */
    public function createSessionRoom($sessionRoom)
    {
        return $this->entity->create($sessionRoom);
    }

    /**
     * Atualiza os dados da categoria
     * @param object $sessionRoom
     * @param array $categorie
     * @return object
     */
    public function updateSessionRoom($sessionRoom, $categorie)
    {
        return $sessionRoom->update($categorie);
    }

    /**
     * Deleta uma categoria
     * @param object $sessionRoom
     */
    public function destroySessionRoom($sessionRoom)
    {
        return $sessionRoom->delete();
    }
}
