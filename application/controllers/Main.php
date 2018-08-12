<?php
class Main extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('main/index');
  }

  public function data_admin() {
    $this->load->view('main/data_admin');
  }

}