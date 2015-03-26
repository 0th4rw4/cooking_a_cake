<?php
class Post extends AppModel{
    public $belongsTo = array(
        'User'
        );
    public $hasMany = 'Comment';

}
