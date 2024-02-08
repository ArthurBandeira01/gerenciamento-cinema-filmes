<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTenant;
use App\Services\UserTenantService;
use App\Http\Requests\UserTenantRequest;
use App\Http\Resources\UserTenantResource;

class UserTenantController extends Controller
{
    protected $userTenantService;

    public function __construct(UserTenantService $userTenantService)
    {
        $this->userTenantService = $userTenantService;
    }

    public function index()
    {
        return view('admin.userTenants.index');
    }

    public function create()
    {
        $data = [];

        return view('admin.userTenants.create', compact('data'));
    }

    public function store(UserTenantRequest $request)
    {
        $userTenant = $this->userTenantService->makeUserTenant($request->all());

        return redirect()->route('userTenant.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show($id)
    {
        $userTenant = $this->userTenantService->getUserTenantById($id);

        $data = [];

        return view('admin.userTenants.show', compact('data'));
    }

    public function update(UserTenantRequest $request, $id)
    {
        $userTenant = $this->userTenantService->updateUserTenant($id, $request->all());

        return redirect()->route('userTenant.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $userTenant = $this->userTenantService->destroyUserTenant($id);

        return redirect()->route('userTenant.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
