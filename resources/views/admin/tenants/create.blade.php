@extends('admin.master')
@section('title', 'Adicionar Cinema')
@section('content')
<a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-8 mt-5 rounded">
    <i class="fas fa-chevron-circle-left"></i> Voltar
</a>
<h2 class="text-2xl text-center"><i class="fas fa-user"></i> Adicionar Cinema</h2>
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
    <form action="{{ route('tenantStore') }}" method="post" id="tenantForm">
        @csrf
        <div class="mb-4">
            <label for="tenant" class="block text-gray-700 text-sm font-bold mb-2 text-left">Nome do cinema</label>
            <input type="text" id="tenant" name="tenant" placeholder="Insira o nome..." class="validate border rounded-lg px-3 py-2 w-full focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline">
                Adicionar cinema
            </button>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/validate/tenantValidate.js') }}"></script>
@endsection
