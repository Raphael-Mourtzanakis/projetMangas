<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listerMangas', [MangaController::class, 'listMangas'])
    ->name('listMangas');

Route::get('/listerMangasParGenre', [MangaController::class, 'listMangasParGenre'])
    ->name('listMangasParGenre');
Route::post('/listerMangasParLeGenre', [MangaController::class, 'listMangasParLeGenre'])
    ->name('listMangasParLeGenre');

Route::get('/ajouterManga', [MangaController::class, 'addManga'])
    ->name('addManga');

Route::post('/validerManga', [MangaController::class, 'validManga'])
    ->name('validManga');

Route::post('/validerListMangaParGenre', [MangaController::class, 'validListMangaParGenre'])
    ->name('validListMangaParGenre');

Route::get('/modifierManga/{id}', [MangaController::class, 'editManga'])
    ->name('editManga');

Route::get('/supprimerManga/{id}', [MangaController::class, 'removeManga'])
    ->name('removeManga');
