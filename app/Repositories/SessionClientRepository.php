<?php

namespace App\Repositories;

use App\Repositories\Contracts\SessionClientRepositoryInterface;
use App\Models\SessionClient;


class SessionClientRepository implements SessionClientRepositoryInterface
{

    protected $entity;

    public function __construct(SessionClient $sessionClient)
    {
        $this->entity = $sessionClient;
    }

    public function getAllSessionClients()
    {
        return $this->entity->orderBy('id', 'desc')->paginate();
    }

    public function getSessionClientById($id)
    {
        return $this->entity->where('id', $id)->first();
    }

    public function createSessionClient($sessionRoom)
    {
        return $this->entity->create($sessionRoom);
    }

    public function updateSessionClient($sessionClient, $categorie)
    {
        return $sessionClient->update($categorie);
    }

    public function destroySessionClient($sessionClient)
    {
        return $sessionClient->delete();
    }
}
