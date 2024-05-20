@extends('site.master')
@section('title', $sessionRoom->movie)
@section('content')
    <div class="flex items-center justify-center mt-8">
        <a href="{{ route('index') }}" class="bg-red-700 text-white
            font-bold py-2 px-2 rounded text-center">
            <i class="fas fa-chevron-circle-left"></i> Voltar
        </a>
    </div>
    <div class="flex flex-col md:flex-row movie-box mt-8">
        <div class="img-cartaz-box">
            <img class="img-movie rounded" src="../img/movies/{{$sessionRoom->movieImage}}"
                alt="{{$sessionRoom->movie}}" title="{{$sessionRoom->movie}}">
        </div>
        <div class="description-movie ml-6">
            <h2 class="text-xl text-white title-movie">Filme: {{$sessionRoom->movie}}</h2>
            <p class="mt-4 mb-4 text-white">Sinopse: {{$sessionRoom->description}}</p>
            <span class="italic"><i class="fas fa-calendar-alt"></i> Horário:
                {{ FunctionsHelper::formatDateSqlToBr($sessionRoom->sessionDate) }}
                {{ FunctionsHelper::timeToBrazil($sessionRoom->sessionTime) }}
            </span><br><br>
            <span class="mt-4">Ingresso(R$): {{FunctionsHelper::formatDecimalSqlToCurrencyBr($sessionRoom->priceTicket)}}</span>
        </div>
    </div>
    <div class="mt-4 mb-2">
        <h2 class="text-xl text-white text-center">Selecione seu assento:</h2>
        <div class="mt-6">
            @for ($numberSeat = 1; $numberSeat <= $room->seats; $numberSeat++)
                @if ($numberSeat % 10 == 1)
                    <div class="flex items-center justify-center flex-wrap">
                @endif

                {!! SessionClientHelper::verifySeat($sessionRoom->id, $numberSeat) !!}

                @if ($numberSeat % 10 == 0 || $numberSeat == $room->seats)
                    </div>
                @endif
            @endfor
        </div>
    </div>

    <div class="flex items-center justify-center mt-8">
        <button type="submit" class="btn text-white hover:text-red-700 font-bold
            mt-8 py-2 px-2 rounded text-center" onclick="cancelSeat({{ $sessionRoom->id }})">
           Cancelar reserva
        </button>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
    function cancelSeat(id) {
        Swal.fire({
            title: 'Cancelamento de reserva',
            text: 'Insira o CPF e o número do assento abaixo para cancelar sua reserva',
            html: `
                <form id="cancelReserve" method="POST" action="{{ $cancelUrl }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="sessionRoomId" value="{{$sessionRoom->id}}">
                    <input id="number-seat" name="numberSeat" class="swal2-input mb-6" placeholder="Número do assento" required>
                    <input id="cpf-input" name="cpf" class="swal2-input mb-6" placeholder="Digite seu CPF" required>
                </form>`,
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'Cancelar Assento',
            cancelButtonText: 'Voltar',
            preConfirm: () => {
                const cpf = document.getElementById('cpf-input').value;

                if (!isValidCPF(cpf)) {
                    Swal.showValidationMessage('Por favor, digite um CPF válido.');     j
                    return false;
                }

                document.getElementById('cancelReserve').submit();
            }

        });

        $('#cpf-input').mask('000.000.000-00');
    }

    function unavailable() {
        Swal.fire({
            title: 'Assento indisponível',
            text: 'Este assento já foi selecionado.',
            icon: 'error',
            showCancelButton: false,
            showCloseButton: true,
            confirmButtonText: 'Voltar'
        });
    }

    function available(id, numberSeat) {
        Swal.fire({
            title: 'Reserve seu assento',
            html: `
                <form id="reserveForm" method="POST" action="{{ $movieUrl }}">
                    @csrf
                    <input type="hidden" name="sessionRoomId" value="{{$sessionRoom->id}}">
                    <input type="hidden" name="numberSeat" value="${numberSeat}">
                    <input id="cpf-input" name="cpf" class="swal2-input mb-6" placeholder="Digite seu CPF" required>
                </form>`,
            showCancelButton: true,
            showCloseButton: true,
            confirmButtonText: 'Reservar Assento',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const cpf = document.getElementById('cpf-input').value;

                if (!isValidCPF(cpf)) {
                    Swal.showValidationMessage('Por favor, digite um CPF válido.');
                    return false;
                }

                document.getElementById('reserveForm').submit();
            }
        });

        $('#cpf-input').mask('000.000.000-00');
    }

    //Valida CPF:
    function isValidCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g,'');

        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
            return false;
        }

        let soma = 0;
        let resto;

        for (let i = 1; i <= 9; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        }

        resto = (soma * 10) % 11;

        if (resto === 10 || resto === 11) {
            resto = 0;
        }

        if (resto !== parseInt(cpf.substring(9, 10))) {
            return false;
        }

        soma = 0;

        for (let i = 1; i <= 10; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }

        resto = (soma * 10) % 11;

        if (resto === 10 || resto === 11) {
            resto = 0;
        }

        if (resto !== parseInt(cpf.substring(10, 11))) {
            return false;
        }
        return true;
    }
</script>
@endsection
