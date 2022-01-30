<?php

class Authmodels extends CI_Model
{
   public function setAliasColumn($column, $alias)
   {
      $column =   $this->db->list_fields($column);
      $result = [];
      foreach ($column as $key) {
         $result[] = $alias . "." . $key . " AS " . $alias . $key;
      }
      return $result;
   }
   public function get_all()
   {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->order_by("created_at","desc");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("user", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($where = [])
   {
      $this->db->select("*");
      $this->db->from("user");
      $this->db->where($where);
      return $this->db->get()->row();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("produk");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
   public function perbarui($id, $data)
   {
      $this->db->update("user", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("user", $data);
      return $this->db->affected_rows();
   }
}
