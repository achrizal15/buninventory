<?php

class Gudangmodels extends CI_Model
{
   public function get_all()
   {
      $this->db->select("*");
      $this->db->from("gudang");
      $this->db->order_by("nama", "asc");
      return $this->db->get()->result();
   }
}
