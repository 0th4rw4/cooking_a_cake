<?php
class MtClient extends AppModel {
	public $hasMany = 'User';

	/*public $hasMany = array(
        'Comment' => array( 
            'className' => 'Comments.Comment',
            'foreignKey' => 'mt_client_id'
        ) 
    );*/
}