<?php
class MtClient extends AppModel{
    public $hasMany = array(
    	'User',
    	'Comment',
    	'Post'
    );
}