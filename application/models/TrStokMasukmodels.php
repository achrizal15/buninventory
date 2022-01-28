<?php

class TrStokMasukmodels extends CI_Model
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
      $table=[
         ["table"=>"tr_stok_masuk","alias"=>"tr"],
         ["table"=>"produk","alias"=>"p"],
         ["table"=>"distributor","alias"=>"d"],
      ];
      $select="";
      foreach ($table as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("tr_stok_masuk tr");
      $this->db->join("produk p","tr.produk_id=p.id");
      $this->db->join("distributor d","tr.distributor_id=d.id");
      $this->db->order_by("tr.created_at", "desc");
      return $this->db->get()->result();
   }

   public function delete($id)
   {
      $this->db->delete("tr_stok_masuk", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $table=[
         ["table"=>"tr_stok_masuk","alias"=>"tr"],
         ["table"=>"produk","alias"=>"p"],
         ["table"=>"distributor","alias"=>"d"],
      ];
      $select="";
      foreach ($table as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("tr_stok_masuk tr");
      $this->db->join("produk p","tr.produk_id=p.id");
      $this->db->join("distributor d","tr.distributor_id=d.id");
      $this->db->where("tr.id", $id);
      return $this->db->get()->row();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("tr_stok_masuk");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
 
   public function perbarui($id, $data)
   {
      $this->db->update("tr_stok_masuk", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d", strtotime("now"));
      $this->db->insert("tr_stok_masuk", $data);
      return $this->db->affected_rows();
   }
}