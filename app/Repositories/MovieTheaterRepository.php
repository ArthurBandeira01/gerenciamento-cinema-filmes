<?php

namespace App\Repositories;

use App\Repositories\Contracts\MovieTheaterRepositoryInterface;
use App\Models\MovieTheater;


class MovieTheaterRepository implements MovieTheaterRepositoryInterface
{

    protected $entity;

    public function __construct(MovieTheater $movieTheater)
    {
        $this->entity = $movieTheater;
    }

    /**
     * Get all MovieTheaters
     * @return array
     */
    public function getAllMovieTheaters()
    {
        return $this->entity->paginate();
    }

    /**
     * Seleciona a Categoria por ID
     * @param int $id
     * @return object
     */
    public function getMovieTheaterById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria uma nova categoria
     * @param array $movieTheater
     * @return object
     */
    public function createMovieTheater(array $movieTheater)
    {
        return $this->entity->create($movieTheater);
    }

    /**
     * Atualiza os dados da categoria
     * @param object $movieTheater
     * @param array $categorie
     * @return object
     */
    public function updateMovieTheater(object $movieTheater, array $categorie)
    {
        return $movieTheater->update($categorie);
    }

    /**
     * Deleta uma categoria
     * @param object $movieTheater
     */
    public function destroyMovieTheater(object $movieTheater)
    {
        return $movieTheater->delete();
    }
}
