<?php
class Messages extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('messages_model');
    $this->load->helper('url_helper');
  }

  public function index() {
    $data['title'] = 'Messages Index Page';
    $this->load->view('messages/index', $data);
  }

  public function facebook($municipality_id=1) {
    $data['facebook'] = $this->messages_model->get_facebook_messages($municipality_id);

    if (empty($data['facebook'])) {
      show_404();
    }
    else {
      echo json_encode($data['facebook']);
    }
  }

  public function twitter($municipality_id=1) {
    $data['twitter'] = $this->messages_model->get_twitter_messages($municipality_id);

    if (empty($data['twitter'])) {
      show_404();
    }
    else {
      echo json_encode($data['twitter']);
    }
  }

}