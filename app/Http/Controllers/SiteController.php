<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Services\SessionRoomService;
use App\Services\SessionClientService;
use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant as TenantModel;
use App\Helpers\FunctionsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
        $sessionsRooms = $this->sessionRoomService->getAllSessionRooms();

        return view('site.index', ['rooms' => $rooms, 'sessionsRooms' => $sessionsRooms]);
    }

    public function movie($movie)
    {
        $movieUrl = URL::route('selectMovie', ['movie' => $movie]);
        $sessionRoom = $this->sessionRoomService->getSessionRoomById($movie);
        $room = $this->roomService->getRoomById($sessionRoom->roomId);

        return view('site.movie', ['sessionRoom' => $sessionRoom, 'room' => $room, 'movieUrl' => $movieUrl]);
    }

    public function selectMovie(Request $request, $movie)
    {
        $inputs = $request->all();
        $cpf = FunctionsHelper::removeMaskCPF($inputs['cpf']);

        dd($cpf);
    }
}
