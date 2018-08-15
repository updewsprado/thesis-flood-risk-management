<?php
class Main extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('main/index');
  }

  public function angular_main() {
    $this->load->view('main/angular_main');
  }

  public function data_admin() {
    $this->load->view('main/data_admin');
  }

}