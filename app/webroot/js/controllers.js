'use strict';

/* Controllers */

var commentsControllers = angular.module('commentsControllers', []);

commentsControllers.controller('CommentCtrl', ['$scope', 'CommentModule', function($scope, CommentModule){
  $scope.comments = [];
  
  Comment.find({ id: $scope.post_id} ,function(response){
      $scope.comments = response;
      
    });

  //$scope.ListComments = CommentModule.get({id:$scope.post_id});


  $scope.newComment = {
      "Comment": {
        comment: $scope.comment,
        user_id: $scope.user_id,
        post_id: $scope.post_id //esto lo sacás de otro lado... .... 
      }
    };

  $scope.save = function() {
      /** 
       * newComment podría ser: 
       * {"Comment": {
       *  id: 234, // el servise usa ESTO para pasrale como :id a la URL
       *  post_id: 453,
       *  comment: "este post me gusta =) "
       * }}
       */
      Comment.save($scope.newComment, function(response){
        $scope.comments.Comment = response.Comment;
        //lo que quieras hacer con la respuesta del server... 
      });
    };
}]);
