<?php
class Narratives extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('narratives_model');
    $this->load->helper('url_helper');
  }

  // ex URL: http://localhost/narratives
  /*
    ex output:

    Narratives Index Page
  */
  public function index() {
    $data['title'] = 'Narratives Index Page';
    $this->load->view('narratives/index', $data);
  }

  // ex URL: http://localhost/narratives/municipality_actions
  /*
    ex output:

    [{"id":"3","action":"Continuous Monitoring",
    "narrative":"Coordinate with Barangay Coordinator on ","last_updated_ts":"2018-08-05 17:35:02"},
    {"id":"4","action":"Start Recovery","narrative":"Recovery procedures shall commence.",
    "last_updated_ts":"2018-08-05 17:35:02"}]
  */
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

  // ex URL: http://localhost/narratives/barangay_actions
  /*
    ex output:

    [{"id":"4","action":"Ask LGU for Rescuers",
    "narrative":"Narrative for Ask LGU for Rescuers",
    "last_updated_ts":"2018-08-05 17:46:48"},
    {"id":"5","action":"Start Recovery",
    "narrative":"Narrative for Start Recovery",
    "last_updated_ts":"2018-08-05 17:47:23"}]
  */
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

  // ex URL: http://localhost/narratives/barangay_risk_factors
  /*
    ex output:

    [{"id":"4","alert_level_id":"4",
    "narrative":"Risk factor narrative for alert level 4",
    "last_updated_ts":"2018-08-10 09:27:11"},
    {"id":"5","alert_level_id":"5",
    "narrative":"Risk factor narrative for alert level 5",
    "last_updated_ts":"2018-08-10 09:27:11"}]
  */
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