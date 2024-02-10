@extends('master')
@section('title', 'Home')
@section('content')
@dd(isset($tenantVerify))
    <div class="main-content d-flex justify-center align-center">
        <h2 class="text-2xl">Seja bem-vindo à <b>Jet</b>movie <i class="far fa-smile-beam"></i></h2>
    </div>
@endsection
