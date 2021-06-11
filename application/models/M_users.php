<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model {

	public function all()
	{
		$skpd = $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `admin` where skpd_id = '$skpd' ORDER BY username ASC");
	    return $q->result();
	}
	public function pptk()
	{
		$skpd = $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT DISTINCT pejabat_id FROM `master_uraian` JOIN `master_pegawai` ON master_uraian.pejabat_id = master_pegawai.id where master_uraian.skpd_id = '$skpd' ORDER BY pejabat_id ASC");
	    return $q->result();
	}
}