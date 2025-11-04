<?php

namespace App\Services;

use App\Models\Genre;
use App\Models\Manga;
use Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\UserException;

class GenreService {
    public function getListGenres() {
        try {
            $liste = Genre::all();

            return $liste;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function getUnGenre($id) {
        try {
            $genre = Genre::query()
                ->find($id);

            return $genre;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
}
