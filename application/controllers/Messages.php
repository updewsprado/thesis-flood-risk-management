<?php
class Messages extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('messages_model');
    $this->load->helper('url_helper');
  }

  // ex URL: http://localhost/messages
  /*
    ex output:

    Messages Index Page
  */
  public function index() {
    $data['title'] = 'Messages Index Page';
    $this->load->view('messages/index', $data);
  }

  // ex URL: http://localhost/messages/facebook/1
  /*
    ex output:

    [{"id":"1","municipality_id":"1","ts":"2018-06-12 17:00:00",
    "sender":"MERALCO","message":"There will be power interruption in Tabing-ilog, Loma De Gato and Ibayo"},
    {"id":"2","municipality_id":"1","ts":"2018-06-12 17:00:00",
    "sender":"NAWASA","message":"Expect water supply to be muddy for the whole Marilao"}]
  */
  public function facebook($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);
    
    $data['facebook'] = $this->messages_model->get_facebook_messages($municipality_id, $timestamp);

    if (empty($data['facebook'])) {
      show_404();
    }
    else {
      echo json_encode($data['facebook']);
    }
  }

  // ex URL: http://localhost/messages/twitter/1
  /*
    ex output:

    [{"id":"1","municipality_id":"1","ts":"2018-07-12 19:35:00",
    "sender":"concerned citizen","message":"Wala pong kuryente dito sa may Abangan "},
    {"id":"2","municipality_id":"1","ts":"2018-07-12 19:35:00",
    "sender":"tambay","message":"Stranded na po kami dito sa may SM Marilao"}]
  */
  public function twitter($municipality_id=1, $timestamp="2018-10-10 00:00:00") {
    // Quick parsing of date input
    $timestamp = str_replace("%20"," ", $timestamp);
    $timestamp = str_replace("."," ", $timestamp);
    
    $data['twitter'] = $this->messages_model->get_twitter_messages($municipality_id, $timestamp);

    if (empty($data['twitter'])) {
      show_404();
    }
    else {
      echo json_encode($data['twitter']);
    }
  }

}