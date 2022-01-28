<?php


class DistributorController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("distributormodels", "dm");
   }
   public function index()
   {
      $data["distributor"] = $this->dm->get_all();
      $this->main_libraries->innerview("distributor_view", $data);
   }
   public function action($params)
   {
      $data["action"] = strtolower($params);
      if ($params == "edit") {
         echo 1;
      } 
      $this->main_libraries->innerview("distributor_form", $data);
   }
}
