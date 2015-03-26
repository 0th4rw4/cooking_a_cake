'use strict';

/* Controllers */

var commentsControllers = angular.module('commentsControllers', []);

commentsControllers.controller('CommentCtrl', ['$scope', 'CommentModule', '$http', function($scope, CommentModule, $http){
  $scope.comments = [];
  
  $http.get('/posts/add_comment/18.json').success(function(response){
      console.log(response);
      $scope.title = response.recipes.Post.title;
      $scope.body = response.recipes.Post.body;
      $scope.created = response.recipes.Post.created;
      $scope.post_id = response.recipes.Post.id;

      $scope.comments = response.recipes.Comment;
      console.log($scope.comments);
      //$scope.user_id = response.recipes.user_logged;
  });
  // ## Version para usar con Services
  /*CommentModule.find({ id: '18' } ,function(response){
      console.log(response);

      $scope.title = response.recipes.Post.title;
      $scope.body = response.recipes.Post.body;
      $scope.created = response.recipes.Post.created;
      $scope.post_id = response.recipes.Post.id;

      $scope.comments = response.recipes.Comment;
      
      
    });*/

  $scope.newComment = {
      "Comment": {
        comment: $scope.textComment,
        post_id: $scope.post_id 
      }
    };

  $scope.save = function() {
      $http.post('/posts/add_comment',newComment).success(function(response){
        $scope.comments.Comment = response.Comment;
      });
      /** 
       * newComment podría ser: 
       * {"Comment": {
       *  id: 234, // el servise usa ESTO para pasrale como :id a la URL
       *  post_id: 453,
       *  comment: "este post me gusta =) "
       * }}
       *

      CommentModule.save($scope.newComment, function(response){
        $scope.comments.Comment = response.Comment;
        //lo que quieras hacer con la respuesta del server... 
      });
      */
    };
}]);
