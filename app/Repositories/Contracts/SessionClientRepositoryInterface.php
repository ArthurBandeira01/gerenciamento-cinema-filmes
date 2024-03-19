<?php

namespace App\Repositories\Contracts;

interface SessionClientRepositoryInterface
{
    public function getAllSessionClients();
    public function getSessionClientById($id);
    public function createSessionClient($sessionClient);
    public function updateSessionClient($id, $sessionClient);
    public function destroySessionClient($id);
}
