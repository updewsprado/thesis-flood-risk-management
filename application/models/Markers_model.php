<?php
class Markers_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_marker_levels_all($timestamp=null) {
    $query_text = 'SELECT rfm.name, ml.marker_id, ml.ts, rfm.marker_type, ml.height 
        FROM marker_levels as ml, river_flood_markers as rfm 
        WHERE ml.marker_id=rfm.id
        AND ml.ts="' . $timestamp . '"' .
        'ORDER BY ml.height desc, rfm.name desc';

    $query = $this->db->query($query_text);
    return $query->result_array();
  }

}