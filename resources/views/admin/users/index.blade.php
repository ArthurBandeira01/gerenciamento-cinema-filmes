@extends('admin.master')
@section('title', 'Listar Usuários')
@section('content')
    <div class="flex justify-center items-center">
        <h2 class="text-center text-black-500"><i class="fas fa-users"></i> Listar usuários</h2>
        <h2 class="title text-center ml-4">
            <a class="rounded p-1 bg-green-500 hover:bg-green-800 text-white"
            @if(isset($tenantVerify)) href="{{ route('usersTenantCreate') }}">
            @else href="{{ route('usersCreate') }}">
            @endif
                <i class="fas fa-plus-circle"></i> Adicionar Usuário
            </a>
        </h2>
    </div>
    <div class="main-content text-center">
        <table class="table-auto mt-8" aria-describedby="Usuários">
            <thead>
                <tr>
                    <th class="px-4 py-2" scope="col">ID</th>
                    <th class="px-4 py-2" scope="col">Usuário</th>
                    <th class="px-4 py-2" scope="col" colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="divide-x divide-gray-200">
                        <td class="px-6 py-2 font-bold">{{ $user->id }}</td>
                        <td class="px-6 py-2">{{ $user->name }}</td>
                        <td class="flex justify-center px-6 py-2">
                            <button onclick="listUser('{{ $user->name }}', '{{ $user->email }}')"
                                 class="p-2 rounded bg-yellow-500 hover:bg-yellow-800 text-white
                                        transition-colors duration-300">
                                <i class="far fa-eye"></i>
                            </button>
                            @if(isset($tenantVerify)) <a href="{{route('usersTenantEdit', ['user' => $user->id])}}"
                            @else <a href="{{route('usersEdit', ['user' => $user->id])}}"
                            @endif
                                class="p-2 ml-2 rounded bg-blue-500 hover:bg-blue-800 text-white
                                        transition-colors duration-300">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <form class="ml-2"  method="POST" onsubmit="return confirm('Tem certeza?')"
                            @if(isset($tenantVerify)) action="{{ route('usersTenantDestroy', ['user' => $user->id]) }}">
                            @else action="{{ route('usersDestroy', ['user' => $user->id]) }}">
                            @endif
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-800 text-white p-2
                                rounded transition-colors duration-300">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>

        <div class="text-left mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function listUser(name, email) {
        Swal.fire({
            title: name,
            text: email,
            icon: 'info',
            showCancelButton: false,
            showCloseButton: true,
            confirmButtonText: 'Voltar'
        });
    }
</script>
@endsection
