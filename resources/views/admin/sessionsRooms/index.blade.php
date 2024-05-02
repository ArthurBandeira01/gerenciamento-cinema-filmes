@extends('admin.master')
@section('title', 'Salas')
@section('content')
    <div class="flex justify-center items-center">
        <h2 class="text-center text-black-500"><i class="fas fa-tenants"></i> Listar Sessões</h2>
        <h2 class="title text-center ml-4">
            <a class="rounded p-1 bg-green-500 hover:bg-green-800 text-white" href="{{ route('sessionRoomCreate') }}">
                <i class="fas fa-plus-circle"></i> Adicionar Sessão
            </a>
        </h2>
    </div>
    <div class="main-content text-center">
        <table class="table-auto mt-8" aria-describedby="Sessões">
            <thead>
                <tr>
                    <th class="px-4 py-2" scope="col">ID</th>
                    <th class="px-4 py-2" scope="col">Filme</th>
                    <th class="px-4 py-2" scope="col">Ingresso (R$)</th>
                    <th class="px-4 py-2" scope="col">Assentos</th>
                    <th class="px-4 py-2" scope="col">Data/Horário</th>
                    <th class="px-4 py-2" scope="col">Status</th>
                    <th class="px-4 py-2" scope="col" colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessionsRooms as $sessionRoom)
                    <tr class="divide-x divide-gray-200">
                        <td class="px-6 py-2">{{ $sessionRoom->id }}</td>
                        <td class="px-6 py-2">{{ $sessionRoom->movie }}</td>
                        <td class="px-6 py-2">
                            {{ FunctionsHelper::formatDecimalSqlToCurrencyBr($sessionRoom->priceTicket) }}
                        </td>
                        <td class="px-6 py-2">{{ $sessionRoom->numberSeats }}</td>
                        <td class="px-6 py-2">
                            {{ FunctionsHelper::formatDateSqlToBr($sessionRoom->sessionDate) }}
                            {{ FunctionsHelper::timeToBrazil($sessionRoom->sessionTime) }}
                        </td>
                        @if($sessionRoom->status) <td class="px-6 py-2 text-green-500"> On
                        @else <td class="px-6 py-2 text-red-500"> Off
                        @endif
                        </td>
                        <td class="flex justify-center px-6 py-2">
                            <button
                                onclick="listSessionRoom('{{ $sessionRoom->room->name }}', '{{ $sessionRoom->movie }}')"
                                class="p-2 rounded bg-yellow-500 hover:bg-yellow-800 text-white
                                transition-colors duration-300">
                                <i class="far fa-eye"></i>
                            </button>
                            <a href="{{route('sessionRoomEdit', ['sessionRoom' => $sessionRoom->id])}}"
                                class="p-2 ml-2 rounded bg-blue-500 hover:bg-blue-800 text-white
                                 transition-colors duration-300">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('sessionRoomDestroy', ['sessionRoom' => $sessionRoom->id]) }}"
                                method="POST" onsubmit="return confirm('Tem certeza?')" class="ml-2">
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
    function listSessionRoom(name, movie) {
        Swal.fire({
            title: 'Sala: ' + name,
            text: movie,
            icon: 'info',
            showCancelButton: false,
            showCloseButton: true,
            confirmButtonText: 'Voltar'
        });
    }
</script>
@endsection
