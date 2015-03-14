'use strict';

/* Services */

var commentsSevices = angular.module('commentsSevices', ['ngResource'] );

commentsSevices.factory('CommentModule', ['$resource', function($resource){
	return $resource('/posts/add_comment', {},{
		add: {method:'POST', params:{ 
			Comment:{
				user_id:null,
				comment:null,
				post_id:null
		}}, isArray:true}
	});
}]);