'use strict';

/* Services */

var commentsServices = angular.module('commentsServices', ['ngResource'] );

commentsServices.factory('CommentModule', ['$resource', function($resource){
	return $resource('/posts/:id.json', {id: '@recipes.Post.id'},{
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