<?php
class Comment extends AppModel {
	public $belongsTo = array('User', 'MtClient', 'Post');
	public $actsAs = array('MtClient');

}