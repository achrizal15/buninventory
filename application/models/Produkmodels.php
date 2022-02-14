<?php

class Produkmodels extends CI_Model
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
   public function total_produk()
   {
      $this->db->select("*, SUM(qty) as total_produk");
      $this->db->from("produk");
      return   $this->db->get()->row();
   }
   public function get_all($gudang = "all", $satuan = "all")
   {
      $alias = [
         ["table" => "produk", "alias" => "p"],
         ["table" => "gudang", "alias" => "g"],
         ["table" => "satuan", "alias" => "s"],
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("produk as p");
      $this->db->join("gudang as g", "g.id=p.gudang_id", "left");
      $this->db->join("satuan as s", "s.id=p.satuan_id", "left");
      if ($gudang != "all" && $gudang != "") {
         $this->db->where("g.nama", $gudang);
      }
      if ($satuan != "all" && $satuan != "") {
         $this->db->where("s.nama", $satuan);
      }
      return $this->db->get()->result();
   }
   public function get_all_under_10($from, $to)
   {
      $this->db->select("*");
      $this->db->from("produk");
      $this->db->where("qty < 24");
      if ($from != null && $to != null) {
         $this->db->where("created_at >", date("Y-m-d", strtotime($from)));
         $this->db->where("created_at <", date("Y-m-d H:i:s", strtotime($to . " 23:59:59")));
      }
      return $this->db->get()->result();
   }
   public function delete($id)
   {
      $this->db->delete("produk", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $this->db->select("*");
      $this->db->from("produk");
      $this->db->where("id", $id);
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
      $this->db->update("produk", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("produk", $data);
      return $this->db->affected_rows();
   }
}
