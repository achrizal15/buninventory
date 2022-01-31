<?php


class UserController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library(["main_libraries",'session',"form_validation"]);
      $this->load->model("usermodels", "um");
      $this->load->model("rolemodels", "rm");
      is_login("user");
   }
   public function index()
   {
      $data["user"] = $this->um->get_all();
      $this->main_libraries->innerview("user_view", $data);
   }
   public function action($params = "add", $id="")
   {
      $data["aksi"] = strtolower($params);
      $data["role"]=$this->rm->get_all();
      if ($params == "edit") {
         $data["user"] = $this->um->get($id);
         if (!$data["user"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("user_form", $data);
   }
   public function add()
   {
      // echo json_encode($this->input->post());
      $rules = [
         ["field" => "nama", "label" => "Nama", "rules" => "required",],
         ["field" => "email", "label" => "Email", "rules" => "required|is_unique[user.email]"],
      ];
      $this->form_validation->set_rules($rules);
      if ($this->form_validation->run() != false) {
         $data = $this->input->post();
         $data["role_id"] = $this->input->post("role_id");
         $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
         $this->um->create($data);
         $this->session->set_flashdata("message","Data ditambahkan");
         redirect(base_url("usercontroller"));
      } else {
         $this->session->set_flashdata("message",validation_errors());
        redirect(base_url("usercontroller/action/add"));
      }
   }
   public function edit()
   {
      $password_baru=$this->input->post("password");
      $id = $this->input->post("id");
      $data = $this->input->post();
      if($password_baru!=null){
         $data["password"]=password_hash($password_baru,PASSWORD_DEFAULT);
      }else{
         unset($data["password"]);
      }
      unset($data["id"]);
      $this->um->perbarui($id,$data);
      $this->session->set_flashdata("message","Data berhasil diperbarui.");
      redirect(base_url("usercontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->um->delete($id);
   }
}
