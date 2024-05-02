<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Services\SessionRoomService;
use App\Services\SessionClientService;
use Stancl\Tenancy\Database\Models\Tenant;
use App\Models\Tenant as TenantModel;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    protected $tenantModel;
    protected $sessionClientService;
    protected $sessionRoomService;
    protected $roomService;

    public function __construct
    (
        TenantModel $tenantModel,
        RoomService $roomService,
        SessionClientService $sessionClientService,
        SessionRoomService $sessionRoomService
    ) {
        $this->tenantModel = $tenantModel;
        $this->sessionRoomService = $sessionRoomService;
        $this->roomService = $roomService;
        $this->sessionClientService = $sessionClientService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms();
        $sessionsRooms = $this->sessionRoomService->getAllSessionRooms();

        return view('site.index', ['rooms' => $rooms, 'sessionsRooms' => $sessionsRooms]);
    }
}
