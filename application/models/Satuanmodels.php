<?php

class Satuanmodels extends CI_Model
{
   public function get_all()
   {
      $this->db->select("*");
      $this->db->from("satuan");
      $this->db->order_by("nama", "asc");
      return $this->db->get()->result();
   }
   
   public function create($data)
   {
      $this->db->insert("satuan",$data);
   }
   public function perbarui($id, $data)
   {
      $this->db->update("satuan", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function delete($id)
   {
      $this->db->delete("satuan", ["id" => $id]);
      return $this->db->affected_rows();
   }

}
