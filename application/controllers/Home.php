<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->model("roleaksesmodels", "ram");
		$this->load->model("produkmodels", "pm");
		$this->load->model("trstokmasukmodels", "tsm");
		$this->load->model("trstokkeluarmodels", "tsk");
		$this->load->library("main_libraries");
		is_login("home");
	}
	public function index()
	{
		$data["total_qty"]=$this->pm->total_produk();
		$data["total_produk"]=count($this->pm->get_all());
		$data["stok_in"]=count($this->tsm->get_all());
		$data["stok_out"]=count($this->tsk->get_all());
		$this->main_libraries->innerview("home",$data);
	}
}
