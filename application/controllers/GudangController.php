<?php


class GudangController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("gudangmodels", "dm");
      $this->load->model("satuanmodels", "sm");
      is_login("gudang");
   }
   public function index()
   {
      $data["gudang"] = $this->dm->get_all();
      $data["satuan"] = $this->sm->get_all();
      $this->main_libraries->innerview("gudangsatuan_view", $data);
   }

   public function add()
   {
      $this->dm->create($this->input->post());
      $this->session->set_flashdata("message", "Data telah ditambahkan.");
      redirect(base_url("gudangcontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->dm->perbarui($id,$data);
      $this->session->set_flashdata("message","Data berhasil diperbarui.");
      redirect(base_url("gudangcontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->dm->delete($id);
   }
}
