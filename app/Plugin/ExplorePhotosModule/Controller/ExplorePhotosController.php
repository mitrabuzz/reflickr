<?php

class ExplorePhotosController extends AppController{

    public function explore(){

        if(isset($this->request->named['photoTag']) || isset($this->request->query['photoTag'])){
            $photoTag = isset($this->request->named['photoTag']) ? $this->request->named['photoTag'] : $this->request->query['photoTag'];
            $page = 1;
            if(isset($this->request->named['page'])){
                $page = $this->request->named['page'];
            }
            $results = $this->ExplorePhoto->searchByTag($photoTag, $page);
            $this->set(array('results' => $results, 'photoTag' => $photoTag, 'page' => $page));

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