<?php

namespace App\Http\Controllers;

use App\Services\Helpers\SpotifyHelper;
use App\Services\SpotifyService;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    protected $spotifyService;
    protected $spotifyHelper;

    public function __construct(SpotifyService $spotifyService, SpotifyHelper $spotifyHelper)
    {
        $this->spotifyService   = $spotifyService;
        $this->spotifyHelper    = $spotifyHelper;
    }

    public function getAlbums(Request $request)
    {
        $token = $this->spotifyHelper->getToken()->access_token;
        $dicography = $this->spotifyService->processApiResponse($request->artista, $token);
        return view('layout/discography',[
            'discography' => $dicography
        ]);
    }
    
}
