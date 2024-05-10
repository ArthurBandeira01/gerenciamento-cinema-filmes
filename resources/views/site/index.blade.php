@extends('site.master')
@section('title', 'Home')
@section('content')
    <div class="mt-4">
        <h2 class="text-xl text-white text-center">Seja bem-vindo à <b>Jet</b>movie <i class="far fa-smile-beam"></i></h2>
        <p class="mt-4 text-white text-center">Sinta-se à vontade e escolha sua sessão</p>
        <div class="flex flex-col mt-4 mb-2">
            @foreach ($rooms as $room)
                <h2 class="text-white text-left mt-4">Sala {{$room->name}}</h2>
                <div class="flex swiper swiper-movies">
                    <div class="swiper-wrapper">
                        @foreach ($room->sessions as $session)
                            <div class="mt-2 mr-4 swiper-slide">
                                <div class="bg-slate-900 rounded">
                                    <div class="img-cartaz-box">
                                        <img class="img-cartaz rounded" src="img/movies/{{$session->movieImage}}" alt="">
                                    </div>
                                    <div class="text-center mt-4">
                                        <span class="text-white">
                                            {{ FunctionsHelper::formatDateSqlToBr($session->sessionDate) }} -
                                            {{ FunctionsHelper::timeToBrazil($session->sessionTime) }}
                                        </span>
                                    </div>
                                    <div class="text-center mt-4">
                                        <a href="{{ route('movie', ['movie' => $session->id]) }}" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded">
                                            <i class="fas fa-ticket-alt"></i> Comprar ingresso
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <hr class="border border-red-600 mt-2 mb-6"></hr>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-movies', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        }
      });
</script>
@endsection
