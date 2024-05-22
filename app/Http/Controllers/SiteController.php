<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionClientRequest;
use App\Services\RoomService;
use App\Services\SessionRoomService;
use App\Services\SessionClientService;
use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant as TenantModel;
use App\Models\SessionClient;
use App\Helpers\FunctionsHelper;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
    protected $tenantModel;
    protected $roomService;
    protected $sessionClientService;
    protected $sessionRoomService;

    public function __construct
    (
        TenantModel $tenantModel,
        RoomService $roomService,
        SessionRoomService $sessionRoomService,
        SessionClientService $sessionClientService
    ) {
        $this->tenantModel = $tenantModel;
        $this->roomService = $roomService;
        $this->sessionRoomService = $sessionRoomService;
        $this->sessionClientService = $sessionClientService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms();
        $sessionsRooms = $this->sessionRoomService->verifyStatusSession();

        return view('site.index', ['rooms' => $rooms, 'sessionsRooms' => $sessionsRooms]);
    }

    public function movie($movie)
    {
        $movieUrl = URL::route('selectMovie', ['movie' => $movie]);
        $cancelUrl = URL::route('cancelSeat', ['movie' => $movie]);
        $sessionRoom = $this->sessionRoomService->getSessionRoomById($movie);
        $room = $this->roomService->getRoomById($sessionRoom->roomId);

        return view('site.movie', ['sessionRoom' => $sessionRoom, 'room' => $room, 'movieUrl' => $movieUrl, 'cancelUrl' => $cancelUrl]);
    }

    public function selectMovie(SessionClientRequest $request, $movie)
    {
        $inputs = $request->all();
        $inputs['cpf'] = FunctionsHelper::removeMaskCPF($inputs['cpf']);
        $verifySameCpf = SessionClient::where('sessionRoomId', $movie)->where('cpf', $inputs['cpf'])->first();
        if (!$verifySameCpf) {
            $this->sessionRoomService->removeSeatSessionRoom($movie);
            $this->sessionClientService->makeSessionClient($inputs);
            Alert::success('Sucesso', 'Assento reservado com sucesso!');

            return redirect()->route('movie', ['movie' => $movie]);
        } else {
            Alert::error('Ops', 'O CPF já possui assento reservado. Cancele sua reserva abaixo ou insira um novo CPF.');

            return redirect()->route('movie', ['movie' => $movie]);
        }
    }

    public function cancelSeat(SessionClientRequest $request, $movie)
    {
        $inputs = $request->all();
        $inputs['cpf'] = FunctionsHelper::removeMaskCPF($inputs['cpf']);
        $client = $this->sessionClientService->verifySeat($inputs['cpf'], $inputs['numberSeat'],  $movie);

        if ($client) {
            $this->sessionRoomService->addSeatSessionRoom($movie);
            $this->sessionClientService->destroySessionClient($client->id);
            Alert::success('Sucesso', 'Assento cancelado.');

            return redirect()->route('movie', ['movie' => $movie]);
        } else {
            Alert::error('Ops', 'Verifique se o CPF e/ou número do assento estão correto(s).');

            return redirect()->route('movie', ['movie' => $movie]);
        }
    }
}
