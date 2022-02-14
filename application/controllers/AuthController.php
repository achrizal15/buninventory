<?php

class AuthController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->model("authmodels", "am");
   }
   public function index()
   {
      redirect(current_url() . "/login");
   }
 
   public function login()
   {
      if($this->session->has_userdata("id")){
         redirect(base_url());
      }
      $this->main_libraries->innerview("login_view", [], true);
   }
 
   public function logout(){
      session_destroy();
      redirect(base_url("authcontroller"));
   }
   public function auth()
   {
      if($this->session->has_userdata("id")){
         redirect(base_url());
      }
      $email = $this->input->post("email");
      $password = $this->input->post("password");
      $user = $this->am->get(["email" => $email]);
      if (!$user) {
         $this->session->set_flashdata("message", "Login error");
         redirect(base_url("authcontroller/login"));
      } else {
         if (password_verify($password, $user->password)) {
            $user_data=[
               "id"=>$user->id,
               "role"=>$user->role_id,
               "nama"=>$user->nama,
               "email"=>$user->email
            ];
            $this->session->set_userdata($user_data);
            redirect(base_url());
         }else{
            $this->session->set_flashdata("message", "Password error");
            redirect(base_url("authcontroller/login"));
         }
      }
   }
}
