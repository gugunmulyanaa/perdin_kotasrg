<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kwitansi_luar extends CI_Model {
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
		$q=	$this->db->query("SELECT * FROM `master_uraian` where skpd_id = '$skpd' AND jenis_uraian = '2' AND kegiatan_id= '$keg'");
	    return $q->row()->pagu_anggaran;
	}
	public function getusepagu($keg)
	{
		$q=	$this->db->query("SELECT SUM(total) as digunakan FROM `transaksi_sppd` where kegiatan_id='$keg' AND jenis_sppd = '2'AND validasi = '2'");
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
	//biaya ssh harian NON FULL Board
	public function non_dlm_banten($ese)
	{
		$q=	$this->db->query("SELECT dalam_banten FROM `ssh_harian_luar_non_paket` where eselon_id='$ese'");
	    return $q->row()->dalam_banten;
	}
	public function non_jakarta($ese)
	{
		$q=	$this->db->query("SELECT jakarta FROM `ssh_harian_luar_non_paket` where eselon_id='$ese'");
	    return $q->row()->jakarta;
	}
	public function non_luar_banten($ese)
	{
		$q=	$this->db->query("SELECT luar_banten FROM `ssh_harian_luar_non_paket` where eselon_id='$ese'");
	    return $q->row()->luar_banten;
	}
	//biaya ssh harian FULL Board
	public function full_dlm_banten($ese)
	{
		$q=	$this->db->query("SELECT dalam_banten FROM `ssh_harian_luar_paket_full` where eselon_id='$ese'");
	    return $q->row()->dalam_banten;
	}
	public function full_jakarta($ese)
	{
		$q=	$this->db->query("SELECT jakarta FROM `ssh_harian_luar_paket_full` where eselon_id='$ese'");
	    return $q->row()->jakarta;
	}
	public function full_luar_banten($ese)
	{
		$q=	$this->db->query("SELECT luar_banten FROM `ssh_harian_luar_paket_full` where eselon_id='$ese'");
	    return $q->row()->luar_banten;
	}
	//biaya ssh Akomodasi
	public function ako_pulau_jawa($ese)
	{
		$q=	$this->db->query("SELECT pulau_jawa FROM `ssh_akomodasi` where eselon_id='$ese'");
	    return $q->row()->pulau_jawa;
	}
	public function ako_jakarta($ese)
	{
		$q=	$this->db->query("SELECT ibukota FROM `ssh_akomodasi` where eselon_id='$ese'");
	    return $q->row()->ibukota;
	}
	public function ako_luar_jawa($ese)
	{
		$q=	$this->db->query("SELECT luar_jawa FROM `ssh_akomodasi` where eselon_id='$ese'");
	    return $q->row()->luar_jawa;
	}
	public function rep_dalam_prov($ese)
	{
		$q=	$this->db->query("SELECT dalam_banten FROM `ssh_representasi` WHERE eselon_id='$ese'");
	    return $q->row()->dalam_banten;
	}
	public function rep_luar_prov($ese)
	{
		$q=	$this->db->query("SELECT luar_banten FROM `ssh_representasi` WHERE eselon_id='$ese'");
	    return $q->row()->luar_banten;
	}
	public function jarak($jarak)
	{
		$q=	$this->db->query("SELECT * FROM `master_jarak` JOIN `master_transport` WHERE master_jarak.id_jarak = '$jarak' AND master_jarak.jarak BETWEEN master_transport.awal AND master_transport.akhir");
	    return $q->row()->id_transport;
	}
	public function trans_luar($idtrans, $eselon)
	{
		$q=	$this->db->query("SELECT * FROM `ssh_transport` WHERE transport_id = '$idtrans' AND eselon_id = '$eselon'");
	    return $q->row()->biaya;
	}
	public function trans_jakarta($eselon)
	{
		$q=	$this->db->query("SELECT * FROM `ssh_transport` WHERE transport_id = '4' AND eselon_id = '$eselon'");
	    return $q->row()->biaya;
	}
}