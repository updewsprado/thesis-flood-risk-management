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

  // API for weather
  public function weather($municipality_id=1, $date_end=null, $date_start=null) {
    $data['weather'] = $this->municipality_model->get_weather($municipality_id);

    echo "municipality: " . $municipality_id . ", end: " . $date_end . ", start: " . $date_start;

    if (empty($data['weather'])) {
      show_404();
    }
    else {
      echo json_encode($data['weather']);
    }
  }

}