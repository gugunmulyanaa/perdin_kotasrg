<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_sppd_dalam extends CI_Model {

    public function all($id)

	{

		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` JOIN `master_pegawai` ON transaksi_sppd.pegawai_id = master_pegawai.id WHERE sppd_id = $id");

	    return $q->result();

	}

	public function getallbyuser()

	{

		$id = $this->session->userdata('user');

		$q=	$this->db->query("SELECT * FROM `sppd` WHERE username='$id' AND jenis_sppd='1' AND status < '6' ORDER BY tanggal_pergi DESC");

	    return $q->result();

	}

	public function getrow($id)

	{

		$q=	$this->db->query("SELECT * FROM `sppd` where id='$id'");

	    return $q->row_array();

	}

    public function getpegawai($id)

	{

		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` JOIN `master_pegawai` ON transaksi_sppd.pegawai_id = master_pegawai.id WHERE transaksi_sppd.sppd_id = $id");

	    return $q->result();

	}

	public function getprogram()

	{

		$pptk= $this->session->userdata('user');

		$id = getidpeg($pptk);

		$q=	$this->db->query("SELECT * FROM `master_uraian` JOIN `master_program` ON `master_uraian`.`program_id` = `master_program`.`id` WHERE `master_uraian`.`pejabat_id` = '$id' AND `master_uraian`.`jenis_uraian` = 1 ORDER BY `master_program`.`kode` ASC");

	    return $q->result();

	}

	public function getkegiatan()

	{

		$pptk= $this->session->userdata('user');

		$id = getidpeg($pptk);

		$q=	$this->db->query("SELECT * FROM `master_uraian` JOIN `master_kegiatan` ON `master_uraian`.`kegiatan_id` = `master_kegiatan`.`id_kegiatan` WHERE `master_uraian`.`pejabat_id` = '$id' AND `master_uraian`.`jenis_uraian` = 1 ORDER BY kode_kegiatan ASC");

	    return $q->result();

	}

	public function skpd()

	{

		$skpd= $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT * FROM `setting` where kode_opd='$skpd'");

	    return $q->row_array();

	}

}