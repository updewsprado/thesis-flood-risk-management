<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flood Risk Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Libraries -->
  <script src="<?php echo base_url(); ?>static/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>static/vendor/momentjs/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>static/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>static/vendor/datetimepicker/bootstrap-datetimepicker.min.js"></script>

  <link rel="stylesheet" href="<?php echo base_url(); ?>static/vendor/font-awesome/css/font-awesome.min.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/styles.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/vendor/datetimepicker/bootstrap-datetimepicker.min.css">
</head>
<body class="main-body">

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
          <input type='text' class="form-control" />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </li>
    </ul>
  </div>
</nav>
  
<div class="container margin-top-page">
  <div class="row">
    <div class="col-sm-3 text-center">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3 class="text-muted">
            <i class="fa fa-globe" aria-hidden="true"></i>
            Marilao, Bulacan
          </h3>
          <h2>
            Alert Level: <span class="text-danger"><b>CRITICAL</b></span>
          </h2>
          <p>20mm of rain is continuously falling for 15 hours. Wind is at 100km/hr.</p>
          <div class="row">
            <div class="col-xs-6">
              <p>
                <b>Temperature: </b><br> 20 &deg;C
              </p>
            </div>
            <div class="col-xs-6">
              <p>
                <b>Heat Index: </b><br> 25 &deg;C
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
            <div class="col-xs-3">
              <button type="button" class="btn btn-calamity btn-block" data-toggle="modal"
                  data-target="#municipalityDetailsStateOfCalamityModal">
                State of Calamity
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
              </button>
              <br>
              <p>
                Convene a Special Session of the municipal council to approve the declaration of state of calamity.
                <br><br>
                <span>20:08 June 12</span>
              </p>
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                  data-target="#municipalityDetailsEvacuateModal">
                Evacuate Now
                <i class="fa fa-truck" aria-hidden="true"></i>
              </button>
              <br>
              <p>
                <a href="#" data-toggle="modal" data-target="#barangayDetailsModal">Saog</a>, 
                <a href="#" data-toggle="modal" data-target="#barangayDetailsModalCritical_Ibayo">Ibayo</a> and 
                <a href="#" data-toggle="modal" data-target="#barangayDetailsModalHigh">Lias</a>
                needs rescue and evacuation. COORDINATE with DSWD for relief goods.
                <br><br>
                <span>20:08 June 12</span>
              </p>
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                  data-target="#municipalityDetailsMonitoringModal">
                Continuous Monitoring
                <i class="fa fa-eye" aria-hidden="true"></i>
              </button>
              <br>
              <p>
                Coordinate with BCs on
                <a href="#" data-toggle="modal" data-target="#barangayDetailsModalMidHigh">Poblacion</a> and 
                <a href="#" data-toggle="modal" data-target="#barangayDetailsModalMedium">Abangan</a>
                <br><br>
                <span>20:08 June 12</span>
              </p>
            </div>
            <div class="col-xs-3">
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                  data-target="#municipalityDetailsRecoveryModal">
                Start Recovery
                <i class="fa fa-check" aria-hidden="true"></i>
              </button>
              <br>
              <p>
                Recovery procedures shall commence.
                <br><br>
                <span>20:08 June 12</span>
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
          <div class="col-sm-4">
            <div class="alert alert-critical">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> SAOG</u></b></h4>
              <p>Alert Level: <span>CRITICAL</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>RESCUE & EVACUATION</b></p>
              <br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModal">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-critical">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> IBAYO</u></b></h4>
              <p>Alert Level: <span>CRITICAL</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>RESCUE & EVACUATION</b></p>
              <br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalCritical_Ibayo">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-high">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> LIAS</u></b></h4>
              <p>Alert Level: <span>HIGH</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>RESCUE & EVACUATION</b></p>
              <br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalHigh">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-mid-high">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> POBLACION 1ST</u></b></h4>
              <p>Alert Level: <span>Mid-high</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>Continuous Monitoring</b></p>
              <br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalMidHigh">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-medium">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> ABANGAN NORTE</u></b></h4>
              <p>Alert Level: <span>Medium</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>Continuous Monitoring</b></p>
              <br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalMedium">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> STA ROSA 1ST</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_StaRosa1st">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> ABANGAN SUR</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_AbanganSur">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> LAMBAKIN</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Lambakin">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> LOMA DE GATO</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_LomaDeGato">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> NAGBALON</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Nagbalon">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> PATUBIG</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Patubig">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> POBLACION 2ND</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Poblacion2nd">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> PRENZA 1ST</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Prenza1st">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> PRENZA 2ND</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_Prenza2nd">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> TABING-ILOG</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_TabingIlog">
                More info
                <i class="fa fa-info-circle" aria-hidden="true"></i>
              </button>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="alert alert-none">
              <h4><b><u><i class="fa fa-map-marker" aria-hidden="true"></i> STA ROSA 2ND</u></b></h4>
              <p>Alert Level: <span>Normal</span></p>
              <br>
              <p>Average Flood level: <span>XXXX</span></p>
              <p>No. of People Affected: <span>XXXX</span></p>
              <br>
              <p>Action Required: <b>None</b></p>
              <br><br>
              <button type="button" class="btn btn-info btn-block" 
                  data-toggle="modal" data-target="#barangayDetailsModalNormal_StaRosa2nd">
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
              <tr class="critical">
                <td>Poblacion marker</td>
                <td>10 meters</td>
                <td>Critical</td>
              </tr>
              <tr class="critical">
                <td>Abangan bridge</td>
                <td>8 meters</td>
                <td>Critical</td>
              </tr>
              <tr class="high">
                <td>Bridge #3</td>
                <td>7 meters</td>
                <td>High</td>
              </tr>
              <tr class="mid-high">
                <td>Tabing-ilog bridge</td>
                <td>6 meters</td>
                <td>Mid High</td>
              </tr>
              <tr class="medium">
                <td>Bridge #4</td>
                <td>4 meters</td>
                <td>Medium</td>
              </tr>
              <tr class="none">
                <td>Bridge #5</td>
                <td>2 meters</td>
                <td>Normal</td>
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
          <p>
            <b>@test:</b> Wala pong kuryente dito sa may Abangan ...21:35 6/12
          </p>
          <hr>
          <p>
            <b>@test2:</b> Stranded na po kami dito sa may SM Marilao ...21:35 6/12
          </p>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
          Facebook Feeds
        </div>
        <div class="panel-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <p>
                <b>Meralco: </b> There will be power interruption in Tabing-ilog, Loma De Gato and Ibayo
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
          <small>as of 16:44 June 15, 2018</small>
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
                  <a href="#" class="list-group-item">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      Saog
                    </b>
                  </a>
                  <a href="#" class="list-group-item">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      Ibayo
                    </b>
                  </a>
                  <a href="#" class="list-group-item">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      Lias
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
                  Listed barangays need resuce and evacuation. Coordinate with 
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
                  <a href="#" class="list-group-item">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      Poblacion
                    </b>
                  </a>
                  <a href="#" class="list-group-item">
                    <b>
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                      Abangan
                    </b>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-mid-high">
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

