<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionRoom;
use App\Services\RoomService;
use App\Services\SessionRoomService;
use App\Http\Requests\SessionRoomRequest;
use App\Http\Resources\SessionRoomResource;

class SessionsRoomsController extends Controller
{
    protected $sessionRoomService;
    protected $roomService;

    public function __construct(SessionRoomService $sessionRoomService, RoomService $roomService)
    {
        $this->roomService = $roomService;
        $this->sessionRoomService = $sessionRoomService;
    }

    public function index()
    {
        $sessionsRooms = $this->sessionRoomService->getAllSessionRooms();

        return view('admin.sessionsRooms.index', ['sessionsRooms' => $sessionsRooms]);
    }

    public function create()
    {
        $rooms = $this->roomService->getAllRooms();

        return view('admin.sessionsRooms.create', ['rooms' => $rooms]);
    }

    public function store(SessionRoomRequest $request)
    {
        $inputs = $request->all();
        dd($inputs);
        $validatedData = $request->validated();

        if ($validatedData) {
            $this->roomService->makeRoom($request->all());
            return redirect()->route('rooms')->with('success', 'Sala cadastrada com sucesso!');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $rooms = $this->roomService->getAllRooms();
        $sessionRoom = $this->sessionRoomService->getSessionRoomById($id);
        $data = [
            'rooms' => $rooms,
            'sessionRoom' => $sessionRoom,
        ];
        return view('admin.sessionsRooms.edit', ['data' => $data]);
    }

    public function update(RoomRequest $request, $id)
    {
        $this->roomService->updateRoom($id, $request->all());

        return redirect()->route('rooms')->with('success', 'Sala atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $this->roomService->destroyRoom($id);

        return redirect()->route('rooms')->with('success', 'Sala excluída com sucesso!');
    }
}
