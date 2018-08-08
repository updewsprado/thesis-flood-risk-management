<?php
class Narratives_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_municipality_actions() {
    $query = $this->db->get('action_board_narrative_municipality');
    return $query->result_array();
  }

  public function get_barangay_actions() {
    $query = $this->db->get('action_board_narrative_barangay');
    return $query->result_array();
  }

  public function get_barangay_risk_factors() {
    $query = $this->db->get('barangay_risk_factor_narratives');
    return $query->result_array();
  }

}