<?php
class Barangay_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_basic_info($id=1) {
    $query_text = 'SELECT * FROM barangay_basic_info WHERE id=' . $id;
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  // TODO: Get alert levels of the barangay
  public function get_alert_levels($id=1, $date_end=null, $date_start=null) {

  }

}