<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function getskpd()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `setting` where `kode_opd` = '$skpd'");
	    return $q->row_array();
	}
	public function peg()
	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_pegawai` where `master_pegawai`.`skpd_id` = '$skpd'");
	    return $q->result();
	}
	function simpan_upload($id,$gambar){
        $hasil=$this->db->query("UPDATE `setting` SET `kop_opd` = '$gambar' Where `id`='$id'");
        return $hasil;
    }
}