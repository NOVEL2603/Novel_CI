<?php
class M_Novel extends CI_Model {
  public function get(){
    return $this->db->get('bio')->result();
  }
}