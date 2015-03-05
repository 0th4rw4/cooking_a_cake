<?php
class Post extends AppModel{
	public $name = 'Post';
	public $actsAs = array('MtClient');
    public $hasMany = array(
        'Comment' => array( 
            'className' => 'Comments.Comment',
            'foreignKey' => 'post_id',
            'order' => array('Comment.created' => 'DESC')
        )
    );
        /*
        'ModelName' => array( 
            'className' => 'PluginName.ModelOfPlugin',
            'foreignKey' => 'post_id',
            'order' => array('ModelName.created' => 'DESC')  ) );    

        Usar esta forma ("ModelName") implicaria tener que hacer esto en el Controller 
        $this->Post->ModelName->find('first');
        --> NO HACERLO <---
        */

	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    /*public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }*/
}
