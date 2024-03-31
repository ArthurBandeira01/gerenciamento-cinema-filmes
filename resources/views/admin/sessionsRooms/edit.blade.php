@extends('admin.master')
@section('title', 'Editar Sessão')
@section('content')
<a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white
    font-bold py-2 px-4 mb-8 mt-5 rounded">
    <i class="fas fa-chevron-circle-left"></i> Voltar
</a>
<h2 class="text-2xl text-center"><i class="fas fa-user"></i> Editar Sessão</h2>
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
    <form action="{{ route('sessionRoomUpdate', ['sessionRoom' => $data['sessionRoom']->id]) }}"
        method="post" id="sessionRoomForm">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="room" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Escolha a sala
            </label>
            <div class="relative">
                <select name="room" id="room" class="validate block appearance-none w-full bg-white border
                border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg leading-tight focus:outline-none
                 focus:border-blue-500">
                    @foreach ($data['rooms'] as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9 11l5-5-5-5v10zm-3 5h12v-2H6V4H4v14z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="movie" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Nome do filme
            </label>
            <input type="text" id="movie" value="{{$sessionRoom->movie}}" name="movie"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="numberSeats" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Número de assentos
            </label>
            <input type="number" id="numberSeats" value="{{$sessionRoom->numberSeats}}" name="numberSeats"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="priceTicket" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Valor do ingresso (R$)
            </label>
            <input type="text" id="priceTicket" value="{{$sessionRoom->priceTicket}}" name="priceTicket"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="sessionDate" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Data
            </label>
            <input type="text" value="{{$sessionRoom->sessionDate}}" id="sessionDate" name="sessionDate"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="sessionTime" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Hora
            </label>
            <input type="text" value="{{$sessionRoom->sessionTime}}" id="sessionTime" name="sessionTime"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
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
                Editar Sessão
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script src="{{ url('js/admin/validate/sessionRoomValidate.js') }}"></script>
@endsection
