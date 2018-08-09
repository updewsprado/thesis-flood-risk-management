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

  // API for weather
  public function weather($municipality_id=1, $date_end=null, $date_start=null) {
    $data['weather'] = $this->municipality_model->get_weather($municipality_id);

    if (empty($data['weather'])) {
      show_404();
    }
    else {
      echo json_encode($data['weather']);
    }
  }

}