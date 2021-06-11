<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_validasi_dalam extends CI_Model {

	public function getallbyuser()

	{

		$id = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT * FROM `sppd` WHERE skpd_id = '$id' AND jenis_sppd = '1' AND status <= '5' ORDER BY tanggal_pergi DESC");

	    return $q->result();

	}

	public function getdetail($id)

	{

		$q=	$this->db->query("SELECT * FROM `transaksi_sppd` where sppd_id='$id'");

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

}