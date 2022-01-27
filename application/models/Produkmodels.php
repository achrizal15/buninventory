<?php

class Produkmodels extends CI_Model
{
   public function get_all()
   {
      $this->db->select("*");
      $this->db->from("produk");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("produk", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id="")
   {
      $this->db->select("*");
      $this->db->from("produk");
      $this->db->limit(1);
      $this->db->order_by("created_at","desc");
      return $this->db->get()->row();
   }
}
