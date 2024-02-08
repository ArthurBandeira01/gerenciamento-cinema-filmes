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
        $user['url'] = Str::kebab($user['name']);
        $user['uuid'] = Str::uuid();

        return $this->usersRepository->createUser($user);
    }

    public function updateUser(int $id, array $user)
    {
        $users = $this->usersRepository->getUserById($id);

        if (!$users) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        if ($user['name']) {
            $user['url'] = Str::kebab($user['name']);
        }
        $this->usersRepository->updateUser($users, $user);
        return response()->json(['message' => 'User Updated'], 200);
    }

    public function destroyUser(int $id)
    {
        $users = $this->usersRepository->getUserById($id);

        if (!$users) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $this->usersRepository->destroyUser($users);

        return response()->json(['message' => 'User Deleted'], 200);
    }
}
