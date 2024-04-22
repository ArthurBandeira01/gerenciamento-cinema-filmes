@extends('admin.master')
@section('title', 'Adicionar Sessão')
@section('content')
<a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white
    font-bold py-2 px-4 mb-8 mt-5 rounded">
    <i class="fas fa-chevron-circle-left"></i> Voltar
</a>
<h2 class="text-2xl text-center"><i class="fas fa-user"></i> Adicionar Sessão</h2>
<div class="main-content mt-5">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('sessionRoomStore') }}" method="post" id="sessionRoomForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="roomId" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Escolha a sala
            </label>
            <div class="relative">
                <select name="roomId" id="roomId" class="validate block appearance-none w-full bg-white border
                border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg leading-tight focus:outline-none
                    focus:border-blue-500">
                    @foreach ($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}} - {{$room->seats}} assentos</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute bottom-3 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-sort-down"></i>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Status
            </label>
            <div class="relative">
                <select name="status" id="status" class="block appearance-none w-full bg-white border
                border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg leading-tight focus:outline-none
                    focus:border-blue-500">
                    <option value="Ativo" selected>Sessão Ativa</option>
                    <option value="Desativo">Sessão Desativada</option>
                </select>
                <div class="pointer-events-none absolute bottom-3 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-sort-down"></i>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="movie" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Nome do filme
            </label>
            <input type="text" id="movie" name="movie"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="priceTicket" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Valor do ingresso (R$)
            </label>
            <input type="text" id="priceTicket" name="priceTicket" class="validate border rounded-lg px-3 py-2 w-full
            focus:outline-none focus:border-blue-500 money">
        </div>
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2">
            <div class="mr-2 mb-2">
                <label for="sessionDate" class="block text-gray-700 text-sm font-bold mb-2 text-left">Data</label>
                <input type="text" id="sessionDate" name="sessionDate"
                class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500 data">
            </div>
            <div class="mb-2">
                <label for="sessionTime" class="block text-gray-700 text-sm font-bold mb-2 text-left">Hora</label>
                <input type="text" id="sessionTime" name="sessionTime"
                class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500 horario">
            </div>
        </div>
        <div class="mb-4">
            <label for="movieImage" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Imagem do filme
            </label>
            <input type="file" id="movieImage" name="movieImage"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded
            focus:outline-none focus:shadow-outline">
                Adicionar sala
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script src="{{ url('js/admin/validate/sessionRoomValidate.js') }}"></script>
@endsection
