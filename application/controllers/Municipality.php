<?php
class Municipality extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('municipality_model');
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

  // TODO: Generate municipality alert levels
  public function generate_alerts($municipality_id=1) {
    // TODO: generate barangay alert levels
    // TODO: generate the municipality alert level from the sum of barangay levels
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