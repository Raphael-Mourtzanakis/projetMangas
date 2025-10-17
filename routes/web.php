<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listerMangas', [MangaController::class, 'listMangas'])
    ->name('listMangas');

Route::get('/ajouterManga', [MangaController::class, 'addManga'])
    ->name('addManga');

Route::post('/validerManga', [MangaController::class, 'validManga'])
    ->name('validManga');

Route::get('/modifierManga/{id}', [MangaController::class, 'editManga'])
    ->name('editManga');

Route::get('/supprimerManga/{id}', [MangaController::class, 'removeManga'])
    ->name('removeManga');
