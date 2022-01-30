<?php
class Roleaksesmodels extends CI_Model
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
   public function get_roles_akses($role_id, $akses_id=null)
   {

      $alias = [
         ["table" => "role_akses", "alias" => "ra"],
         ["table" => "role", "alias" => "r"],
         ["table" => "akses", "alias" => "a"],
      ];
      $select = "";
      foreach ($alias as $key) {
         $select .= implode(',', $this->setAliasColumn($key['table'], $key['alias'])) . ",";
      }
      $this->db->select($select);
      $this->db->from("role_akses ra");
      $this->db->join("role r","r.id=ra.role_id");
      $this->db->join("akses a","a.id=ra.akses_id");
      $this->db->where("ra.role_id", $role_id);
      if ($akses_id != null) {
         $this->db->where("a.nama", $akses_id);
      }
      return $this->db->get()->row();
   }
   public function add($data){
      $this->db->insert("role_akses",$data);
   }
}
