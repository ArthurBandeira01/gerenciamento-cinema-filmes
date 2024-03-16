<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomService;
use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;

class RoomsController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $rooms = $this->roomService->getAllRooms();

        return view('admin.rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        $data = [];

        return view('admin.rooms.create', compact('data'));
    }

    public function store(RoomRequest $request)
    {
        return redirect()->route('room.index')->with('success', 'Sala cadastrada com sucesso!');
    }

    public function show($id)
    {
        $room = $this->roomService->getRoomById($id);

        $data = [];

        return view('admin.rooms.show', compact('data'));
    }

    public function update(RoomRequest $request, $id)
    {
        $room = $this->roomService->updateRoom($id, $request->all());

        return redirect()->route('room.index')->with('success', 'Sala atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $room = $this->roomService->destroyRoom($id);

        return redirect()->route('room.index')->with('success', 'Sala excluída com sucesso!');
    }
}
