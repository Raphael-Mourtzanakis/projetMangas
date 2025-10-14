<?php

namespace App\Http\Controllers;

use App\Services\MangaService;
use App\Services\GenreService;
use App\Services\DessinateurService;
use App\Services\ScenaristeService;
use App\Models\Manga;
use Exception;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function listMangas() {
        try {
            $service = new MangaService();
            $mangas = $service->getListMangas();
            foreach ($mangas as $manga) {
                if (!file_exists('assets\\images\\' . $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }
            return view('listMangas', compact('mangas'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function addManga() {
        try {
            $manga =  new Manga();
            $genresService = new GenreService();
            $dessinateursService = new DessinateurService();
            $scenaristesService = new ScenaristeService();
            $genres = $genresService->getListGenres();
            $dessinateurs = $dessinateursService->getListDessinateurs();
            $scenaristes = $scenaristesService->getListScenaristes();
            return view('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
}
