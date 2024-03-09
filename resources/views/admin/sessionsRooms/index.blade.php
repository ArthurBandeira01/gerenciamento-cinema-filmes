@extends('admin.master')
@section('title', 'Salas')
@section('content')
    <div class="flex justify-center items-center">
        <h2 class="text-center text-black-500"><i class="fas fa-tenants"></i> Listar Sessões</h2>
        <h2 class="title text-center ml-4">
            <a class="rounded p-1 bg-green-500 hover:bg-green-800 text-white" href="{{ route('Create') }}">
                <i class="fas fa-plus-circle"></i> Adicionar Sessão
            </a>
        </h2>
    </div>
    <div class="main-content text-center">
        <table class="table-auto mt-8" aria-describedby="Sessões">
            <thead>
                <tr>
                    <th class="px-4 py-2" scope="col">Sessões</th>
                    <th class="px-4 py-2" scope="col" colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessionsRooms as $sessionRoom)
                    <tr class="divide-x divide-gray-200">
                        <td class="px-6 py-2">{{ $sessionRoom->id }}</td>
                        <td class="flex justify-center px-6 py-2">
                            <button onclick="listSessionRoom('{{ $sessionRoom->id }}')" class="p-2 rounded bg-yellow-500
                                hover:bg-yellow-800 text-white transition-colors duration-300">
                                <i class="far fa-eye"></i>
                            </button>
                            <a href="{{route('sessionRoomEdit', ['id' => $sessionRoom->id])}}" class="p-2 ml-2 rounded
                                bg-blue-500 hover:bg-blue-800 text-white transition-colors duration-300">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="ml-2" action="{{ route('sessionRoomDestroy', ['id' => $room->id]) }}"
                                method="POST" onsubmit="return confirm('Tem certeza?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-800 text-white p-2 rounded
                                transition-colors duration-300">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
<script>
    function listSessionRoom(name) {
        Swal.fire({
            title: name,
            icon: 'info',
            showCancelButton: false,
            showCloseButton: true,
            confirmButtonText: 'Voltar'
        });
    }
</script>
@endsection
