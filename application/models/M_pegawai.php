<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function all()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` JOIN `master_golongan` ON master_pegawai.golongan_id = master_golongan.id_golongan JOIN `master_eselon` ON master_pegawai.eselon_id = master_eselon.id_eselon where skpd_id = '$skpd' AND kategori = '1'");
	    return $q->result();
	}
	public function getpegawai($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd' AND `master_pegawai`.`id` = '$id' AND kategori = '1'");
	    return $q->row_array();
	}
	public function getthl($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd' AND `master_pegawai`.`id` = '$id' AND kategori = '2'");
	    return $q->row_array();
	}
	public function getsopir($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd' AND `master_pegawai`.`id` = '$id' AND kategori = '3'");
	    return $q->row_array();
	}
	public function allthl()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where skpd_id = '$skpd' AND kategori = '2'");
	    return $q->result();
	}
	public function allsopir()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where skpd_id = '$skpd' AND kategori = '3'");
	    return $q->result();
	}
	public function golongan()
	{
		$q=	$this->db->query("SELECT * FROM `master_golongan`");
	    return $q->result();
	}
	public function eselon()
	{
		$q=	$this->db->query("SELECT * FROM `master_eselon`");
	    return $q->result();
	}
	public function bendahara()
	{
		$q=	$this->db->query("SELECT * FROM `master_bendahara`");
	    return $q->row_array();
	}
}