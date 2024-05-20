<?php

namespace App\Services;

use App\Repositories\Contracts\SessionClientRepositoryInterface;
use App\Models\SessionClient;
use Illuminate\Support\Str;

class SessionClientService
{
    protected $sessionClientRepository;

    public function __construct(SessionClientRepositoryInterface $sessionClientRepository)
    {
        $this->sessionClientRepository = $sessionClientRepository;
    }

    public function getAllSessionClient()
    {
        return $this->sessionClientRepository->getAllSessionClients();
    }

    public function getSessionClientById($id)
    {
        return $this->sessionClientRepository->getSessionClientById($id);
    }

    public function makeSessionClient(array $sessionClient)
    {
        return $this->sessionClientRepository->createSessionClient($sessionClient);
    }

    public function updateSessionClient($id, $sessionClient)
    {
        $sessionClients = $this->sessionClientRepository->getSessionClientById($id);

        if (!$sessionClients) {
            return response()->json(['message' => 'Sessão do cliente não encontrado'], 404);
        }

        $this->sessionClientRepository->updateSessionClient($sessionClients, $sessionClient);
        return response()->json(['message' => 'Sessão do cliente atualizada'], 200);
    }

    public function destroySessionClient($id)
    {
        $sessionClient = $this->sessionClientRepository->getSessionClientById($id);

        if (!$sessionClient) {
            return response()->json(['message' => 'Sessão do cliente não encontrado'], 404);
        }
        $this->sessionClientRepository->destroySessionClient($sessionClient);

        return response()->json(['message' => 'Sessão do cliente removida'], 200);
    }

    public function verifySeat(string $cpf, int $numberSeat, int $movie)
    {
        return SessionClient::where('sessionRoomId', $movie)
                            ->where('numberSeat', $numberSeat)
                            ->where('cpf', $cpf)->first();
    }
}
