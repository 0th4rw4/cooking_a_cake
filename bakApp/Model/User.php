<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $belongsTo = 'MtClient';
    //public $actsAs = array('MtClient');

    public $hasMany = array(
        'Comment' => array( 
            'className' => 'Comments.Comment',
            'foreignKey' => 'user_id'
        ) 
    );

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public function beforeSave($options = array() ){
        if( is_null( $this->data['User']['mt_client_id'] ) ){
            $this->MtClient->save( array( 'name' =>  $this->data['User']['username'] ) );
            $this->data['User']['mt_client_id'] = $this->MtClient->id;
        }

        $this->data['User']['password'] = AuthComponent::password(
          $this->data['User']['password']
        );
        return true;
    }
    
}