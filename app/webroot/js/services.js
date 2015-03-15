'use strict';

/* Services */

var commentsServices = angular.module('commentsServices', ['ngResource'] );

commentsServices.factory('CommentModule', ['$resource', function($resource){
	return $resource('/posts/add_comment/:id', {id: '@Comment.post_id'},{
		find: {
				method: 'GET',
				isArray: true
		},
		read: {
				method: 'GET',
				isArray: false
		},
		save: {
				method: 'POST',
				isArray: false
		},
		remove: {
				method: 'DELETE',
				isArray: false
		}
	});
}]);