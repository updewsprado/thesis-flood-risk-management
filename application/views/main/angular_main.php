<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flood Risk Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/styles.css">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>static/vendor/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>static/vendor/angular-moment-picker/angular-moment-picker.min.css">

  <!-- Angular JS Files -->
  <script src="<?php echo base_url(); ?>static/vendor/angular/angular.min.js"></script>
  <script src="<?php echo base_url(); ?>static/vendor/angular/angular-ui-router.js"></script>

  <!-- Date and time libraries -->
  <script src="<?php echo base_url(); ?>static/vendor/momentjs/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>static/vendor/angular-moment-picker/angular-moment-picker.min.js"></script>

  <!-- Bootstrapping -->
  <script src="<?php echo base_url(); ?>static/app/app.frms.js"></script>

  <!-- Pages -->
</head>
<body class="main-body">

<!-- Start of Angular App -->
<div ng-app="frmsApp" ng-controller="mainCtrl">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Flood Risk Management System</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active">
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            Dashboard
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>data_admin">
            <i class="fa fa-database" aria-hidden="true"></i>
            Data Administration
          </a>
        </li>
        <li>

          <div class='input-group date' id='datetimepicker1'>
            <input class="form-control"
                format="YYYY-MM-DD HH"
                change="recalculateData(targetDate)"
                ng-model="momentDate"
                ng-model-options="{ updateOn: 'blur' }"
                placeholder="Select a date..."
                moment-picker="targetDate">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>

        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->  
  <div class="container margin-top-page">
    <div class="row">
      <div class="col-sm-3 text-center">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="text-muted">
              <i class="fa fa-globe" aria-hidden="true"></i>
              {{ municipalityInfo.name }}
            </h3>
            <h2>
              Alert Level: 
              <span class="text-alert-{{ municipalityInfo.alert.level }}">
                <b>{{ municipalityInfo.alert.desc | uppercase }}</b>
              </span>
            </h2>
            <p>
              {{ municipalityInfo.weather.rain }}mm of rain is continuously 
              falling for 15 hours. Wind is at {{ municipalityInfo.weather.wind }}km/hr.
            </p>
            <div class="row">
              <div class="col-xs-6">
                <p>
                  <b>Temperature: </b><br> {{ municipalityInfo.weather.temperature }} &deg;C
                </p>
              </div>
              <div class="col-xs-6">
                <p>
                  <b>Heat Index: </b><br> {{ municipalityInfo.weather.heat_index }} &deg;C
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-9 text-center">
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="text-muted">
              Action Board
              <i class="fa fa-bell" aria-hidden="true"></i>
            </h3>
            <div class="row">
              <div class="col-xs-3" 
                  ng-if="municipalityInfo.action_board.isStateOfCalamity">
                <button type="button" class="btn btn-calamity btn-block" data-toggle="modal"
                    data-target="#municipalityDetailsStateOfCalamityModal">
                  State of Calamity
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                </button>
                <br>
                <p>
                  Convene a Special Session of the municipal council to approve the declaration of state of calamity.
                  <br><br>
                  <span>{{ targetDate }}</span>
                </p>
              </div>
              <div class="col-xs-3"
                  ng-if="municipalityInfo.action_board.isEvacuateNow">
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                    data-target="#municipalityDetailsEvacuateModal">
                  Evacuate Now
                  <i class="fa fa-truck" aria-hidden="true"></i>
                </button>
                <br>
                <p>
                  <a href="" data-toggle="modal" data-target="#barangayDetailsModal"
                      ng-click="clickedBarangayMoreInfo(barangay)"
                      ng-repeat="barangay in municipalityInfo.action_board.listEvacuation">
                    {{ barangay.basic_info.name }} |
                  </a>
                  needs rescue and evacuation. COORDINATE with DSWD for relief goods.
                  <br><br>
                  <span>{{ targetDate }}</span>
                </p>
              </div>
              <div class="col-xs-3"
                  ng-if="municipalityInfo.action_board.isContinuousMonitoring">
                <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                    data-target="#municipalityDetailsMonitoringModal">
                  Continuous Monitoring
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <br>
                <p>
                  Coordinate with BCs on
                  <a href="" data-toggle="modal" data-target="#barangayDetailsModal"
                      ng-click="clickedBarangayMoreInfo(barangay)"
                      ng-repeat="barangay in municipalityInfo.action_board.listContinuousMonitoring">
                    {{ barangay.basic_info.name }} |
                  </a>
                  <br><br>
                  <span>{{ targetDate }}</span>
                </p>
              </div>
              <div class="col-xs-3"
                  ng-if="municipalityInfo.action_board.isStartRecovery">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                    data-target="#municipalityDetailsRecoveryModal">
                  Start Recovery
                  <i class="fa fa-check" aria-hidden="true"></i>
                </button>
                <br>
                <p>
                  Recovery procedures shall commence.
                  <br><br>
                  <span>{{ targetDate }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>
              Affected Barangays
            </h4>
          </div>
          <div class="panel-body">
            <div class="col-sm-4" ng-repeat="barangay in allBarangays | orderBy: '-alert.level'">
              <div class="alert alert-{{ barangay.alert.desc | lowercase }}">
                <h4>
                  <b>
                    <u>
                      <i class="fa fa-map-marker" aria-hidden="true"></i> 
                      {{ barangay.basic_info.name | uppercase }}
                    </u>
                  </b>
                </h4>
                <p>
                  Alert Level: 
                  <span>{{ barangay.alert.desc | uppercase}}</span>
                </p>
                <br>
                <p>
                  Average Flood level: 
                  <span>{{ barangay.flood_status.level }}m</span>
                </p>
                <p>
                  No. of People Affected:<br>
                  <span>{{ barangay.basic_info.population }}</span>
                </p>
                <br>
                <p>
                  Action Required:<br>
                  <b>{{ barangay.alert.action_required | capitalizeWord }}</b>
                </p>
                <br>
                <button type="button" class="btn btn-info btn-block" 
                    ng-click="clickedBarangayMoreInfo(barangay)"
                    data-toggle="modal" data-target="#barangayDetailsModal">
                  More info
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading"><h4>River & Flood Markers</h4></div>
          <div class="panel-body">
            <table class="table table-responsive table-condensed table-hover">
              <tbody> 
                <tr class="{{ marker.rowClass }}" ng-repeat="marker in markerLevels">
                  <td>{{ marker.name }}</td>
                  <td>{{ marker.height }} meters</td>
                  <td>{{ marker.desc }}</td>
                </tr> 
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
            Twitter Feeds
          </div>
          <div class="panel-body">
            <p ng-repeat="msg in messagesTwitter">
              <b>@{{ msg.sender }}:</b> {{ msg.message }}... {{ msg.ts }}
            </p>
          </div>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
            Facebook Feeds
          </div>
          <div class="panel-body">            
            <div class="panel panel-default" ng-repeat="msg in messagesFacebook">
              <div class="panel-body">
                <p>
                  <b>{{ msg.sender }}: </b> {{ msg.message }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Municipality Action Modal - State of Calamity -->
<div id="municipalityDetailsStateOfCalamityModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">
          <b>
            State of Calamity
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
          </b>
          <small>as of {{ targetDate }}</small>
        </h2>
      </div>
      <div class="modal-body">
        <h3>
          Convene a Special Session of the municipal council to approve the declaration of state of calamity.
        </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Municipality Action Modal - Evacuate Now -->
<div id="municipalityDetailsEvacuateModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">
          <b class="text-danger">
            Evacuate Now
            <i class="fa fa-truck" aria-hidden="true"></i> 
          </b>
          <small>as of 16:44 June 15, 2018</small>
        </h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                Target Barangays
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <a href="" class="list-group-item" data-toggle="modal" 
                      data-target="#barangayDetailsModal"
                      ng-click="clickedBarangayMoreInfo(barangay)"
                      ng-repeat="barangay in municipalityInfo.action_board.listEvacuation">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      {{ barangay.basic_info.name }}
                    </b>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-critical">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-danger text-center">
                  <b>
                    <u>
                      EVACUATE NOW
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </u>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Listed barangays need rescue and evacuation. Coordinate with 
                  DSWD for the relief goods. Make sure that the relief shelter 
                  is ready for occupancy.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Municipality Action Modal - Monitoring -->
<div id="municipalityDetailsMonitoringModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">
          <b class="text-warning">
            Continuous Monitoring
            <i class="fa fa-eye" aria-hidden="true"></i>
          </b>
          <small>as of 16:44 June 15, 2018</small>
        </h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                Target Barangays
              </div>
              <div class="panel-body">
                <div class="list-group">
                  <a href="" class="list-group-item" data-toggle="modal" 
                      data-target="#barangayDetailsModal"
                      ng-click="clickedBarangayMoreInfo(barangay)"
                      ng-repeat="barangay in municipalityInfo.action_board.listContinuousMonitoring">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      {{ barangay.basic_info.name }}
                    </b>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-moderate">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h3 class="text-warning text-center">
                  <b>
                    <u>
                      Shelters should be ready
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </u>
                  </b>
                </h3>
                <br>
                <div class="well well-lg">
                  Shelters for the target barangays should be ready for occupancy.
                </div>
                <h3 class="text-warning text-center">
                  <b>
                    <u>
                      Rescuers on Alert
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </u>
                  </b>
                </h3>
                <br>
                <div class="well well-lg">
                  Assign rescuers to be on Alert for the target barangays.
                </div>
                <h3 class="text-warning text-center">
                  <b>
                    <u>
                      Send Warnings
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </u>
                  </b>
                </h3>
                <br>
                <div class="well well-lg">
                  Send warnings to target barangays. Impending hazard is coming.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Municipality Action Modal - Start Recovery -->
<div id="municipalityDetailsRecoveryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">
          <b class="text-primary">
            Start Recovery
            <i class="fa fa-check" aria-hidden="true"></i>
          </b>
          <small>as of {{ targetDate }}</small>
        </h2>
      </div>
      <div class="modal-body">
        <h3>
          Recovery procedures shall commence. Skies are clear and all roads are passable.
        </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Barangay Details Modal -->
<div id="barangayDetailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b>
            <i class="fa fa-map-marker" aria-hidden="true"></i> 
            {{ params.basic_info.name | uppercase }}
          </b>
          <small>as of {{ targetDate }}</small>
        </h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                Risk and Vulnerability Info
                <i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <div class="well well-lg">
                  <h4>
                    Risk Factor: <span class="text-danger">{{ params.risk | uppercase }}</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>{{ params.basic_info.families }}</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>{{ params.basic_info.vulnerable }}</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>{{ params.basic_info.affected }}</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-{{ params.alert.desc | lowercase }}">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <div ng-if="params.action_board.isEvacuateNow">
                  <h2 class="text-danger text-center">
                    <b>
                      <u>
                        EVACUATE NOW
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <div ng-if="params.action_board.isAskLGUForRecuers">
                  <h2 class="text-danger text-center">
                    <b>
                      <u>
                        ASK LGU for Rescuers
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <div ng-if="params.action_board.isCoordinateWithShelters">
                  <h2 class="text-warning text-center">
                    <b>
                      <u>
                        Coordinate w/ Shelters
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <div ng-if="params.action_board.isContinuousMonitoring">
                  <h2 class="text-warning text-center">
                    <b>
                      <u>
                        Continuous Monitoring
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <div ng-if="params.action_board.isStartRecovery">
                  <h2 class="text-success text-center">
                    <b>
                      <u>
                        Start Recovery
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <div ng-if="params.action_board.isNormalOperations">
                  <h2 class="text-success text-center">
                    <b>
                      <u>
                        Normal Operations
                      </u>
                    </b>
                  </h2>
                  <br>
                  <div class="well well-lg">
                    [Insert narrative]
                  </div>
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span ng-repeat="shelter in params.shelters">
                    {{ shelter }}, 
                  </span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>{{ params.flood_status.level }} meters</span>
                </p>
                <p>
                  <b>Resources Needed:</b>
                  <span>Rescue truck, 10 rescuers</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
<!-- End of Angular App -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>static/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Javascript -->
<script src="<?php echo base_url(); ?>static/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
