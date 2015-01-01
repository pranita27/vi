angular.module('vapp', ['webcam'])
  .controller('CamController', function($scope){
    $scope.video = false;
    $scope.camStatus = 'not-started';

    $scope.onError = function(err){
      $scope.$apply(function(){
        $scope.camStatus = 'failed';
      });
    };

    $scope.onSuccess = function(){
      $scope.$apply(function(){
        $scope.camStatus = 'started';
      });

    };

    $scope.onStream = function(stream) {
      //
    };

    $scope.stopCam = function() {
      $scope.camStatus = 'stopped';
      $scope.$broadcast('STOP_WEBCAM');
    }

    $scope.startCam = function() {
      $scope.camStatus = 'not-started';
      $scope.$broadcast('START_WEBCAM');
    }

    $scope.takeSnap = function() {
      if ($scope.video) {
        var snapshot = document.querySelector('#snap');
        var ctx = snapshot.getContext('2d');
        snapshot.width = $scope.video.width;
        snapshot.height = $scope.video.height;
        ctx.drawImage($scope.video, 0, 0, $scope.video.width, $scope.video.height);
        angular.element(snapshot).removeClass('hidden').addClass('show');
        // $(snapshot).addClass('show');
        ctx = null;
      }
    }
  })
  .controller('VisitorController', function($scope){
    $scope.proofOptions = [
      {name: "Aadhar card", value: "Aadhar card"},
      {name: "Company ID", value: "Company ID"},
      {name: "Driving license", value: "Driving license"},
      {name: "Pan card", value: "Pan card"},
      {name: "Passport", value: "Passport"},
      {name: "Voter ID", value: "Voter ID"}
    ];
    $scope.purposeOptions = [
      {name: "Family", value: "Family"},
      {name: "Friend", value: "Friend"},
      {name: "Interview", value: "Interview"},
      {name: "Vendor", value: "Vendor"}
    ];
    $scope.thumb = false;
  })
  .controller('VisitorController', function($scope){
    //
  });
