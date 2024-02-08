<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieTheater;
use App\Services\MovieTheaterService;
use App\Http\Requests\MovieTheaterRequest;
use App\Http\Resources\MovieTheaterResource;

class MovieTheaterController extends Controller
{
    protected $movieTheaterService;

    public function __construct(MovieTheaterService $movieTheaterService)
    {
        $this->movieTheaterService = $movieTheaterService;
    }

    public function index()
    {
        return view('admin.movieTheaters.index');
    }

    public function create()
    {
        $data = [];

        return view('admin.movieTheaters.create', compact('data'));
    }

    public function store(MovieTheaterRequest $request)
    {
        $movieTheater = $this->movieTheaterService->makeMovieTheater($request->all());

        return redirect()->route('movieTheater.index')->with('success', 'Cinema cadastrado com sucesso!');
    }

    public function show($id)
    {
        $movieTheater = $this->movieTheaterService->getMovieTheaterById($id);

        $data = [];

        return view('admin.movieTheaters.show', compact('data'));
    }

    public function update(MovieTheaterRequest $request, $id)
    {
        $movieTheater = $this->movieTheaterService->updateMovieTheater($id, $request->all());

        return redirect()->route('movieTheater.index')->with('success', 'Cinema atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $movieTheater = $this->movieTheaterService->destroyMovieTheater($id);

        return redirect()->route('movieTheater.index')->with('success', 'Cinema excluído com sucesso!');
    }
}
