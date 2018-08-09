<?php
class Barangay extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('barangay_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Barangay Index Page';
    $this->load->view('barangay/index', $data);
  }

  // API for getting the alert level of a barangay
  public function alert_level($bgy_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);

    $data['bgy_alert'] = $this->barangay_model->get_alert_level($bgy_id, $timestamp);

    if (empty($data['bgy_alert'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['bgy_alert']);  
    }
  }

  // API for barangay basic info
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

}