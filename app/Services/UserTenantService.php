<?php

namespace App\Services;

use App\Repositories\Contracts\UserTenantRepositoryInterface;
use Illuminate\Support\Str;

class UserTenantService
{
    protected $userTenantRepository;

    public function __construct(UserTenantRepositoryInterface $userTenantRepository)
    {
        $this->userTenantRepository = $userTenantRepository;
    }

    public function getAllUserTenants()
    {
        return $this->userTenantRepository->getAllUsersTenant();
    }

    public function getUserTenantById(int $id)
    {
        return $this->userTenantRepository->getUserTenantById($id);
    }

    public function makeUserTenant(array $userTenant)
    {
        $userTenant['url'] = Str::kebab($userTenant['name']);
        $userTenant['uuid'] = Str::uuid();

        return $this->userTenantRepository->createUserTenant($userTenant);
    }

    public function updateUserTenant(int $id, array $userTenant)
    {
        $userTenant = $this->userTenantRepository->getUserTenantById($id);

        if (!$userTenant) {
            return response()->json(['message' => 'UserTenant Not Found'], 404);
        }

        if ($userTenant['name']) {
            $userTenant['url'] = Str::kebab($userTenant['name']);
        }
        $this->userTenantRepository->updateUserTenant($userTenant, $userTenant);
        return response()->json(['message' => 'UserTenant Updated'], 200);
    }

    public function destroyUserTenant(int $id)
    {
        $userTenant = $this->userTenantRepository->getUserTenantById($id);

        if (!$userTenant) {
            return response()->json(['message' => 'UserTenant Not Found'], 404);
        }
        $this->userTenantRepository->destroyUserTenant($userTenant);

        return response()->json(['message' => 'Usuário deletado'], 200);
    }
}
