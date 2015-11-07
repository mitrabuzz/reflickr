<?php

class ExplorePhotosController extends AppController{

    public function explore(){
        if($_POST){
            $tag = $this->request->data['ExplorePhotos']['photoTag'];
            $results = $this->ExplorePhoto->searchByTag($tag);
            $this->set(array('results' => $results));

        }
    }

    public function view(){
        if(!isset($this->request->named['id'])){
            throw new Exception('Id must be provided.');
        }
        $photoId = $this->request->named['id'];
        $photoDetail = $this->ExplorePhoto->getPhotoDetail($photoId);
        $this->set(array('photoDetail' => $photoDetail));
    }

}