<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
    	parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$config['divider'] = ' » ';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
		$this->load->model('M_dashboard');
	}
	public function index()
	{
		$data=array(
			"title"=>'Selamat Datang Di Aplikasi AREP LUNGEU',
			"aktif"=>"dashboard",
			"dalampending"=>$this->M_dashboard->dalampending(),
			"dalamselesai"=>$this->M_dashboard->dalamselesai(),
			"luarpending"=>$this->M_dashboard->luarpending(),
			"luarselesai"=>$this->M_dashboard->luarselesai(),
			"uraian"=>$this->M_dashboard->uraian(),
			"total_realisasi_dalam"=>$this->M_dashboard->total_realisasi_dalam(),
			"total_realisasi_luar"=>$this->M_dashboard->total_realisasi_luar(),
			"total_pagu_dalam"=>$this->M_dashboard->total_pagu_dalam(),
			"total_pagu_luar"=>$this->M_dashboard->total_pagu_luar(),
			"content"=>"dashboard/index.php",
		);
		$this->breadcrumb->append_crumb('Dashboard', site_url('Dashboard'));
		$this->load->view('dashboard',$data);
	}
}
