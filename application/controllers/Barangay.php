<?php
class Barangay extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('barangay_model');
    $this->load->helper('url_helper');
  }

  // ex URL: http://localhost/barangay
  /*
    ex output:

    Barangay Index Page
  */
  public function index() {
    $data['title'] = 'Barangay Index Page';
    $this->load->view('barangay/index', $data);
  }

  // API for getting the alert level of a barangay
  // ex URL: http://localhost/barangay/alert_level/5/2018-10-10 00:00:00
  /*
    ex output:

    {"id":"5","name":"Lias","ts":"2018-10-10 00:00:00","alert_level_id":"5"}
  */
  public function alert_level($bgy_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['bgy_alert'] = $this->get_alert_level($bgy_id, $timestamp);

    if (empty($data['bgy_alert'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['bgy_alert']);  
    }
  }

  public function get_alert_level($bgy_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data = $this->barangay_model->get_alert_level($bgy_id, $timestamp);

    return $data;  
  }

  public function is_recovering($bgy_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $current_alert = $this->get_alert_level($bgy_id, $timestamp);

    if ($current_alert["level"] <= 2) {
      $data['severe_alert_count'] = $this->barangay_model->get_previous_severe_alerts_count($bgy_id, $timestamp);

      if ($data['severe_alert_count'] > 1) {
        echo json_encode(true);
      } 
      else {
        echo json_encode(false);
      }
      
    } else {
      echo json_encode(false);
    }
  }

  public function flood_level($bgy_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['bgy_flood'] = $this->barangay_model->get_flood_level($bgy_id, $timestamp);

    if (empty($data['bgy_flood'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['bgy_flood']);  
    }
  }

  // API for barangay basic info
  // ex URL: http://localhost/barangay/info/9
  /*
    ex output:

    {"id":"9","municipality_id":"1","name":"Poblacion 1st","full_address":null,
    "num_families":"332","population_total":"1661",
    "population_vulnerable":"714","last_updated_ts":"2018-08-09 11:41:05"}
  */
  public function info($bgy_id=1) {
    $data['bgy_info'] = $this->barangay_model->get_basic_info($bgy_id);

    if (empty($data['bgy_info'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['bgy_info']);  
    }
  }

  public function shelters($bgy_id=1) {
    $data = $this->barangay_model->get_shelters($bgy_id);

    if (empty($data)) {
      show_404();
      return;
    }
    else {
      echo json_encode($data);  
    }
  }
}