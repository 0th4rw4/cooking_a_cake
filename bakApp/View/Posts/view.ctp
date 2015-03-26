<!-- File: /app/View/Posts/view.ctp -->
<div ng-controller="CommentCtrl">

<h1>{{title}}</h1>

<p><small>{{created}}</small></p>

<p>{{body}}</p>
<ul>
	<li ng-repeat="comm in comments "><div>Commentario: {{comm.comment}}</div>
		<div>Usuario: {{comm.user_id}}</div></li>
</ul>
<div>
	<textarea ng-model="textComment">
	</textarea>
	<button ng-click="save()">Agregar </button>
</div>
</div>