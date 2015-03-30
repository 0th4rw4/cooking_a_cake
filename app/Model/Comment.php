<?php
class Comment extends AppModel{
    public $belongsTo = array(
        'User',
        'MtClient',
        'Post'
    );

    public $validate = array(
        'mt_client_id' => array(
        	'rule' => 'decimal', 
        	'allowEmpty' => false ),
        'comment' => array(
        	'minLength' => array(
        		'rule' => array('minLength', 3), 
        		'allowEmpty' => false, 
        		'required' => true )
        	),
        'post_id' => array(
        	'rule' => 'decimal', 
        	'allowEmpty' => false ),
        'user_id' => array(
        	'rule' => 'decimal', 
        	'allowEmpty' => false )
    );

}
