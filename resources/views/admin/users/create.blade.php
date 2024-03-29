@extends('admin.master')
@section('title', 'Criar Usuário')
@section('content')
<a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white
    font-bold py-2 px-4 mb-8 mt-5 rounded">
    <i class="fas fa-chevron-circle-left"></i> Voltar
</a>
<h2 class="text-2xl text-center"><i class="fas fa-user"></i> Criar usuário</h2>
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
    <form method="post" id="userForm"
    @if(isset($tenantVerify)) action="{{ route('usersTenantStore') }}">
    @else action="{{ route('usersStore') }}">
    @endif
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 text-left">Nome</label>
            <input type="text" id="name" name="name" placeholder="Seu nome" class="validate border rounded-lg px-3
            py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-left">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Seu e-mail" class="validate border rounded-lg px-3
            py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-left">Senha</label>
            <input type="password" id="password" name="password" placeholder="Sua senha"
            class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded
            focus:outline-none focus:shadow-outline">
                Cadastrar Usuário
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script src="{{ url('js/admin/validate/userValidate.js') }}"></script>
@endsection
