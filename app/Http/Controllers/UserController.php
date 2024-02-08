<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        dd('aqui');
        return view('admin.users.index');
    }

    public function create()
    {
        $data = [];

        return view('admin.users.create', compact('data'));
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->makeUser($request->all());

        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);

        $data = [];

        return view('admin.users.show', compact('data'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->all());

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $user = $this->userService->destroyUser($id);

        return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
