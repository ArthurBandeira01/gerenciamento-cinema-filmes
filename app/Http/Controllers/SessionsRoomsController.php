<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionRoom;
use App\Services\SessionRoomService;
use App\Http\Requests\SessionRoomRequest;
use App\Http\Resources\SessionRoomResource;

class SessionsRoomsController extends Controller
{
    protected $sessionRoomService;

    public function __construct(SessionRoomService $sessionRoomService)
    {
        $this->sessionRoomService = $sessionRoomService;
    }

    public function index()
    {
        $rooms = $this->sessionRoomService->getAllSessionRooms();

        return view('admin.rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        $data = [];

        return view('admin.rooms.create', compact('data'));
    }

    public function store(RoomRequest $request)
    {
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
        $room = $this->roomService->getRoomById($id);

        return view('admin.rooms.edit', ['room' => $room]);
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
