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
      <li>
        <a href="index.html">
          <i class="fa fa-tachometer" aria-hidden="true"></i>
          Dashboard
        </a>
      </li>
      <li class="active">
        <a href="data_admin.html">
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
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            Data Administration Page
          </h4>
        </div>
        <div class="panel-body">
          <div class="alert alert-info alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Configure the parametarized values and upload csv files using this page.
          </div>
          <div class="row">
            <div class="col-sm-6">
              <h4>Static Datasets</h4>
            </div>
            <div class="col-sm-6 text-right">
              <button type="button" class="btn btn-primary" 
                  data-toggle="modal" data-target="#fileUploadModal">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Upload new file
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-responsive table-condensed table-hover">
                <thead>
                  <th>Filename</th>
                  <th>Data Provider</th>
                </thead>
                <tbody>  
                  <tr>
                    <td><a href="#">Local Government Unit File #1</a></td>
                    <td>Local Government Unit</td>
                  </tr>
                  <tr>
                    <td><a href="#">Local Government Unit File #2</a></td>
                    <td>Local Government Unit</td>
                  </tr>
                  <tr>
                    <td><a href="#">Philippine Statistics Authority Data #1</a></td>
                    <td>Philippine Statistics Authority</td>
                  </tr>
                  <tr>
                    <td><a href="#">Philippine Statistics Authority Data #2</a></td>
                    <td>Philippine Statistics Authority</td>
                  </tr>
                  <tr>
                    <td><a href="#">Philippine Statistics Authority Data #3</a></td>
                    <td>Philippine Statistics Authority</td>
                  </tr>
                  <tr>
                    <td><a href="#">DSWD File #1</a></td>
                    <td>DSWD</td>
                  </tr>
                  <tr>
                    <td><a href="#">DSWD File #2</a></td>
                    <td>DSWD</td>
                  </tr>
                  <tr>
                    <td><a href="#">NDRRMC File #1</a></td>
                    <td>NDRRMC</td>
                  </tr>
                  <tr>
                    <td><a href="#">NDRRMC File #2</a></td>
                    <td>NDRRMC</td>
                  </tr>
                  <tr>
                    <td><a href="#">PAGASA Data #1</a></td>
                    <td>PAGASA</td>
                  </tr>
                  <tr>
                    <td><a href="#">PAGASA Data #2</a></td>
                    <td>PAGASA</td>
                  </tr>
                  <tr>
                    <td><a href="#">PAGASA Data #3</a></td>
                    <td>PAGASA</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-12">
              <h4>Editable Values</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="random1">Parameter 1:</label>
                <input type="text" class="form-control" id="random1">
              </div>
              <div class="form-group">
                <label for="random2">Parameter 2:</label>
                <input type="text" class="form-control" id="random2">
              </div>
              <div class="form-group">
                <label for="random3">Parameter 3:</label>
                <input type="text" class="form-control" id="random3">
              </div>
              <div class="form-group">
                <label for="random4">Parameter 4:</label>
                <input type="text" class="form-control" id="random4">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="selectParam5">Parameter 5:</label>
                <select class="form-control" id="selectParam5">
                  <option>select a variable...</option>
                  <option>variable1</option>
                  <option>variable2</option>
                  <option>variable3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="selectParam6">Parameter 6:</label>
                <select class="form-control" id="selectParam6">
                  <option>select a variable...</option>
                  <option>variable1</option>
                  <option>variable2</option>
                  <option>variable3</option>
                </select>
              </div>
              <label>Parameter 7:</label>
              <form>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 1
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 2
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 3
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 4
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 5
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" value="">Option 6
                </label>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-right">
              <button type="button" class="btn btn-success btn-lg">
                <i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i>
                Save Changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="fileUploadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload New File</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="selectProvider">Data Provider:</label>
          <select class="form-control" id="selectProvider">
            <option>select a data provider...</option>
            <option>DSWD</option>
            <option>Local Government Unit</option>
            <option>NDRRMC</option>
            <option>PAGASA</option>
            <option>Philippine Statistics Authority</option>
            <option>Other</option>
          </select>
        </div>
        <hr>
        <label>Select Data File (CSV only):</label>
        <div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse&hellip; <input type="file" style="display: none;" multiple>
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          <i class="fa fa-upload" aria-hidden="true"></i>
          Upload
        </button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });
    
  });
</script>

</body>
</html>
