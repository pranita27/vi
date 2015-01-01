angular.module('vapp', ['webcam'])
  .controller('CamController', function($scope){
    $scope.camError = false;
    $scope.mono = false;
    $scope.onError = function(err) {
      $scope.$apply(function(){
        $scope.camError = err;
      });
    };
  })
  .controller('VisitorController', function($scope){


  });
