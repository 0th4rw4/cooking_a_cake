<?php
class PostsController extends AppController {
    public function index(){
        $magia = $this->Post->find('all');
        //return $this->automagia($magia);
        //$this->debug($magia);
    }
    public function find(){
        $magia = $this->Post->find('all');
        return $this->automagia($magia); 
    }
    public function read($id){
        $magia = $this->Post->findById($id);
        return $this->automagia($magia);
    }
    public function create(){
        
    }
    public function update($id){
        
    }
    public function delete($id){
        
    }

}