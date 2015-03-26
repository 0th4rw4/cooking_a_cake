<?php
class User extends AppModel{
    public $hasMany = array(
    	'Comment',
    	'Post'
    );
    public $hasOne = array('MtClient');
    public $actsAs = array('MtClient');
}