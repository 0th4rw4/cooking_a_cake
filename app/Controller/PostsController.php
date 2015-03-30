<?php
class PostsController extends AppController {
    public function index(){
        $response = $this->Post->find('all');
    }
    public function find(){
        $response['statusCode'] = ( $response = $this->Post->find('all') )
            ? 200
            : 400;
        return $this->automagia( $response );
    }
    public function read($id){
        $response['statusCode'] = ( $response = $this->Post->findById($id) )
            ? 200
            : 400;
        return $this->automagia( $response );
    }
    public function create(){
        $this->autoRender = false; 
    }
    public function update($id){
        $this->autoRender = false; 
    }
    public function delete($id){
        $this->autoRender = false; 
    }

}