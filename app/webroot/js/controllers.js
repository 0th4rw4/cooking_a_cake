'use strict';

/* Controllers */

var postsControllers = angular.module('postsControllers', [] );

postsControllers.controller('postsCtl', ['$scope', 'Post', 'Comment', 
  function($scope, Post, Comment){
    $scope.post = {};

    $scope.getData = function() {
      Post.read({ id:1 }, function(response){
        $scope.post = response;
      });
    };
    $scope.getData();

    $scope.save = function(){
      var data = {
        Comment:{
          comment: $scope.commentContent,
          post_id: $scope.post.Post.id,
          user_id: "1"
        }
      };

      Comment.save(data).$promise
        .then(function(response) { // si responde 200
          $scope.getData();
        })
        .catch(function(response) { // si responde cualquier otra cosa 
          alert(response.data);
        });

      // Comment.save(data, function(response){
      //   $scope.getData();
      // });
    }

    $scope.remove = function(id){
      var data = {id:id};
      Comment.remove(data, function(response){
        $scope.getData();
      });
    }
}]);