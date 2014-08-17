// initialize the app with dependencies
var myapp = angular.module('myapp', ['ngSanitize']);

// add post controller
myapp.controller('postController', function($scope, $http) {

  // load posts from the WordPress API
  $http({ method: 'GET', url: '/wp-json/posts'})
  .success(function(data, status, headers, config) {
    $scope.postdata = data;
    $scope.quantity = 1;
    // array numbers for comparison
    $postNumber = $scope.postdata.length;
    $index = $postNumber;
    // initial prev/next navigation state
    $scope.nextShown = false;
    $scope.prevShown = true;
  })
  .error(function(data, status, headers, config) {
  });

  // cycle to previous posts (stops at oldest)
  $scope.cycleBackward = function(item, $postCount) {
    $index--;
    $scope.postdata.push($scope.postdata.shift(item, 1));
    if ($index > 1 ) {
      $scope.nextShown = true;
    } else {
      $scope.prevShown = false;
    }
  };

  // cycle to next post (stops at newest)
  $scope.cycleForward = function(item, $postCount) {
    $index++;
    $scope.postdata.unshift($scope.postdata.pop(item, 1));
    if ($index < $postNumber ) {
      $scope.prevShown = true;
    } else {
      $scope.nextShown = false;
    }
  };

});
