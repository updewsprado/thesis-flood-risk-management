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

  // Get alert level of the barangay
  public function get_alert_level($id=1, $timestamp=null) {
    $query_text = 'SELECT binfo.id, binfo.name, balert.ts, balert.alert_level_id
        FROM alert_level_history_barangay as balert
        INNER JOIN barangay_basic_info as binfo
        ON binfo.id=balert.barangay_id
        WHERE balert.barangay_id=' . $id . ' AND balert.ts="' . $timestamp . '"';
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

}