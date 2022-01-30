<?php
class RoleController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("rolemodels", "rm");
      $this->load->model("roleaksesmodels", "ram");
      is_login("user");
   }
   public function index()
   {
      $data["akses"] = $this->rm->get_all_akses();
      $data["role"] = $this->rm->get_all();
      $this->main_libraries->innerview("role_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data["aksi"] = strtolower($params);
      $data["akses"] = $this->rm->get_all_akses();
      if ($params == "edit") {
         $data["role"] = $this->rm->get($id);
         if (!$data["role"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("role_form", $data);
   }
   public function add()
   {
      $role_akses = $this->input->post("role_akses");
      $this->rm->create(["nama"=>$this->input->post("nama")]);
     $id_role= $this->db->insert_id();
      if ($role_akses) {
         foreach ($role_akses as $key => $value) {
            $data = ["role_id" => $id_role, "akses_id" => $value];
            $this->ram->add($data);
         }
      }
      $this->session->set_flashdata("message", "Data telah ditambahkan.");
      redirect(base_url("rolecontroller"));
   }
   public function edit()
   {
      $role_akses = $this->input->post("role_akses");
      $this->db->delete("role_akses", ["role_id" => $this->input->post("id")]);

      if ($role_akses) {
         foreach ($role_akses as $key => $value) {
            $data = ["role_id" => $this->input->post("id"), "akses_id" => $value];
            $this->ram->add($data);
         }
      }
      $this->rm->perbarui($this->input->post("id"),["nama"=>$this->input->post("nama")]);
      $this->session->set_flashdata("message", "Data berhasil diperbarui.");
      redirect(base_url("rolecontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->rm->delete($id);
   }
}
