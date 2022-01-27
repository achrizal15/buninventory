<?php

class ProdukController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->model("Produkmodels", "pm");
   }
   public function index($params = "view", $id = "")
   {
      if ($params == "view") {
         $view = "produk_view";
         $data["produk"] = $this->pm->get_all();
         $this->main_libraries->innerview($view, $data);
      } elseif ($params == "add") {
         $view = "produk_form";
         $data["produk"] = $this->pm->get();
      } elseif ($params == "edit") {
         // if ($id == "") show_404();
         $view = "produk_form";
         $data["produk"] = $this->pm->get($id);
      } else {
         show_404();
      }
      $this->main_libraries->innerview($view, $data);
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->pm->delete($id);
   }
}
