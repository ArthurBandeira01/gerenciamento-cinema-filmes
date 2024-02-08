@extends('master')
@section('title', 'Login')
@section('content')
    <h4 class="text-center text-gray-700 mb-8 mt-4">Realize seu login para acessar a área administrativa:</h4>
    <form action="{{route("login")}}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-left text-sm font-bold mb-2"><i class="fas fa-envelope"></i> E-mail</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-solid border-2 border-sky-300" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-left text-sm font-bold mb-2"><i class="fas fa-lock"></i> Senha</label>
            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline border-solid border-2 border-sky-300" required>
        </div>
        <div class="flex flex-col items-center justify-between md:flex-row">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Entrar</button>
            <a href="{{route('rememberPassword')}}" class="text-sm text-gray-700 hover:underline password-mobile">Esqueceu a senha?</a>
        </div>
    </form>
@endsection
