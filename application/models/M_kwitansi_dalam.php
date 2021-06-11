<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kwitansi_dalam extends CI_Model {
    public function getall($id)
	{
		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` where sppd_id='$id'");
	    return $q->result();
	}
	public function getrow($id)
	{
		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` where id='$id'");
	    return $q->row_array();
	}
	public function getprogram()
	{
		$q=	$this->db->query("SELECT * FROM `master_program`");
	    return $q->result();
	}
	public function getkegiatan()
	{
		$q=	$this->db->query("SELECT * FROM `master_kegiatan`");
	    return $q->result();
	}
    public function getpegawai()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where skpd_id = '$skpd' AND kategori='1'");
	    return $q->result();
	}
	public function getthl()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd' AND kategori='2'");
	    return $q->result();
	}
	public function getsopir()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd' AND kategori='3'");
	    return $q->result();
	}
	public function getpagu($keg)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_uraian` where skpd_id = '$skpd' AND jenis_uraian = '1' AND kegiatan_id='$keg'");
	    return $q->row()->pagu_anggaran;
	}
	public function getusepagu($keg)
	{
		$q=	$this->db->query("SELECT SUM(total) as digunakan FROM `transaksi_sppd` where kegiatan_id='$keg' AND jenis_sppd = '1' AND validasi = '2'");
	    return $q->row()->digunakan;
	}
	public function getpagubelanja($id)
	{
		$q=	$this->db->query("SELECT SUM(total) as digunakan FROM `transaksi_sppd` where sppd_id='$id'");
	    return $q->row()->digunakan;
	}
	public function geteselon($peg)
	{
		$q=	$this->db->query("SELECT eselon_id FROM `master_pegawai` where id='$peg'");
	    return $q->row()->eselon_id;
	}
	public function getkategori($peg)
	{
		$q=	$this->db->query("SELECT kategori FROM `master_pegawai` where id='$peg'");
	    return $q->row()->kategori;
	}
	public function getharian($ese)
	{
		$q=	$this->db->query("SELECT biaya FROM `ssh_harian_dalam` where eselon_id='$ese'");
	    return $q->row()->biaya;
	}
	public function getrepresentasi($ese)
	{
		$q=	$this->db->query("SELECT kota_serang FROM `ssh_representasi` WHERE eselon_id='$ese'");
	    return $q->row()->kota_serang;
	}
}