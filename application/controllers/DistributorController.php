<?php 


class DistributorController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->model("Produkmodels", "pm");
      $this->load->model("Gudangmodels", "gm");
      $this->load->model("Satuanmodels", "sm");
      $this->load->library('session');
   }
public function index(){
   echo 1;
}

}
