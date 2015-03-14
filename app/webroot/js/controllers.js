'use strict';

/* Controllers */

var commentsControllers = angular.module('commentsControllers', []);

commentsControllers.controller('CommentCtrl', ['$scope', 'CommentModule'], function($scope, CommentModule){
  $scope.ListComments = CommentModule.get({id:$scope.post_id});

  $scope.add = function(){ method:'POST',
    CommentModule.add({ 
      Comment:{
        user_id: $scope.user_id,
        comment: $scope.comment,
        post_id: $scope.post_id
    }}, function(commentsData){

    })
  }
});
