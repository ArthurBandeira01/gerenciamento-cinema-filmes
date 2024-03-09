@extends('admin.master')
@section('title', 'Adicionar Cinema')
@section('content')
<a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white
    font-bold py-2 px-4 mb-8 mt-5 rounded">
    <i class="fas fa-chevron-circle-left"></i> Voltar
</a>
<h2 class="text-2xl text-center"><i class="fas fa-user"></i> Adicionar Sala</h2>
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
    <form action="{{ route('roomStore') }}" method="post" id="roomForm">
        @csrf
        <div class="mb-4">
            <label for="room" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Nome/número da Sala
            </label>
            <input type="text" id="room" name="room"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="numberSeats" class="block text-gray-700 text-sm font-bold mb-2 text-left">
                Número de assentos
            </label>
            <input type="number" id="numberSeats" name="numberSeats"
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
    <script src="{{ url('js/admin/validate/roomValidate.js') }}"></script>
@endsection
