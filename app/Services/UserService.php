<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Str;

class UserService
{
    protected $usersRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->usersRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->usersRepository->getAllUsers();
    }

    public function getUserById(int $id)
    {
        return $this->usersRepository->getUserById($id);
    }

    public function makeUser(array $user)
    {
        return $this->usersRepository->createUser($user);
    }

    public function updateUser(int $id, array $user)
    {
        $users = $this->usersRepository->getUserById($id);

        if (!$users) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $this->usersRepository->updateUser($users, $user);

        return response()->json(['message' => 'Usuário atualizado'], 200);
    }

    public function destroyUser(int $id)
    {
        $users = $this->usersRepository->getUserById($id);

        if (!$users) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $this->usersRepository->destroyUser($users);

        return response()->json(['message' => 'Usuário deletado'], 200);
    }
}
