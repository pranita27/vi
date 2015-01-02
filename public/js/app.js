angular.module('vapp', [])
  .controller('CamController', function($scope){
    $scope.camStatus = 'before-init';
    $scope.webcam = new SayCheese("#webcam");

    $scope.webcam.on('error', function(err){
      $scope.$apply(function(){
        $scope.camStatus = 'failed';
      });
    });

    $scope.webcam.on('start', function(err){
      $scope.webcam.video.height = 240;
      $scope.$apply(function(){
        $scope.camStatus = 'started';
      });
    });

    $scope.webcam.on('snapshot', function(snapshot){
      var img = angular.element(document.querySelector('#visitor-image'));
      img.prop('src', snapshot.toDataURL('image/jpeg', 0.5));
      img.removeClass('hidden').addClass('show');
      $scope.webcam.snapshots = [];
    });

    $scope.stopCam = function() {
      $scope.webcam.stop();
      angular.element($scope.webcam.video).remove();
      $scope.camStatus = 'stopped';
    };

    $scope.startCam = function() {
      $scope.camStatus = 'waiting';
      $scope.webcam.start();
    };

    $scope.takeSnap = function(snap) {
      $scope.webcam.takeSnapshot(320, 240);
    };

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
