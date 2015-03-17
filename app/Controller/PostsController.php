<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session', 'RequestHandler');

    public function index(){ //View/Posts/index.ctp
        $this->set('posts', $this->Post->find( 'all' ) );
    }

    public function view($id){ //Received call from AngularJS
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);

        if (!$post){
            throw new NotFoundException(__('Invalid post'));
        }

        //$this->set('post', $post);
        //$post["user_logged"] = $this->Auth->user('id');

        $this->set(array(
            'recipes' => $post,
            '_serialize' => array('recipes')
		));
    }

    public function add_comment($id){ //Received call from AngularJS
    	if($this->request->is('post') ){
        	$this->Post->Comment->save( $this->request->data );
        	$data = $this->request->data;
        }
        else {
        	$data = $this->Post->Comment->findByPostId( $id );
        }
		$this->set(array(
            'recipes' => $data,
            '_serialize' => array('recipes')
		));

        //$this->set('recipes', array($data));
        
        //RequestHandlerComponent::renderAs('add_comment', 'json');
    	//$this->layout = 'ajax';
		//$this->render('/Layouts/ajax');
    }

    public function old_add_comment($id){
    	if($this->request->is('post') ){
        	$this->Post->Comment->save( $this->request->data );
        	$this->set('data', $this->request->data );
        }
        else {
        	$this->set('data', $this->Post->Comment->findByPostId( $id ) );
        }

    	$this->layout = 'ajax';
		$this->render('/Layouts/ajax');
    }

    public function add() { // View/Posts/add.ctp
    	$this->set( 'client', MT_CLIENT_ID );
    	
	    if ($this->request->is('post') ) {
	        //Added this line
	        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
	        if( $this->Post->save($this->request->data )) {
	            $this->Session->setFlash(__('Your post has been saved.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	    }
	}

    public function edit($id = null) { // View/Posts/edit.ctp
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	public function delete($id) {
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	    } else {
	        $this->Session->setFlash(
	            __('The post with id: %s could not be deleted.', h($id))
	        );
	    }

	    return $this->redirect(array('action' => 'index'));
	}

	public function isAuthorized($user) {
	    // All registered users can add posts
	    if ($this->action === 'add') {
	        return true;
	    }

	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('edit', 'delete'))) {
	        $postId = (int) $this->request->params['pass'][0];
	        if ($this->Post->isOwnedBy($postId, $user['id'])) {
	            return true;
	        }
	    }

	    return parent::isAuthorized($user);
	}
}