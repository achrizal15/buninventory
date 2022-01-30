<?php


class DistributorController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("distributormodels", "dm");
      is_login("distributor");
   }
   public function index()
   {
      $data["distributor"] = $this->dm->get_all();
      $this->main_libraries->innerview("distributor_view", $data);
   }
   public function action($params = "add", $id="")
   {
      $data["aksi"] = strtolower($params);
      if ($params == "edit") {
         $data["distributor"] = $this->dm->get($id);
         if (!$data["distributor"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("distributor_form", $data);
   }
   public function add()
   {
      $this->dm->create($this->input->post());
      $this->session->set_flashdata("message", "Distributor telah ditambahkan.");
      redirect(base_url("distributorcontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->dm->perbarui($id,$data);
      $this->session->set_flashdata("message","Data berhasil diperbarui.");
      redirect(base_url("distributorcontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->dm->delete($id);
   }
}
