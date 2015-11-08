<?php

class ExplorePhoto extends AppModel {

    public function searchByTag($photoTag = null, $page = null)
    {
        if ($photoTag) {
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );

            if(!$page){
                $page = 1;
            }

            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search&per_page=50&page='.$page.'&api_key='.Configure::read('REFLICKR_APP_KEY').'&format=rest&tags=' . $photoTag;
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
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.getInfo&api_key='.Configure::read('REFLICKR_APP_KEY').'&photo_id='.$photoId.'&format=rest';
            if ($response = file_get_contents($url, true, stream_context_create($arrContextOptions))) {
                return $response;
            }
        }
    }
}