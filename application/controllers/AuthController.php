<?php 

class AuthController extends CI_Controller{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
   }
   public function index(){
      $this->main_libraries->innerview("register_view",[],true);
   }
}
?>