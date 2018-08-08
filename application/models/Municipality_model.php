<?php
class Municipality_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_basic_info($id=1) {
    $query_text = 'SELECT * FROM municipality_basic_info WHERE id=' . $id;
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  public function get_weather($id=1, $date_end=null, $date_start=null) {
    $query_text = 'SELECT * FROM weather WHERE municipality_id=' . $id;
    
    // TODO: query composition based on date variables

    $query = $this->db->query($query_text);
    return $query->row_array();
  }

}