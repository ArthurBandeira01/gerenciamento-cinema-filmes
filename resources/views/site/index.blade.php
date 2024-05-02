@extends('master')
@section('title', 'Home')
@section('content')
    <div class="main-content d-flex justify-center align-center mt-8">
        <h2 class="text-xl text-black">Seja bem-vindo à <b>Jet</b>movie <i class="far fa-smile-beam"></i></h2>
        <p class="mt-8 text-black">Sinta-se à vontade e escolha sua sessão</p>
        @foreach ($rooms as $room)
            <h2>{{$room->name}}</h2>
            <div class="flex items-center sessoes">
                <img class="img-cartaz" src="img/movies/kung-fu-panda-4" alt="">
                <span>01/05/24 19:00</span>
                <p>Nome do filme</p>
            </div>
        @endforeach
    </div>
@endsection
