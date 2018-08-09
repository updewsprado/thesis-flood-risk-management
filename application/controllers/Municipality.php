<?php
class Municipality extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('municipality_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Municipality Index Page';
    $this->load->view('municipality/index', $data);
  }

  // API for getting the alert level of a municipality
  public function alert_level($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['municipality_alert'] = $this->municipality_model->get_alert_level($municipality_id, $timestamp);

    if (empty($data['municipality_alert'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['municipality_alert']);  
    }

  }

  // API for getting all barangays under the municipality
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

  // TODO: Generate municipality alert levels
  public function generate_alerts($municipality_id=1) {
    // TODO: generate barangay alert levels
    // TODO: generate the municipality alert level from the sum of barangay levels
  }

  // API for municipality basic info
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

  // API for weather from a date range
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