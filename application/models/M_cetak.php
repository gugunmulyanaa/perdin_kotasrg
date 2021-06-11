<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cetak extends CI_Model {

	public function getkeg($id)
	{
		$q=	$this->db->query("SELECT * FROM `sppd` WHERE id=$id");
	    return $q->row_array();
    }
	public function all($id)
	{
		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` JOIN `master_pegawai` ON transaksi_sppd.pegawai_id = master_pegawai.id WHERE sppd_id = $id");
	    return $q->result();
	}
	public function skpd($skpd)
	{
		$q=	$this->db->query("SELECT * FROM `setting` where kode_opd='$skpd'");
	    return $q->row_array();
	}
	public function setda()
	{
		$q=	$this->db->query("SELECT * FROM `setting` where kode_opd = '400101'");
	    return $q->row_array();
	}
	public function getkwitansi($id)
	{
		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` WHERE id=$id");
	    return $q->row_array();
	}
	public function getpegawai1($id){
		$q= $this->db->query("SELECT * FROM `transaksi_sppd` JOIN `master_pegawai` ON transaksi_sppd.pegawai_id = master_pegawai.id WHERE sppd_id = $id LIMIT 1");
		return $q->row_array();
	}
	public function getpegawai2($id){
		$q= $this->db->query("SELECT * FROM `transaksi_sppd` WHERE `sppd_id` = '$id' AND transaksi_sppd.id NOT IN (SELECT MIN(id) FROM `transaksi_sppd` WHERE `sppd_id` = '$id') ORDER BY `transaksi_sppd`.`id` ASC");
		return $q->result();
	}
}