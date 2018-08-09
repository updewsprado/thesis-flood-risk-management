<?php
class Messages extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // $this->load->model('messages_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Messages Index Page';
    $this->load->view('messages/index', $data);
  }

}