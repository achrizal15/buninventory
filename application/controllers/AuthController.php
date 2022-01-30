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
   public function register()
   {
      $this->main_libraries->innerview("register_view", [], true);
   }
   public function login()
   {
      $this->main_libraries->innerview("login_view", [], true);
   }
   public function create()
   {
      $rules = [
         ["field" => "nama", "label" => "Nama", "rules" => "required",],
         ["field" => "email", "label" => "Email", "rules" => "required|is_unique[user.email]"],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() != false) {
         $data = $this->input->post();
         $data["role_id"] = 1;
         $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
         $this->am->create($data);
      } else {
         $this->main_libraries->innerview("register_view", [], true);
      }
   }
   public function cek(){
      echo json_encode($this->session->userdata());
   }
   public function logout(){
      session_destroy();
   }
   public function auth()
   {
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
            $this->session->set_flashdata("message", "Login error");
            redirect(base_url("authcontroller/login"));
         }
      }
   }
}
