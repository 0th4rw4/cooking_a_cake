<?php
class CommentsController extends AppController {
    public function find(){
        $this->autoRender = false; 
    }
    public function read($id){
        $this->autoRender = false; 
    }
    public function create(){
        // $this->request->data['Comment']['mt_client_id'] = '30';
        
        // $this->Comment->create();
        
        // $status = ($this->Comment->save($this->request->data))
        //     ? 200
        //     : 400; 

        $this->RequestHandler->response->statusCode( 400 );

        $this->autoRender = false; 
        return json_encode( 'no guardado' );
    }
    public function update($id){
        $this->autoRender = false; 
    }
    public function delete($id){
        if( $this->Comment->delete($id) )
            $status = 200;
        else 
            $status = 400;

        $this->RequestHandler->response->statusCode($status);
        $this->autoRender = false; 
        return json_encode( $this->Comment->id );
    }

}