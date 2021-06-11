<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

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
		$this->load->model('M_rekap');
	}	
	public function index()
	{
		$data=array(
			"title"=>'Cetak Rekapitulasi SPPD Dalam Daerah',
			"aktif"=>"rekap",
			"program"=>$this->M_rekap->getprogram(),
			"kegiatan"=>$this->M_rekap->getkegiatan(),
			"pegawai"=>$this->M_rekap->getpegawai(),
			"content"=>"rekap/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Rekapitulasi SPPD Dalam', site_url('Rekap'));
		$this->load->view('template',$data);
	}
	public function cetakrekap()
	{
		$skpd = $this->session->userdata('skpd');
		$data['title']= 'Cetak Rekapitulasi SPPD Dalam Daerah';
		$data['program']= $_POST['program'];
		$data['kegiatan']= $_POST['kegiatan'];
		$data['dari']= $_POST['tgl_awal'];
		$data['sampai']= $_POST['tgl_akhir'];
		$data['total']=$this->M_rekap->total();
		$data['all']=$this->M_rekap->all();
		$data['skpd']=$this->M_rekap->skpd($skpd);
		$this->pdf->setPaper('legal', 'landscape');
		$this->pdf->filename = "Cetak-REKAP-SPPD-Dalam-DKPP.pdf";
		$this->pdf->load_view('rekap/cetak', $data);
	}
}