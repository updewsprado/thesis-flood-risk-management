<?php
class Markers_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_marker_levels_all($timestamp=null) {
    $query_text = 'SELECT rfm.name, ml.marker_id, ml.ts, ml.height 
        FROM marker_levels as ml 
        INNER JOIN river_flood_markers as rfm 
        ON ml.marker_id=rfm.id WHERE ml.ts="' . $timestamp . '"' .
        'ORDER BY ml.height desc, rfm.name desc';

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

}