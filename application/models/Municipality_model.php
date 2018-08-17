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
    $query_text = 'SELECT name, population_vulnerable FROM barangay_basic_info';
    // $query_text += ' WHERE municipality_id=' . $id;
    // echo $query_text;

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

  // TODO: Get alert level of the municipality
  public function get_alert_level($id=1, $timestamp=null) {
    $query_text = 'SELECT minfo.id, minfo.name, malert.ts, malert.alert_level_id
        FROM alert_level_history_municipality as malert
        INNER JOIN municipality_basic_info as minfo
        ON minfo.id=malert.municipality_id
        WHERE malert.municipality_id=' . $id . ' AND malert.ts="' . $timestamp . '"';
    $query = $this->db->query($query_text);
    return $query->row_array();
  }

}