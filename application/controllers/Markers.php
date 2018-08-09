<?php
class Markers extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    $this->load->model('markers_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Markers Index Page';
    $this->load->view('markers/index', $data);
  }

  // API get all marker levels at specified time
  public function levels($timestamp="2014-09-19 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['marker_levels'] = $this->markers_model->get_marker_levels_all($timestamp);

    if (empty($data['marker_levels'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['marker_levels']);  
    }
  }

}