<?php
class Barangay_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function delete_alerts() {
    return $this->db->empty_table('alert_level_history_barangay');
  }

  public function get_basic_info($id=1) {
    $query_text = 'SELECT * FROM barangay_basic_info WHERE id=' . $id;
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  // Get alert level of the barangay
  public function get_alert_level($id=1, $timestamp=null) {
    $query_text = '
        SELECT binfo.id, binfo.name, balert.ts, balert.alert_level_id as level,
            alut.alert_desc as adesc
        FROM alert_level_history_barangay as balert, barangay_basic_info as binfo, 
            alert_levels_lut as alut
        WHERE binfo.id=balert.barangay_id
        AND alut.level = balert.alert_level_id
        AND balert.barangay_id=' . $id . ' AND balert.ts="' . $timestamp . '"';
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

  public function insert_batch_alerts($alerts) {
    //  Necessary fields to insert (4): id, ts, barangay_id, alert_level_id
    $data = [];
    $length = count($alerts);
    for ($i=0; $i < $length; $i++) { 
      $barangay = $alerts[$i];

      $data[$i] = array(
        // 'id' => $i,
        'ts' => $barangay['ts'],
        'barangay_id' => $barangay['barangay_id'],
        'alert_level_id' => $barangay['alert_level']
      );
    }

    return $this->db->insert_batch('alert_level_history_barangay', $data);
  }

}