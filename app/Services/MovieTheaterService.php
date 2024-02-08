<?php

namespace App\Services;

use App\Repositories\Contracts\MovieTheaterRepositoryInterface;
use Illuminate\Support\Str;

class MovieTheaterService
{
    protected $movieTheaterRepository;

    public function __construct(MovieTheaterRepositoryInterface $movieTheaterRepository)
    {
        $this->movieTheaterRepository = $movieTheaterRepository;
    }

    public function getAllMovieTheaters(): array
    {
        return $this->movieTheaterRepository->getAllMovieTheaters();
    }

    public function getMovieTheaterById(int $id): object
    {
        return $this->movieTheaterRepository->getMovieTheaterById($id);
    }

    public function makeMovieTheater(array $movieTheater): object
    {
        $movieTheater['url'] = Str::kebab($movieTheater['name']);
        $movieTheater['uuid'] = Str::uuid();

        return $this->movieTheaterRepository->createMovieTheater($movieTheater);
    }

    public function updateMovieTheater(int $id, array $movieTheater)
    {
        $movieTheater = $this->movieTheaterRepository->getMovieTheaterById($id);

        if (!$movieTheater) {
            return response()->json(['message' => 'MovieTheater Not Found'], 404);
        }

        if ($movieTheater['name']) {
            $movieTheater['url'] = Str::kebab($movieTheater['name']);
        }
        $this->movieTheaterRepository->updateMovieTheater($movieTheater, $movieTheater);
        return response()->json(['message' => 'MovieTheater Updated'], 200);
    }

    public function destroyMovieTheater(int $id)
    {
        $movieTheater = $this->movieTheaterRepository->getMovieTheaterById($id);

        if (!$movieTheater) {
            return response()->json(['message' => 'MovieTheater Not Found'], 404);
        }
        $this->movieTheaterRepository->destroyMovieTheater($movieTheater);

        return response()->json(['message' => 'MovieTheater Deleted'], 200);
    }
}
