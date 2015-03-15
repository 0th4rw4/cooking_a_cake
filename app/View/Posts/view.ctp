<!-- File: /app/View/Posts/view.ctp -->
<div ng-controller="commentsControllers">

<h1><?php echo $post['Post']['title'] ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo $post['Post']['body']; ?></p>
<p>{{1+1}}</p>
<ul>
	<li ng-repeat="comm in comments.Comment "><div>Commentario: {{comm.comment}}</div>
		<div>Usuario: {{comm.user_id}}</div></li>
</ul>
<div>
	<input type="hidden" ng-model="user_id" value="<?php echo $user_id; ?>" />
	<input type="hidden" ng-model="post_id" value="<?php echo $post['Post']['id']; ?>" />
	<textarea ng-model="comments.Comment.comment">
	</textarea>
	<button ng-click="save()">Agregar </button>
</div>
</div>