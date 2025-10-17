<?php

namespace App\Services;

use App\Models\Manga;
use Exception;
use Illuminate\Database\QueryException;
use App\Exceptions\UserException;

class MangaService {
    public function getListMangas() {
        try {
            $liste = Manga::query()
            ->select('manga.*', 'genre.lib_genre', 'dessinateur.nom_dessinateur', 'dessinateur.prenom_dessinateur', 'scenariste.nom_scenariste', 'scenariste.prenom_scenariste')
            ->join('genre', 'genre.id_genre', '=', 'manga.id_genre')
            ->join('dessinateur', 'dessinateur.id_dessinateur', '=', 'manga.id_dessinateur')
            ->join('scenariste', 'scenariste.id_scenariste', '=', 'manga.id_scenariste')
            ->get();

            return $liste;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function getUnManga($id) {
        try {
            $manga = Manga::query()
                ->find($id);

            return $manga;
        } catch (QueryException $exception) {
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function saveManga(Manga $manga) {
        try {
            $manga->save();
        } catch (QueryException $exception) {
            $userMessage = "Impossible de mettre à jour la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }

    public function deleteManga($id) {
        try {
             Manga::query()
                 ->find($id)
                 ->delete();
        } catch (QueryException $exception) {
            $userMessage = "Impossible de mettre à jour la base de données.";
            throw new UserException($userMessage, $exception->getMessage(), $exception->getCode());
        }
    }
}
