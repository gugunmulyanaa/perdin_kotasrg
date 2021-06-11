<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	function __construct()
	{
    	parent::__construct();
		$this->load->library('Pdf');
        no_access();
		$this->load->model('M_cetak');
	}
	
	public function cetakspt($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		$nomor=getnomor($id);
		$satker=getsatker($id);
		$perihal=getperihal($id);
		if($status == 1){
			$data2=array(
				"status"=>2,
				"tgl_cetak"=>$_POST['tgl_cetak']
			);
			$data=array(
				"title"=>'Cetak SPT',
				"id" => $id,
				"kegiatan"=>$this->M_cetak->getkeg($id),
				"all"=>$this->M_cetak->all($id),
				"skpd"=>$this->M_cetak->skpd($skpd),
				"tgl_cetak"=>$_POST['tgl_cetak']
			);
			$this->db->where('id', $id);
			$this->db->update('sppd', $data2);
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Cetak-SPT-$skpd-$id.pdf";
			if($nomor == '' && $satker == '' && $perihal == ''){
				$this->pdf->load_view('cetak/cetak_spt', $data);
			}else{
				$this->pdf->load_view('cetak/cetak_spt_undangan', $data);
			}			
		}else{
		$data2=array(
			"tgl_cetak"=>$_POST['tgl_cetak']
		);
		$data=array(
			"title"=>'Cetak SPT',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"all"=>$this->M_cetak->all($id),
			"skpd"=>$this->M_cetak->skpd($skpd),
			"tgl_cetak"=>$_POST['tgl_cetak']
		);	
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-SPT-$skpd-$id.pdf";
		if($nomor == '' && $satker == '' && $perihal == ''){
			$this->pdf->load_view('cetak/cetak_spt', $data);
		}else{
			$this->pdf->load_view('cetak/cetak_spt_undangan', $data);
		}
		}	
	}

	public function cetaksptsetda($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		if($status == 1){
			$data2=array(
				"status"=>2,
				"tgl_cetak"=>$_POST['tgl_cetak']
			);
			$data=array(
				"title"=>'Cetak SPT Kepala Dinas',
				"id" => $id,
				"kegiatan"=>$this->M_cetak->getkeg($id),
				"all"=>$this->M_cetak->all($id),
				"setda"=>$this->M_cetak->setda(),
				"tgl_cetak"=>$_POST['tgl_cetak']
			);
			$this->db->where('id', $id);
			$this->db->update('sppd', $data2);
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Cetak-SPT-$skpd-$id.pdf";
			$this->pdf->load_view('cetak/cetak_sptsetda', $data);
		}else{
		$data2=array(
			"tgl_cetak"=>$_POST['tgl_cetak']
		);
		$data=array(
			"title"=>'Cetak SPT Kepala Dinas',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"all"=>$this->M_cetak->all($id),
			"setda"=>$this->M_cetak->setda(),
			"tgl_cetak"=>$_POST['tgl_cetak']
		);	
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-SPT-$id.pdf";
		$this->pdf->load_view('cetak/cetak_sptsetda', $data);
		}	
	}

	public function cetakkwitansi($id)
	{
		$skpd = $this->session->userdata('skpd');
		$spt = getspt($id);
		$status=getstatus($spt);
		if($status == 4){
			$data2=array(
				"status"=>5,
			);
		$data=array(
			"title"=>'Cetak Kwitansi',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($spt),
			"kwitansi"=>$this->M_cetak->getkwitansi($id),
			"skpd"=>$this->M_cetak->skpd($skpd),
		);
		$this->db->where('id', $spt);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Kwitansi.pdf";
		$this->pdf->load_view('cetak/cetakkwitansi', $data);
		}else{
			$spt = getspt($id);
			$data=array(
				"title"=>'Cetak Kwitansi',
				"id" => $id,
				"kegiatan"=>$this->M_cetak->getkeg($spt),
				"kwitansi"=>$this->M_cetak->getkwitansi($id),
				"skpd"=>$this->M_cetak->skpd($skpd),
			);
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Cetak-Kwitansi.pdf";
			$this->pdf->load_view('cetak/cetakkwitansi', $data);
		}
	}	
	public function cetakkwitansiluar($id)
	{
		$skpd = $this->session->userdata('skpd');
		$spt = getspt($id);
		$status=getstatus($spt);
		if($status == 4){
			$data2=array(
				"status"=>5,
			);
		$data=array(
			"tgl_cetak"=>$_POST['tgl_cetak'],
			"title"=>'Cetak Kwitansi',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($spt),
			"kwitansi"=>$this->M_cetak->getkwitansi($id),
			"skpd"=>$this->M_cetak->skpd($skpd),
		);
		$this->db->where('id', $spt);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Kwitansi.pdf";
		$this->pdf->load_view('cetak/cetakkwitansiluar', $data);
		}else{
			$spt = getspt($id);
			$data=array(
				"tgl_cetak"=>$_POST['tgl_cetak'],
				"title"=>'Cetak Kwitansi',
				"id" => $id,
				"kegiatan"=>$this->M_cetak->getkeg($spt),
				"kwitansi"=>$this->M_cetak->getkwitansi($id),
				"skpd"=>$this->M_cetak->skpd($skpd)
			);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Kwitansi.pdf";
		$this->pdf->load_view('cetak/cetakkwitansiluar', $data);
		}
	}
	public function cetaksppd($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		if($status == 2){
			$data2=array(
				"status"=>3,
			);
		$data=array(
			"title"=>'Cetak Visum SPPD Dalam Daerah',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-SPPD.pdf";
		$this->pdf->load_view('cetak/cetak_sppd', $data);
		}else{
		$data=array(
			"title"=>'Cetak Visum SPPD Dalam Daerah',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-SPPD.pdf";
		$this->pdf->load_view('cetak/cetak_sppd', $data);
		}	
	}
	public function cetaksppdluar($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		if($status == 2){
			$data2=array(
				"status"=>3,
			);
		$data=array(
			"title"=>'Cetak Visum SPPD Luar Daerah',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum.pdf";
		$this->pdf->load_view('cetak/cetak_sppdluar', $data);
		}else{
		$data=array(
			"title"=>'Cetak Visum SPPD Luar Daerah',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum.pdf";
		$this->pdf->load_view('cetak/cetak_sppdluar', $data);
		}	
	}
	public function cetaksppdsetda($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		if($status == 2){
			$data2=array(
				"status"=>3,
			);
		$data=array(
			"title"=>'Cetak Visum Kepala Dinas',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"setda"=>$this->M_cetak->setda(),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum-Kepala-Dinas.pdf";
		$this->pdf->load_view('cetak/cetak_sppdsetda', $data);
		}else{
		$data=array(
			"title"=>'Cetak Visum Kepala Dinas',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"setda"=>$this->M_cetak->setda(),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum-Kepala-Dinas.pdf";
		$this->pdf->load_view('cetak/cetak_sppdsetda', $data);
		}	
	}
	public function cetaksppdsetdaluar($id)
	{
		$skpd = $this->session->userdata('skpd');
		$status=getstatus($id);
		if($status == 2){
			$data2=array(
				"status"=>3,
			);
		$data=array(
			"title"=>'Cetak SPPD Kepala Dinas',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"setda"=>$this->M_cetak->setda(),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->db->where('id', $id);
		$this->db->update('sppd', $data2);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum-Kepala-Dinas.pdf";
		$this->pdf->load_view('cetak/cetak_sppdsetdaluar', $data);
		}else{
		$data=array(
			"title"=>'Cetak SPPD Kepala Dinas',
			"id" => $id,
			"kegiatan"=>$this->M_cetak->getkeg($id),
			"kwitansi"=>$this->M_cetak->getpegawai1($id),
			"pengikut"=>$this->M_cetak->getpegawai2($id),
			"setda"=>$this->M_cetak->setda(),
			"skpd"=>$this->M_cetak->skpd($skpd)
		);
		$this->pdf->setPaper('legal', 'potrait');
		$this->pdf->filename = "Cetak-Visum-Kepala-Dinas.pdf";
		$this->pdf->load_view('cetak/cetak_sppdsetdaluar', $data);
		}	
	}
}