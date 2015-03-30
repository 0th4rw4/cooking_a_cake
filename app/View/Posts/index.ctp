<div ng-controller="postsCtl">
	<div>
		<h2>{{post.Post.title}}</h2>
		<p>{{post.Post.body}}</p>
	</div>
	<ul>
		<li ng-repeat="comment in post.Comment">
			<p>User Id: {{comment.user_id}}</p>
			<p>Comment:  {{comment.comment}} <input type="submit" ng-click="remove(comment.id)" value="X"/> </p>
			
		</li>
	</ul>
	<div>
		<p>Inserte un comentario</p>
		<textarea ng-model="commentContent"></textarea>
		<button ng-click="save()">Agregar</button>
	</div>
</div>