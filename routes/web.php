<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/album',['\App\Http\Controllers\SpotifyController','getAlbums']);