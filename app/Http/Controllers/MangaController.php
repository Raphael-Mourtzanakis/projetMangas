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
            $genre = "";
            return view('listMangas', compact('mangas','genre'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function listMangasParGenre() {
        try {
            $service = new GenreService();
            $genres = $service->getListGenres();
            return view('formListGenres', compact('genres'));
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

    public function validManga(Request $request) {
        try {
            $id = $request->input("id");

            $service = new MangaService();
            if ($id) {
                $manga = $service->getUnManga($id);
            } else {
                $manga = new Manga();
            }

            $manga->titre = $request->input("titre");
            $manga->id_genre = $request->input("genre");
            $manga->id_dessinateur = $request->input("dessinateur");
            $manga->id_scenariste = $request->input("scenariste");
            $manga->prix = $request->input("prix");

            $couverture = $request->file("couverture");
            if ($couverture) {
                $manga->couverture = $couverture->getClientOriginalName();
                $couverture->move(public_path() . '\assets\images', $manga->couverture);
            }
            $service->saveManga($manga);
            return redirect("/listerMangas");
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function listMangasParLeGenre(Request $request) {
        try {
            $id_genre =  $request->input("genre");

            $service = new MangaService();
            $mangas = $service->getListMangasParGenre($id_genre);
            $service = new GenreService();
            $genre = $service->getUnGenre($id_genre);
            $genres = $service->getListGenres();

            return view('listMangas', compact('mangas','genre','genres'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function editManga($id) {
        try {
            $service = new MangaService();
            $genresService = new GenreService();
            $dessinateursService = new DessinateurService();
            $scenaristesService = new ScenaristeService();
            $genres = $genresService->getListGenres();
            $dessinateurs = $dessinateursService->getListDessinateurs();
            $scenaristes = $scenaristesService->getListScenaristes();
            $manga = $service->getUnManga($id);
            return view('formManga', compact('manga', 'genres', 'dessinateurs', 'scenaristes'));
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function removeManga($id) {
        try {
            $service = new MangaService();
            $service->deleteManga($id);
            return redirect("/listerMangas");
        } catch (Exception $exception) {
            return view('error', compact('exception'));
        }
    }
}
