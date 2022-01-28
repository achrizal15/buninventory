<?php


class SatuanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("satuanmodels", "sm");
   }
   public function index()
   {
     redirect(base_url("gudangcontroller"));
   }

   public function add()
   {
      $this->sm->create($this->input->post());
      $this->session->set_flashdata("message_satuan", "Data telah ditambahkan.");
      redirect(base_url("gudangcontroller"));
   }
   public function edit()
   {
      $id = $this->input->post("id");
      $data = $this->input->post();
      unset($data["id"]);
      $this->sm->perbarui($id,$data);
      $this->session->set_flashdata("message_satuan","Data berhasil diperbarui.");
      redirect(base_url("gudangcontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->sm->delete($id);
   }
}
