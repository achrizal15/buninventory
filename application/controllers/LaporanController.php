<?php

class LaporanController extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library("main_libraries");
      $this->load->model("Produkmodels", "pm");
      $this->load->model("TrStokMasukmodels", "trm");
      $this->load->model("TrStokKeluarmodels", "tro");
      $this->load->model("Gudangmodels", "gm");
      $this->load->model("Satuanmodels", "sm");
      $this->load->library('session');
      is_login("laporan");
   }
   public function index()
   {
      $from = $this->input->get("dari");
      $to = $this->input->get("sampai");
      $key_gudang = $this->input->get("gudang-name");
      $data["gudang"] = $this->gm->get_all();
      $key_satuan = $this->input->get("satuan-name");
      $data["satuan"] = $this->sm->get_all();
      $produk = $this->pm->get_all( $key_gudang, $key_satuan);
      $laporan = [];
      foreach ($produk as $key => $value) {
         $in = $this->trm->get_total_stok_in($value->pid, $from, $to);
         $out = $this->tro->get_total_stok_out($value->pid, $from, $to);
         $laporan[$key]["in"] = $in ? $in->qty_in : 0;
         $laporan[$key]["out"] = $out ? $out->qty_out : 0;
         $laporan[$key]["total"] =  ($in ? $in->qty_in : 0) - ($out ? $out->qty_out : 0);
         $laporan[$key]["produk"] = $value;
      }
      $data["laporan"] = $laporan;
      return $this->main_libraries->innerview("laporan_view", $data);
   }
}
