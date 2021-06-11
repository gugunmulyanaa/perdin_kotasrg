<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_luar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$this->breadcrumb->initialize($config);
		$this->load->library('Pdf');
        no_access();
		$this->load->model('M_rekap_luar');
	}	
	public function index()
	{
		$data=array(
			"title"=>'Cetak Rekapitulasi SPPD Luar Daerah',
			"aktif"=>"rekapluar",
			"program"=>$this->M_rekap_luar->getprogram(),
			"kegiatan"=>$this->M_rekap_luar->getkegiatan(),
			"pegawai"=>$this->M_rekap_luar->getpegawai(),
			"content"=>"rekap_luar/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Rekapitulasi SPPD Luar', site_url('Rekap_luar'));
		$this->load->view('template',$data);
	}
	public function cetakrekap()
	{
		$skpd = $this->session->userdata('skpd');
		$data['title']= 'Cetak Rekapitulasi SPPD Luar Kota';
		$data['program']= $_POST['program'];
		$data['kegiatan']= $_POST['kegiatan'];
		$data['dari']= $_POST['tgl_awal'];
		$data['sampai']= $_POST['tgl_akhir'];
		$data['total']=$this->M_rekap_luar->total();
		$data['all']=$this->M_rekap_luar->all();
		$data['skpd']=$this->M_rekap_luar->skpd($skpd);
		$this->pdf->setPaper('legal', 'landscape');
		$this->pdf->filename = "Cetak-REKAP-SPPD-Luar-DKPP.pdf";
		$this->pdf->load_view('rekap_luar/cetak', $data);
	}
}