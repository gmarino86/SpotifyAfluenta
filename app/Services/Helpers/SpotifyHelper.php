<?php

namespace App\Services\Helpers;

use Illuminate\Support\Facades\Http;
use Exception;

class SpotifyHelper
{
    /**
     * getToken
     * This Function returns a Token.
     * @return json
     */
    public function getToken()
    {
        try {
            $response_token = Http::withBasicAuth(env('SPOTIFY_CLIENT_ID'), env('SPOTIFY_CLIENT_SECRET'))
                ->asForm()->post(
                    env('SPOTIFY_TOKEN_URL'),
                    [
                        'grant_type' => 'client_credentials'
                    ]
                );
            return json_decode($response_token);
        } catch (\Exception $e) {
            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }
    }

    /**
     * getArtistDiscography
     * @param  string $artist_name
     * @param  string $token
     * @return json $response
     */
    public function getApiEndpoint($artist_name, $token)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])
                ->get(env('SPOTIFY_ARTIST_ENDPOINT') . "/" . $artist_name . "/albums");

            return json_decode($response);
        } catch (\Exception $e) {
            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }
    }

    /**
     * getArtistId
     * @param $artist
     * @param $token
     * @param $type
     * @return string $artist_id
     */
    public function getArtistId($artist, $token, $type = 'artist')
    {

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])
        ->get('https://api.spotify.com/v1/search', [
            'query'    => $artist,
            'type'      => $type
        ]);
        $artist_id = json_decode($response)->artists->items[0]->id;
        return $artist_id;
    }

    /**
     * processAlbum
     * @param Object $albums 
     * @return Array $discography
     */
    public function processAlbum($albums)
    {
        $discography = array();
        foreach ($albums->items as $album) {
            $discography[] = array(
                "artist_name" => $album->artists[0]->name,
                "name" => $album->name,
                "released" => $album->release_date,
                "tracks" => $album->total_tracks,
                "cover" => (isset($album->images[0]) ? $album->images[0] : 'NULL')
            );
        }

        return $discography;
    }
}
