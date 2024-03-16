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
        $users = $this->userService->getAllUsers();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData) {
            $user = $this->userService->makeUser($request->all());
            return redirect()->route('users')->with('success', 'Usuário cadastrado com sucesso!');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);

        return view('admin.users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->updateUser($id, $request->all());

        return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $user = $this->userService->destroyUser($id);

        return redirect()->route('users')->with('success', 'Usuário excluído com sucesso!');
    }
}