<!-- Municipality Action Modal - Recovery -->
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
          <small>as of 16:44 June 15, 2018</small>
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
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> SAOG</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
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
                  Coordinate with DSWD for the relief goods. Make sure that
                  the relief shelter is ready for occupancy.
                </div>
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
                  [Insert narrative and resources needed]
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalCritical_Ibayo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> IBAYO</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
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
                  Coordinate with DSWD for the relief goods. Make sure that
                  the relief shelter is ready for occupancy.
                </div>
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
                  [Insert narrative and resources needed]
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalHigh" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> LIAS</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-high">
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
                  Coordinate with DSWD for the relief goods. Make sure that
                  the relief shelter is ready for occupancy.
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalMidHigh" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> POBLACION 1ST</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-mid-high">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-warning text-center">
                  <b>
                    <u>
                      Continous Monitoring
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </u>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Coordinate with BCs. Make sure that
                  the relief shelter is ready for occupancy.
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalMedium" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> ABANGAN NORTE</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-medium">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-warning text-center">
                  <b>
                    <u>
                      Continous Monitoring
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </u>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Coordinate with BCs. Make sure that
                  the relief shelter is ready for occupancy.
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_StaRosa1st" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> STA ROSA 1ST</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_AbanganSur" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> ABANGAN SUR</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Lambakin" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> LAMBAKIN</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_LomaDeGato" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> LOMA DE GATO</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Nagbalon" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> NAGBALON</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Patubig" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> PATUBIG</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Poblacion2nd" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> POBLACION 2ND</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Prenza1st" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> PRENZA 1ST</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_Prenza2nd" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> PRENZA 2ND</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_TabingIlog" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> TABING-ILOG</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<!-- Barangay Details Modal -->
<div id="barangayDetailsModalNormal_StaRosa2nd" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">
          <b><i class="fa fa-map-marker" aria-hidden="true"></i> STA ROSA 2ND</b>
          <small>as of 16:44 June 15, 2018</small>
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
                    Risk Factor: <span class="text-danger">HIGH</span>
                  </h4>
                  <p>
                    The area is exposed to rain enduced disaster. Disaster
                    vulnerability is high.
                  </p>
                </div>
                <h4>Estimated Affected</h4>
                <p>
                  <b>Families:</b>
                  <span>600</span>
                </p>
                <p>
                  <b>Vulnerable Population:</b>
                  <span>900</span>
                </p>
                <p>
                  <b>Affected Population:</b>
                  <span>5000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-normal">
              <div class="panel-heading">
                Action Board
                <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
              </div>
              <div class="panel-body">
                <h2 class="text-success text-center">
                  <b>
                    No action required
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                  </b>
                </h2>
                <br>
                <div class="well well-lg">
                  Location is safe
                </div>
                <p>
                  <b>Assigned Shelter:</b>
                  <span>Guillermo Basketball Court</span>
                </p>
                <p>
                  <b>Average Flood Level:</b>
                  <span>3 feet</span>
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

<script type="text/javascript">
  $(function () {
    var defaultDateTime = moment('06/12/2018 20:30:00', 'MM/DD/YYYY hh:mm:ss');

    $('#datetimepicker1').datetimepicker({
      defaultDate: defaultDateTime,
    });
  });
</script>

</body>
</html>
