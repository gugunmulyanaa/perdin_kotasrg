<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

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
		$this->load->model('M_kalender');
	}
	public function index()
	{
		$data=array(
			"title"=>'Kalender Kegiatan SPPD',
			"aktif"=>"kalender",
			"content"=>"kalender/index.php",
		);
		$this->breadcrumb->append_crumb('Kalender SPPD', site_url('Calendar'));
		$this->load->view('kalender',$data);
	}
	public function load_data(){
		$skpd= $this->session->userdata('skpd');
		$event_data = $this->M_kalender->fetch_all($skpd);
		foreach($event_data as $row){
			if( $row['jenis'] == 1){
				$jenis = '#0073b7';
			}elseif( $row['jenis'] == 2 ){
				$jenis = '#f56954';
			};
$date = date_create($row['tanggal_pulang']);
			date_add($date, date_interval_create_from_date_string('1 days'));
			$end = date_format($date, 'Y-m-d');
			$data[] = array(
				
				'id' => $row['id'],
				'title' => getpegawai($row['pegawai_id']),
				'start' => $row['tanggal_pergi'],
				'end' => $end,
				'backgroundColor' => $jenis,
				'textColor' => '#fff'
			);
		}
		echo json_encode($data);
	}
}
