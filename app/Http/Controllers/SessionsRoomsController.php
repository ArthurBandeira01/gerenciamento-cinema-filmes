<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomService;
use App\Services\SessionRoomService;
use App\Http\Requests\SessionRoomRequest;
use App\Helpers\FunctionsHelper;
use App\Http\Resources\SessionRoomResource;
use Intervention\Image\ImageManagerStatic as Image;

class SessionsRoomsController extends Controller
{
    protected $sessionRoomService;
    protected $roomService;

    public function __construct(SessionRoomService $sessionRoomService, RoomService $roomService)
    {
        $this->sessionRoomService = $sessionRoomService;
        $this->roomService = $roomService;
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
        $validatedData = $request->validated();
        $sanitizeRequest = $this->sanitizeRequest($inputs, $request->file('movieImage'));

        // Verifica se não há sessão na mesma data/horário:
        $verifyRoomAvailable = $this->sessionRoomService->verifyRoomAvailable($sanitizeRequest['sessionDate'], $sanitizeRequest['sessionTime']);
        if (!$verifyRoomAvailable) {
            $room = $this->roomService->getRoomById($inputs['roomId']);
            $sanitizeRequest['numberSeats'] = $room->seats;
            if ($validatedData) {
                $this->sessionRoomService->makeSessionRoom($sanitizeRequest);
                return redirect()->route('sessionRoom')->with('success', 'Sessão da sala cadastrada com sucesso!');
            }
        } else {
            return redirect()->back()->with('error', 'Sala já possui uma sessão para essa data/hora.');
        }

        return redirect()->back()->withErrors($request->errors())->withInput();
    }

    public function edit($id)
    {
        $rooms = $this->roomService->getAllRooms();
        $sessionRoom = $this->sessionRoomService->getSessionRoomById($id);
        return view('admin.sessionsRooms.edit', ['rooms' => $rooms, 'sessionRoom' => $sessionRoom]);
    }

    public function update(SessionRoomRequest $request, $id)
    {
        $inputs = $request->all();
        $validatedData = $request->validated();
        if ($validatedData) {
            $sessionRoom = $this->sessionRoomService->getSessionRoomById($id);
            $sanitizeRequest = $this->sanitizeRequest($inputs, $sessionRoom->movieImage);
            $this->sessionRoomService->updateSessionRoom($id, $sanitizeRequest);

            return redirect()->route('sessionRoom')->with('success', 'Sessão da sala atualizada com sucesso!');
        }

        return redirect()->back()->withErrors($request->errors())->withInput();
    }

    public function destroy($id)
    {
        $this->sessionRoomService->destroySessionRoom($id);

        return redirect()->route('sessionRoom')->with('success', 'Sessão da sala excluída com sucesso!');
    }

    public function sanitizeRequest(array $inputs, $file): array
    {
        $inputs['sessionDate'] = FunctionsHelper::formatDateBrToSql($inputs['sessionDate']);
        $inputs['priceTicket'] = FunctionsHelper::formatDecimalBrToSql($inputs['priceTicket']);

        if (!is_string($file)) {
            $imagemRequest = $file;
            $pastaDestino = 'img/movies/';
            $nameFile = $imagemRequest->getClientOriginalName();
            $separaExtensao = explode('.', $nameFile);

            if ($separaExtensao[count($separaExtensao) - 1] !== 'webp') {
                unset($separaExtensao[count($separaExtensao) - 1]);
                array_push($separaExtensao, 'webp');
                $inputs['movieImage'] = implode('.', $separaExtensao);
            } else {
                $inputs['movieImage'] = $nameFile;
            }

            $novoNome = $pastaDestino . $inputs['movieImage'];
            $imagem = Image::make($file)->resize(184, 275);
            $imagem->save($novoNome);
        }

        if($inputs['status'] === 'Ativo'){
            $inputs['status'] = 1;
        }else{
            $inputs['status'] = 0;
        }

        return $inputs;
    }
}
