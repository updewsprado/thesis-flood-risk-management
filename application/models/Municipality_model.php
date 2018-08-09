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
    return $query->result_array();
  }

  // TODO: Get all barangays under the municipality
  public function get_barangays_of_municipality($id=1) {
    $query_text = 'SELECT name, population_vulnerable FROM barangay_basic_info';
    // $query_text += ' WHERE municipality_id=' . $id;
    // echo $query_text;

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  // TODO: Get alert levels of the municipality
  public function get_alert_levels($id=1, $date_end=null, $date_start=null) {
  }

}