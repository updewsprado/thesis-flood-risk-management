<?php
class Municipality extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('municipality_model');
    $this->load->model('barangay_model');
    $this->load->helper('url_helper');
  }

  // ex URL: http://localhost/municipality
  /*
    ex output:

    Municipality Index Page
  */
  public function index() {
    $data['title'] = 'Municipality Index Page';
    $this->load->view('municipality/index', $data);
  }

  // API for getting the alert level of a municipality
  // ex URL: http://localhost/municipality/alert_level/1/2018-10-10 00:00:00
  /*
    ex output:

    {"id":"1","name":"Marilao","ts":"2018-10-10 00:00:00","alert_level_id":"3"}
  */
  public function alert_level($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['municipality_alert'] = $this->get_alert_level($municipality_id, $timestamp);

    if (empty($data['municipality_alert'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['municipality_alert']);  
    }

  }

  public function get_alert_level($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data = $this->municipality_model->get_alert_level($municipality_id, $timestamp);

    return $data;  
  }

  public function is_recovering($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $current_alert = $this->get_alert_level($municipality_id, $timestamp);

    if ($current_alert["level"] <= 2) {
      $data['severe_alert_count'] = $this->municipality_model->get_previous_severe_alerts_count($municipality_id, $timestamp);

      if ($data['severe_alert_count'] >= 1) {
        echo json_encode(true);
      } 
      else {
        echo json_encode(false);
      }
      
    } else {
      echo json_encode(false);
    }
  }

  // API for getting all barangays under the municipality
  // ex URL: http://localhost/municipality/all_barangays/
  /*
    ex output:

    [{"name":"Abangan Norte","population_vulnerable":"3726"},
    {"name":"Abangan Sur","population_vulnerable":"4209"},
    {"name":"Ibayo","population_vulnerable":"2831"}]
  */
  public function all_barangays($municipality_id=1) {
    $data['all_barangays'] = $this->municipality_model->get_barangays_of_municipality($municipality_id);

    if (empty($data['all_barangays'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['all_barangays']);  
    }
  }

  public function delete_alerts() {
    if ($this->barangay_model->delete_alerts()) {
      echo "Successfully emptied barangay alerts table<Br>" ;
    } 

    if ($this->municipality_model->delete_alerts()) {
      echo "Successfully emptied municipality alerts table<Br>";
    } 
  }

  // TODO: Generate municipality alert levels
  public function generate_alerts($municipality_id=1, $timestamp=null) {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    // generate barangay alert levels
    $flood_hazard_scores = $this->barangay_model->get_flood_and_hazard_scores_all($municipality_id);
    $evc_scores = $this->barangay_model->get_evc_all();
    $barangay_alert_scores = $this->generate_alerts_barangay($evc_scores, $flood_hazard_scores);

    // Insert the generated barangay alert levels to the database
    // echo json_encode($barangay_alert_scores);
    $this->insert_batch_alerts_barangay($barangay_alert_scores);

    // generate the municipality alert level from the sum of barangay levels
    $municipality_alerts = $this->generate_alerts_municipality($barangay_alert_scores);

    // Insert the generated municipality alert levels to the database
    //  Necessary fields to insert (4): id, ts, municipality_id, alert_level_id
    // echo json_encode($municipality_alerts);
    $this->insert_batch_alerts_municipality($municipality_alerts);
  }

  // generate barangay alert levels
  private function generate_alerts_barangay($evc_scores=null, $flood_hazard_scores=null) {
    // Create a dictionary for evc per barangay id
    foreach ($evc_scores as $evc_barangay) {
      $evc_scores_dict[$evc_barangay['barangay_id']] = $evc_barangay;
    }

    // echo json_encode($evc_scores_dict);

    $ctr = 0;
    foreach ($flood_hazard_scores as $fh_barangay) {
      $barangay_id = $fh_barangay['barangay_id'];
      $ts = $fh_barangay['ts'];
      $flood_score = $fh_barangay['flood_score'];
      $hazard = $fh_barangay['hazard_score'];
      $exposure = $evc_scores_dict[$fh_barangay['barangay_id']]['exposure'];
      $vulnerability = $evc_scores_dict[$fh_barangay['barangay_id']]['vulnerability'];
      $capacity = $evc_scores_dict[$fh_barangay['barangay_id']]['coping_capacity'];

      // Compute the Barangay Alert Score
      $alert_score = $flood_score + (($hazard * $exposure * $vulnerability) / $capacity);

      // Get alert level from alert score
      if (($alert_score >= 0) && ($alert_score < 6)) {
        $alert_level = 1;
        $alert_desc = "Normal";
      } 
      else if ($alert_score < 10) {
        $alert_level = 2;
        $alert_desc = "Moderate";
      }
      else if ($alert_score < 13) {
        $alert_level = 3;
        $alert_desc = "High";
      }
      else if ($alert_score < 20) {
        $alert_level = 4;
        $alert_desc = "Severe";
      }
      else {
        $alert_level = 5;
        $alert_desc = "Critical";
      }
      

      $alert_scores[$ctr] = array(
        'barangay_id' => $barangay_id,
        'ts' => $ts,
        'flood_score' => $flood_score,
        'hazard' => $hazard,
        'exposure' => $exposure,
        'vulnerability' => $vulnerability,
        'capacity' => $capacity,
        'alert_score' => $alert_score,
        'alert_level' => $alert_level,
        'alert_desc' => $alert_desc
      );

      $ctr++;
    }

    return $alert_scores;
  }

  // generate the municipality alert level from the sum of barangay levels
  private function generate_alerts_municipality($barangay_alert_scores=null) {
    $municipality_alerts = [];
    foreach ($barangay_alert_scores as $alert_score) {
      $ts_key = str_replace("%20","_", $alert_score['ts']);
      $ts_key = str_replace(" ", "_", $ts_key);
      $ts_key = str_replace(":", "-", $ts_key);

      if(array_key_exists($ts_key, $municipality_alerts)) {
        $municipality_alerts[$ts_key]['score'] += $alert_score['alert_score'];
      }
      else {
        $municipality_alerts[$ts_key] = array(
          'ts' => $alert_score['ts'],
          'score' => $alert_score['alert_score']
        );
      }
    }

    foreach ($municipality_alerts as $indiv_alert) {
      $ts_key = str_replace("%20","_", $indiv_alert['ts']);
      $ts_key = str_replace(" ", "_", $ts_key);
      $ts_key = str_replace(":", "-", $ts_key);

      $alert_score = $indiv_alert['score'];

      // Get alert level from alert score
      if (($alert_score >= 0) && ($alert_score < 11)) {
        $municipality_alerts[$ts_key]['level'] = 1;
        $municipality_alerts[$ts_key]['desc'] = "Normal";
      } 
      else if ($alert_score < 21) {
        $municipality_alerts[$ts_key]['level'] = 2;
        $municipality_alerts[$ts_key]['desc'] = "Moderate";
      }
      else if ($alert_score < 31) {
        $municipality_alerts[$ts_key]['level'] = 3;
        $municipality_alerts[$ts_key]['desc'] = "High";
      }
      else if ($alert_score < 51) {
        $municipality_alerts[$ts_key]['level'] = 4;
        $municipality_alerts[$ts_key]['desc'] = "Severe";
      }
      else {
        $municipality_alerts[$ts_key]['level'] = 5;
        $municipality_alerts[$ts_key]['desc'] = "Critical";
      }
    }

    return $municipality_alerts;
  }

  // batch insert barangay alert levels
  private function insert_batch_alerts_barangay($barangay_alerts) {
    $return_val = $this->barangay_model->insert_batch_alerts($barangay_alerts);
    echo "Inserted Barangay Alert Rows: " . $return_val . "<Br>";
  }

  // batch insert municipality alert levels
  private function insert_batch_alerts_municipality($municipality_alerts) {
    $return_val = $this->municipality_model->insert_batch_alerts($municipality_alerts);
    echo "Inserted Municipality Alert Rows: " . $return_val . "<Br>";
  }

  // API for municipality basic info
  // ex URL: http://localhost/municipality/info
  /*
    ex output:

    {"id":"1","name":"Marilao","full_address":"Marilao, Bulacan",
    "num_families":null,"population_total":null,
    "population_vulnerable":null,"last_updated_ts":"2018-08-05 16:40:09"}
  */
  public function info($municipality_id=1) {
    $data['municipality_info'] = $this->municipality_model->get_basic_info($municipality_id);

    if (empty($data['municipality_info'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['municipality_info']);  
    }
  }

  public function weather($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['weather'] = $this->municipality_model->get_weather($municipality_id, $timestamp);

    if (empty($data['weather'])) {
      show_404();
    }
    else {
      echo json_encode($data['weather']);
    }
  }

  // API for weather from a date range
  // ex URL: http://localhost/municipality/weather_range/1
  /*
    ex output:

    [{"id":"1","municipality_id":"1","ts":"2014-09-19 00:00:00","rain":"2",
    "wind":"16","temperature":"28","heat_index":"29"},
    {"id":"2","municipality_id":"1","ts":"2014-09-19 01:00:00","rain":"2",
    "wind":"16","temperature":"28","heat_index":"29"}
  */
  public function weather_range($municipality_id=1, $date_end=null, $date_start=null) {
    $data['weather'] = $this->municipality_model->get_weather_range($municipality_id);

    if (empty($data['weather'])) {
      show_404();
    }
    else {
      echo json_encode($data['weather']);
    }
  }

}