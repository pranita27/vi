<!DOCTYPE html>
<html lang="en" ng-app="TASVisitorsApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/"/>
    <title>Visitor Management</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.png">
  </head>
  <body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a ui-sref="listByDate">Today</a></li>
          <li class=""><a ui-sref="listByDate">Yesterday</a></li>
          <li class=""><a ui-sref="find">Find</a></li>
          <li class=""><a ui-sref="new">New</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </form>
        <div class="nav navbar-nav">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              <img class="logo" src="img/logo.png">
            </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-sm-8" ng-controller="VisitorController">
          <div class="well">
            <form novalidate role="form" class="form-horizontal">
              <fieldset>
                <legend>Visitor details</legend>
                <div class="thumbnail">
                  <img id="visitor-image" class="hidden">
                </div>
                <div class="form-group">
                  <label for="name" class="control-label col-sm-2">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Name" ng-model="v.name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="purpose" class="control-label col-sm-2">Purpose of visit</label>
                  <div class="col-sm-10">
                  <select class="form-control" id="purpose" ng-model="v.purpose" ng-options="item.value as item.name for item in purposeOptions">
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="to_meet" class="control-label col-sm-2">To meet</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="to_meet" placeholder="Contact person?" ng-model="v.to_meet">
                  </div>
                </div>
                <div class="form-group">
                  <label for="from" class="control-label col-sm-2">Coming from</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="from" placeholder="Coming from?" ng-model="v.from">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobile" class="control-label col-sm-2">Mobile number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="Mobile number" ng-model="v.phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="control-label col-sm-2">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Email" ng-model="v.email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="submitted_id" class="control-label col-sm-2">Type of ID submitted</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="submitted_id" ng-model="v.submitted_id" ng-options="item.value as item.name for item in proofOptions">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="issued_id" class="control-label col-sm-2">Issued ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="issued_id" placeholder="Issued ID number" ng-model="v.issued_id">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg" ng-click="save(v)">Save</button>
                  <button class="btn btn-info btn-lg">Print</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="well col-sm-4"  ng-controller="CamController">
          <div class="progress progress-striped active" ng-show="camStatus == 'waiting'">
            <div class="progress-bar" style="width: 100%">Waiting...</div>
          </div>
          <div class="alert alert-danger" ng-show="camStatus == 'failed'">
            <span>Webcam could not be started :(</span>
          </div>
          <div id="webcam"></div>
          <button id="capture" class="btn btn-primary" ng-show="camStatus == 'started'" ng-click="takeSnap()">Take photo</button>
          <button id="start" class="btn btn-success" ng-show="camStatus !== 'started'" ng-click="startCam()">Start Webcam</button>
          <button id="stop" class="btn btn-danger" ng-show="camStatus == 'started'" ng-click="stopCam()">Stop Webcam</button>
        </div>
        <div class="well col-sm-4">
        </div>
      </div>
    </div>
  </div>
  <script src="js/angular.min.js"></script>
  <script src="js/angular-ui-router.min.js"></script>
  <script src="js/angular-resource.min.js"></script>
  <script src="js/say-cheese.min.js"></script>
  <script src="js/app.js"></script>
  </body>
</html>
