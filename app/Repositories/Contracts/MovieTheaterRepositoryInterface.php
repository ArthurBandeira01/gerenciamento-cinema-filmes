<?php

namespace App\Repositories\Contracts;

interface MovieTheaterRepositoryInterface
{
    public function getAllMovieTheaters();
    public function getMovieTheaterById($id);
    public function createMovieTheater(array $movieTheater);
    public function updateMovieTheater(int $id, array $movieTheater);
    public function destroyMovieTheater(int $id);
}
