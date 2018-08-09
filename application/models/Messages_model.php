<?php
class Messages_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_facebook_messages($municipality_id=1, $date_end=null, $date_start=null) {
    // TODO: query composition based on date variables
    $query_text = 'SELECT * FROM messages_facebook WHERE municipality_id=' . $id;
    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  public function get_twitter_messages($municipality_id=1, $date_end=null, $date_start=null) {
    // TODO: query composition based on date variables
    $query_text = 'SELECT * FROM messages_twitter WHERE municipality_id=' . $id;
    $query = $this->db->query($query_text);
    return $query->result_array();
  }

}