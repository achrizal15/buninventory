<?php


class TrStokKeluarController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->library('session');
      $this->load->model("distributormodels", "dm");
      $this->load->model("trstokkeluarmodels", "tsm");
      $this->load->model("produkmodels", "pm");
      is_login("stokkeluar");
   }
   public function index()
   {
      $key_dari = $this->input->get("dari");
      $key_sampai = $this->input->get("sampai");
      $data["tsm"] = $this->tsm->get_all($key_dari,$key_sampai);
      $this->main_libraries->innerview("tr_stok_keluar_view", $data);
   }
   public function action($params = "add", $id = "")
   {
      $data["aksi"] = strtolower($params);
      $data["produk"] = $this->pm->get_all();
      if ($params == "edit") {
         $data["stokin"] = $this->tsm->get($id);
         if (!$data["stokin"]) {
            show_404();
         }
      }
      $this->main_libraries->innerview("tr_stok_keluar_form", $data);
   }
   public function add()
   {
      $produk_id = $this->input->post("produk_id");
      $data = [
         "faktur" => $this->input->post("faktur"),
         "produk_id" => $produk_id,
         "kepada"=>$this->input->post("kepada"),
         "nama_kapal"=>$this->input->post("nama_kapal"),
         "stok_ahir"=>$this->input->post("stok_awal"),
         "qty" => $this->input->post("qty"),
         "catatan" => $this->input->post("catatan")
      ];
      $this->tsm->create($data);
      $this->pm->perbarui($produk_id, ["qty" => $this->input->post("stok_awal")]);
      $this->session->set_flashdata("message", "Data telah ditambahkan.");
      redirect(base_url("trstokkeluarcontroller"));
   }
   public function get_any($table, $id)
   {
      if ($table == "produk") {
         echo json_encode($this->pm->get($id));
      }
   }
   public function edit()
   {
      $produk_id = $this->input->post("produk_id");
      $data = [
         "faktur" => $this->input->post("faktur"),
         "produk_id" => $produk_id,
         "distributor_id" => $this->input->post("distributor_id"),
         "qty" => $this->input->post("qty"),
         "catatan" => $this->input->post("catatan")
      ];
      $this->tsm->perbarui($this->input->post("id"), $data);
      $this->pm->perbarui($produk_id, ["qty" => $this->input->post("stok_awal")]);
      $this->session->set_flashdata("message", "Data telah diperbarui.");
      redirect(base_url("trstokkeluarcontroller"));
   }
   public function delete()
   {
      $id = $this->input->post("id");
      $stokkeluar=$this->tsm->get($id);
      $produk=$this->pm->get($stokkeluar->trproduk_id);
      $this->pm->perbarui($produk->id,["qty"=>$produk->qty+$stokkeluar->trqty]);
      echo $this->tsm->delete($id);
   }
}
