<?php

namespace App\Services;

use App\Models\Genre;
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
}
