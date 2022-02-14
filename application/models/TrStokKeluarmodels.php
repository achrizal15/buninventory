<?php

class TrStokKeluarmodels extends CI_Model
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
   public function get_all($key_dari="",$key_sampai="")
   {
      $table=[
         ["table"=>"tr_stok_keluar","alias"=>"tr"],
         ["table"=>"produk","alias"=>"p"],
      ];
      $select="";
      foreach ($table as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("tr_stok_keluar tr");
      $this->db->join("produk p","tr.produk_id=p.id");
      if($key_dari!="" && $key_sampai!=""){
         $this->db->where("tr.created_at >=",$key_dari);
         $this->db->where("tr.created_at <=",date("Y-m-d H:i:s",strtotime($key_sampai." 23:59:59")));
      }
      $this->db->order_by("tr.created_at", "DESC");
      return $this->db->get()->result();
   }
   public function get_total_stok_out($produk,$from="",$to=""){
      $this->db->select("*, SUM(qty) as qty_out");
      $this->db->from("tr_stok_keluar");
      $this->db->where("produk_id",$produk);
      if ($from != null && $to != null) {
         $this->db->where("created_at >", $from);
         $this->db->where("created_at <=", date("Y-m-d H:i:s", strtotime($to . " 23:59:59")));
      }
      $this->db->group_by("produk_id");
      return $this->db->get()->row();
   }
   public function delete($id)
   {
      $this->db->delete("tr_stok_keluar", ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function get($id = "")
   {
      $table=[
         ["table"=>"tr_stok_keluar","alias"=>"tr"],
         ["table"=>"produk","alias"=>"p"],
      ];
      $select="";
      foreach ($table as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("tr_stok_keluar tr");
      $this->db->join("produk p","tr.produk_id=p.id");
      $this->db->where("tr.id", $id);
      return $this->db->get()->row();
   }
   public function get_last()
   {
      $this->db->select("*");
      $this->db->from("tr_stok_keluar");
      $this->db->order_by("id", "desc");
      return $this->db->get()->row();
   }
 
   public function perbarui($id, $data)
   {
      $this->db->update("tr_stok_keluar", $data, ["id" => $id]);
      return $this->db->affected_rows();
   }
   public function create($data)
   {
      $data["created_at"] = date("Y-m-d H:i:s", strtotime("now"));
      $this->db->insert("tr_stok_keluar", $data);
      return $this->db->affected_rows();
   }
}
