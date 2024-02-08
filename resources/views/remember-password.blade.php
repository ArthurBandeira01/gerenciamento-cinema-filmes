@extends('master')
@section('title', 'Esqueceu a senha')
@section('content')
    <h4 class="text-center text-gray-700 mb-8 mt-4"><i class="fas fa-envelope"></i> Insira abaixo seu e-mail:</h4>
    <form action="{{route('tokenRememberPassword')}}" method="post">
        @csrf
        <div class="mb-4">
            <input type="email" name="email" id="email" placeholder="Seu e-mail..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enviar e-mail</button>
        </div>
    </form>
@endsection
