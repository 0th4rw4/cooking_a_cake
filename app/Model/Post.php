<?php
class Post extends AppModel{
	public $name = 'Post';
	
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public function beforeSave($options = array() ){
        if( defined('MT_CLIENT_ID') ){
            $this->data['Post']['mt_client_id'] = MT_CLIENT_ID;
            return true;
        }
        return false; // Le permito grabar ?
    }

    public function beforeFind($query = array()){
        if( defined('MT_CLIENT_ID') ){
            $query['conditions']['Post.mt_client_id'] = MT_CLIENT_ID;
        }
        return $query;
    }

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
