<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_progkeg extends CI_Model {

	public function getprog()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_program` where skpd_id = '$skpd' ORDER BY `master_program`.`kode` ASC");
	    return $q->result();
	}
	public function program($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_program` where skpd_id = '$skpd' AND id= '$id'");
	    return $q->row_array();
	}
	public function getkeg()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_kegiatan` where skpd_id = '$skpd' ORDER BY `master_kegiatan`.`program_kode` ASC");
	    return $q->result();
	}
	public function kegiatan($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_kegiatan` where skpd_id = '$skpd' AND id_kegiatan= '$id'");
	    return $q->row_array();
	}
	public function geturaian()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_uraian` where skpd_id = '$skpd' ORDER BY `master_uraian`.`program_id` ASC");
	    return $q->result();
	}
	public function uraian($id)
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_uraian` where skpd_id = '$skpd' AND id= '$id'");
	    return $q->row_array();
	}
	public function pejabat()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where skpd_id = '$skpd' ORDER BY id ASC");
	    return $q->result();
	}
}