<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_regulasi extends CI_Model {

	public function master_eselon()
	{
		$q=	$this->db->query("SELECT * FROM `master_eselon` ORDER BY id_eselon ASC");
	    return $q->result();
	}

	public function master_transport()
	{
		$q=	$this->db->query("SELECT * FROM `master_transport` ORDER BY id_transport ASC");
	    return $q->result();
	}

    public function harian_dalam()
	{
		$q=	$this->db->query("SELECT * FROM `ssh_harian_dalam` ORDER BY eselon_id ASC");
	    return $q->result();
	}

	public function harian_luar_non_paket()
	{
		$q=	$this->db->query("SELECT * FROM `ssh_harian_luar_non_paket` ORDER BY eselon_id ASC");
	    return $q->result();
	}

	public function harian_luar_paket_full()
	{
		$q=	$this->db->query("SELECT * FROM `ssh_harian_luar_paket_full` ORDER BY eselon_id ASC");
	    return $q->result();
	}	

	public function akomodasi()
	{
		$q=	$this->db->query("SELECT * FROM `ssh_akomodasi` ORDER BY eselon_id ASC");
	    return $q->result();
	}

	public function representasi()
	{
		$q=	$this->db->query("SELECT * FROM `ssh_representasi` ORDER BY eselon_id ASC");
	    return $q->result();
	}
}