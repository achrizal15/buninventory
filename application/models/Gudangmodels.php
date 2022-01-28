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
   public function create($data)
   {
      $this->db->insert("gudang",$data);
   }
   public function perbarui($id, $data)
   {
      $this->db->update("gudang", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function delete($id)
   {
      $this->db->delete("gudang", ["id" => $id]);
      return $this->db->affected_rows();
   }
}
