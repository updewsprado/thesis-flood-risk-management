<?php
class Municipality_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function delete_alerts() {
    return $this->db->empty_table('alert_level_history_municipality');
  }

  public function get_basic_info($id=1) {
    $query_text = 'SELECT * FROM municipality_basic_info WHERE id=' . $id;
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  public function get_weather($id=1, $timestamp=null) {
    $query_text = 'SELECT * FROM weather WHERE municipality_id=' . $id .
        ' AND ts="' . $timestamp . '"';

    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  public function get_weather_range($id=1, $date_end=null, $date_start=null) {
    $query_text = 'SELECT * FROM weather WHERE municipality_id=' . $id;
    
    // TODO: query composition based on date variables

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  // TODO: Get all barangays under the municipality
  public function get_barangays_of_municipality($id=1) {
    $query_text = '
        SELECT bbi.id, bbi.name, bbi.num_families as families, 
            bbi.population_total as population,
            bbi.population_vulnerable as vulnerable,
            brp.exposure, brp.vulnerability,
            brp.coping_capacity as capacity
        FROM barangay_basic_info as bbi, barangay_risk_profiles as brp
        WHERE bbi.id = brp.barangay_id
        AND bbi.municipality_id = ' . $id;

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  // Get alert level of the municipality
  public function get_alert_level($id=1, $timestamp=null) {
    $query_text = '
        SELECT minfo.id, minfo.name, minfo.full_address, malert.ts, malert.alert_level_id as level,
            alut.alert_desc as adesc
        FROM alert_level_history_municipality as malert,
            municipality_basic_info as minfo,
            alert_levels_lut as alut
        WHERE minfo.id=malert.municipality_id
        AND alut.level = malert.alert_level_id
        AND malert.municipality_id=' . $id . ' AND malert.ts="' . $timestamp . '"';
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

  public function get_previous_severe_alerts_count($id=1, $timestamp=null) {
    $query_text = '
      SELECT * FROM alert_level_history_municipality 
      WHERE municipality_id=' . $id .
      ' AND alert_level_id >= 4 AND ts<"' . $timestamp . '"';

    $query = $this->db->query($query_text);
    return $query->num_rows();
  }

  public function insert_batch_alerts($alerts) {
    //  Necessary fields to insert (4): id, ts, municipality_id, alert_level_id
    $data = [];
    $length = count($alerts);

    $ctr = 0;
    foreach ($alerts as $alert) {
      $data[$ctr] = array(
        // 'id' => $ctr,
        'ts' => $alert['ts'],
        'municipality_id' => 1,
        'alert_level_id' => $alert['level']
      );
      $ctr++;
    }

    return $this->db->insert_batch('alert_level_history_municipality', $data);
  }

}