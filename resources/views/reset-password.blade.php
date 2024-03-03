@extends('master')
@section('title', 'Redefinir senha')
@section('content')
@php
    $token = request()->route()->parameter('token');
@endphp
<h4 class="text-center text-gray-700 mb-8 mt-4">Olá, insira abaixo sua nova senha</h4>
@if(isset($tenantVerify)) <form action="{{route('changePasswordTenant')}}" method="post" id="formResetPassword">
@else <form action="{{route('changePassword')}}" method="post" id="formResetPassword">
@endif
    @csrf
    <input type="hidden" name="token" value="{{$token}}">
    <div class="mb-6">
        <label for="newPassword" class="block text-gray-700 text-left text-sm font-bold mb-4">Nova senha</label>
        <input type="password" name="newPassword" class="validate shadow appearance-none border rounded w-full
        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="newPassword">
    </div>
    <div class="mb-4">
        <label for="repeatNewPassword" class="block text-gray-700 text-left text-sm font-bold mb-4">
            Repita sua senha
        </label>
        <input type="password" name="repeatNewPassword" class="validate shadow appearance-none border rounded w-full
        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="repeatNewPassword">
    </div>
    <div class="text-center">
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded
        focus:outline-none focus:shadow-outline">
            Redefinir senha
        </button>
    </div>
</form>
@endsection
@section('scripts')
<script src="{{ url('js/site/validate/resetPassword.js') }}"></script>
@endsection
