'use strict';

/* Services */

var postsServices = angular.module('postsServices', ['ngResource'] );

postsServices.factory('Post', ['$resource', 
	function($resource){
		return $resource('/api/posts/:id', {id: '@id'},{
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

postsServices.factory('Comment', ['$resource', 
	function($resource){
		return $resource('/api/comments/:id', {id: '@id'},{
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