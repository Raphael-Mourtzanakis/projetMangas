<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listerMangas', [MangaController::class, 'listMangas'])
    ->name('listMangas');
