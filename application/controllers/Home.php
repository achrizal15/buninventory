<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->model("roleaksesmodels", "ram");
		is_login("home");
	}
	public function index()
	{
		$this->load->view("templates/header");
		$this->load->view('home');
		$this->load->view("templates/footer");
	}
}
