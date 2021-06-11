<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_luar extends CI_Controller {
    function __construct()
	{
    	parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
        $this->load->model('M_validasi_luar');
	}	
    public function index()
	{
		$data=array(
			"title"=>'Validasi SPPD Luar Daerah',
			"aktif"=>"validasiluar",
			"sppd"=>$this->M_validasi_luar->getallbyuser(),
			"content"=>"validasi_luar/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Validasi SPPD Luar Daerah', site_url('validasi_luar'));
		$this->load->view('template',$data);
	}
	public function detail($id)
	{
		$keg=idkeg($id);
		$pagutotal=$this->M_validasi_luar->getpagu($keg);
		$pagubelanja=$this->M_validasi_luar->getpagubelanja($id);
		$pagudigunakan=$this->M_validasi_luar->getusepagu($keg);
		$pagupersen= $pagudigunakan/$pagutotal * 100;
		$data=array(
			"title"=>'Rincian Kegiatan SPPD',
			"aktif"=>"validasiluar",
			"id" => $id,
			"pagutotal" => $pagutotal,
			"pagudigunakan" => $pagudigunakan,
			"pagubelanja" => $pagubelanja,
			"pagupersen" => $pagupersen,
			"content"=>"validasi_luar/detail.php",
			"kwitansi"=>$this->M_validasi_luar->getdetail($id),
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Validasi SPPD Luar Daerah', site_url('Validasi_luar'));
		$this->breadcrumb->append_crumb('Rincian SPPD', site_url('Validasi_luar/detail'));
		$this->load->view('template',$data);
	}

	public function validasi($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Divalidasi Hubungi Diskominfo Kota Serang");
			redirect('validasi_luar');
		}else{
			$data2=array(
				"status"=> 6
			);
			$data3=array(
				"validasi"=> 2
			);

			$this->db->where('id', $id);
			$this->db->update('sppd', $data2);
			$this->db->where('sppd_id', $id);
			$this->db->update('transaksi_sppd', $data3);
			$this->session->set_flashdata('sukses', "Data Berhasil Di Validasi, Biaya Masuk Ke Realisasi");
			redirect('Validasi_luar');
		}
	}
}