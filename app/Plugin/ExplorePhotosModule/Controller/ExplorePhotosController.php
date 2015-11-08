<?php

class ExplorePhotosController extends AppController{

    public function explore(){
        if(isset($this->request->query['photoTag'])){
            $photoTag = $this->request->query['photoTag'];
            $results = $this->ExplorePhoto->searchByTag($photoTag);
            $this->set(array('results' => $results, 'photoTag' => $photoTag));

        }
    }

    public function view(){
        if(!isset($this->request->named['id'])){
            throw new Exception('Id must be provided.');
        }

        if($this->request->referer()){
            $this->set(array('referrer' => $this->request->referer()));
        }

        $photoId = $this->request->named['id'];
        $photoDetail = $this->ExplorePhoto->getPhotoDetail($photoId);
        $this->set(array('photoDetail' => $photoDetail));
    }

}