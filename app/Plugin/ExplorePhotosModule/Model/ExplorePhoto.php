<?php

class ExplorePhoto extends AppModel {

    public function searchByTag($photoTag = null)
    {
        if ($photoTag) {
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );

            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=dd576c6de02d40050b4705bd066bbcec&format=rest&tags=' . $photoTag;
            if ($response = file_get_contents($url, true, stream_context_create($arrContextOptions))) {
                return $response;
            }
        }
        return false;
    }

    public function getPhotoDetail($photoId = null){
        if($photoId){
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=dd576c6de02d40050b4705bd066bbcec&photo_id='.$photoId.'&format=rest';
            if ($response = file_get_contents($url, true, stream_context_create($arrContextOptions))) {
                return $response;
            }
        }
    }
}