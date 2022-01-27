<?php

class ProdukController extends CI_Controller
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
   public function index($params = "view", $id = "")
   {
      if ($params == "add") {
         $view = "produk_form";
         $data["aksi"] = $params;
         $data["kodeproduk"] = $this->pm->get_last();
         $data["gudang"] = $this->gm->get_all();
         $data["satuan"] = $this->sm->get_all();
      } elseif ($params == "edit") {
       
         $data["aksi"] = $params;
         $view = "produk_form";
         $data["gudang"] = $this->gm->get_all();
         $data["produk"] = $this->pm->get($id);
         $data["satuan"] = $this->sm->get_all();
         if (!$data["produk"]) show_404();
      } else {
         $view = "produk_view";
         $data["produk"] = $this->pm->get_all();         
      }
      $this->main_libraries->innerview($view, $data);
   }
   public function add()
   {
      $data = [
         "nama" => $this->input->post("nama"),
         "kode" => $this->input->post("kode"),
         "gudang_id" => $this->input->post("gudang"),
         "satuan_id" => $this->input->post("satuan"),
         "stok_awal" => $this->input->post("stok_awal"),
         "harga_beli" => $this->input->post("harga_beli"),
         "harga_jual" => $this->input->post("harga_jual"),
         "gambar" => "default.png",
      ];
      if ($_FILES["gambar"]["name"]) {
         $this->main_libraries->uploadImage("images/products");
         $this->upload->do_upload('gambar');
         $data["gambar"] = $this->upload->data("file_name");
      }
      $this->pm->create($data);
      $this->session->set_flashdata('message', 'Produk baru telah ditambahkan.');
      return redirect(base_url("produkcontroller"));
   }
   public function edit(){
      $data = [
         "nama" => $this->input->post("nama"),
         "kode" => $this->input->post("kode"),
         "gudang_id" => $this->input->post("gudang"),
         "satuan_id" => $this->input->post("satuan"),
         "stok_awal" => $this->input->post("stok_awal"),
         "harga_beli" => $this->input->post("harga_beli"),
         "harga_jual" => $this->input->post("harga_jual"),
      ];
      $id=$this->input->post("id");
      if ($_FILES["gambar"]["name"]) {
         $this->main_libraries->uploadImage("images/products");
         $this->upload->do_upload('gambar');
         $data["gambar"] = $this->upload->data("file_name");
      }
      $this->pm->perbarui($id,$data);
      $this->session->set_flashdata('message', 'Produk telah diperbarui.');
      return redirect(base_url("produkcontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      echo $this->pm->delete($id);
   }
}
