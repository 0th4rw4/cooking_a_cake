<?php
class CommentsController extends AppController {
    public function find(){
        $this->autoRender = false; 
    }
    public function read($id){
        $this->autoRender = false; 
    }
    public function create(){
        $this->request->data['Comment']['mt_client_id'] = '30';
        $this->Comment->create();
        $response = $this->Comment->save($this->request->data) 
            ? ['Comment' => array( 
                'id' => $this->Comment->id ) ]
            : false;

        $response['statusCode'] = ($response != false)
            ? 200
            : 400;
        return $this->automagia( $response );
    }
    public function update($id){
        $this->autoRender = false; 
    }
    public function delete($id){

        $response = $this->Comment->delete($id) 
            ? ['Comment' => array( 
                'id' => $this->Comment->id ) ]
            : false;

        $response['statusCode'] = ($response != false)
            ? 200
            : 400;
        return $this->automagia( $response );
    }

}