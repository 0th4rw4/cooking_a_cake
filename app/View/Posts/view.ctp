<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo $post['Post']['title'] ?></h1>

<p><small>Created: <?php echo $post['Post']['created'] ?></small></p>

<p><?php echo $post['Post']['body'] ?></p>

<?php
echo '<ul>';
foreach($post['Comment'] as $comment){
	echo '<li><div>Commentario: '.$comment['comment'].'</div>';
	echo '<div>Usuario: '.$comment['user_id'].'</div></li>';
}
echo '</ul>';

echo $this->Form->create('Comment' ,array( 
	'url' => array('action' => 'add_comment', 'controller' => 'posts')
) );
echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user_id ));
echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id'] ));
echo $this->Form->input('comment');
echo $this->Form->end( __('Enviar'));