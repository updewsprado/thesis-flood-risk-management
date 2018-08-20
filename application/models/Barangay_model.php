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
    $query_text = '
        SELECT binfo.id, binfo.name, balert.ts, balert.alert_level_id
        FROM alert_level_history_barangay as balert
        INNER JOIN barangay_basic_info as binfo
        ON binfo.id=balert.barangay_id
        WHERE balert.barangay_id=' . $id . ' AND balert.ts="' . $timestamp . '"';
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  // Get flood and hazard scores of ALL barangays
  public function get_flood_and_hazard_scores_all($timestamp=null) {
    // TODO: Add timestamp range to the query
    $query_text = '
      SELECT bh.barangay_id, bbi.name, bh.ts, fll.score as flood_score, bh.score as hazard_score
      FROM barangay_basic_info as bbi, barangay_hazards as bh, 
          barangay_flood_levels as bfl, flood_level_lut as fll
      WHERE bh.barangay_id = bfl.barangay_id
      AND bbi.id = bh.barangay_id
      AND bfl.flood_level_id = fll.id
      AND bh.ts = bfl.ts  
      ORDER BY bh.barangay_id ASC, bh.ts ASC
    ';
    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  // Get exposure, vulnerability and coping capacity of ALL barangays
  public function get_evc_all($timestamp=null) {
    // TODO: Add timestamp range to the query
    $query_text = '
      SELECT brp.barangay_id, bbi.name, brp.exposure, brp.vulnerability, brp.coping_capacity
      FROM barangay_basic_info as bbi, barangay_risk_profiles as brp
      WHERE bbi.id = brp.barangay_id
      ORDER BY bbi.name ASC
    ';
    $query = $this->db->query($query_text);
    return $query->result_array();
  }

}