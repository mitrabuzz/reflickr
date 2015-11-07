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

            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=a6ec5adbeb6b9816167c1ce00ec79688&format=rest&tags=' . $photoTag;
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
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key=fc5ae916020116246a7aab52877eaf50&photo_id='.$photoId.'&format=rest';
            if ($response = file_get_contents($url, true, stream_context_create($arrContextOptions))) {
                return $response;
            }
        }
    }
}