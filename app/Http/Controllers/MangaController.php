<?php

use App\Services\MangaService;
use Exception;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function listMangas()
    {
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
}
