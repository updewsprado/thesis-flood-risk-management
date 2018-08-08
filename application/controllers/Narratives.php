<?php
class Narratives extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('narratives_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Narratives Index Page';
    $this->load->view('narratives/index', $data);
  }

  public function municipality_actions() {
    $data['municipality_actions'] = $this->narratives_model->get_municipality_actions();

    if (empty($data['municipality_actions'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['municipality_actions']);  
    }
  }

  public function barangay_actions() {
    $data['barangay_actions'] = $this->narratives_model->get_barangay_actions();

    if (empty($data['barangay_actions'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['barangay_actions']);  
    }
  }

  public function barangay_risk_factors() {
    $data['barangay_risk_factors'] = $this->narratives_model->get_barangay_risk_factors();

    if (empty($data['barangay_risk_factors'])) {
      show_404();
      return;
    }
    else {
      echo json_encode($data['barangay_risk_factors']);  
    }
  }
}