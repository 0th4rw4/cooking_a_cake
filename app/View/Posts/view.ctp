<!-- File: /app/View/Posts/view.ctp -->
<div ng-controller="commentsControllers">

<h1><?php echo $post['Post']['title'] ?></h1>

<p><small>Created: <?php echo $post['Post']['created'] ?></small></p>

<p><?php echo $post['Post']['body'] ?></p>
<p>{{ 1+1 }}</p>
<ul>
	<li ng-repeat="comm in ListComments.Comment "><div>Commentario: {{comm.comment}}</div>
		<div>Usuario: {{comm.user_id}}</div></li>
</ul>
<?php

echo $this->Form->create('Comment' ,array( 
	'url' => array('action' => 'add_comment', 'controller' => 'posts')
) );
echo $this->Form->input('user_id', array('type' => 'hidden', 'ng-module' => 'user_id', 'value' => $user_id ));
echo $this->Form->input('post_id', array('type' => 'hidden', 'ng-module' => 'post_id','value' => $post['Post']['id'] ));
echo $this->Form->input('comment', array('ng-module'=>'comment'));
echo $this->Form->end( __('Enviar'), array(
	'ng-click' => 'add()'
	));

?>

</div>