<?php

namespace App\Services;

use App\Services\Helpers\SpotifyHelper;
use Exception;

class SpotifyService
{    
    private $spotifyHelper;

    public function __construct(SpotifyHelper $spotifyHelper)
    {
        $this->spotifyHelper = $spotifyHelper;
    }

    /**
     * param string $artist_name
     * param string $token 
     */
    public function processApiResponse($artist_name, $token){
        try {
            //GET ARTIST_ID
            $artist_id = $this->spotifyHelper->getArtistId($artist_name, $token, 'artist');
            //GET ARTIST_DISCOGRAPHY 
            $discography = $this->spotifyHelper->getApiEndpoint($artist_id, $token);

            $processedResponse = $this->spotifyHelper->processAlbum($discography);
            
            return $processedResponse;
            
        } catch (\Exception $e) {
            throw new Exception(sprintf("ERROR: '%s'", $e->getMessage()));
        }
    }

}