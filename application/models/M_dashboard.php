<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_dashboard extends CI_Model {



	public function dalampending()

	{

		$skpd= $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT status FROM `sppd` where sppd.status < '6' AND sppd.jenis_sppd = '1' AND skpd_id = '$skpd'");

	    return $q->num_rows();

	}



	public function dalamselesai()

	{

		$skpd= $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT status FROM `sppd` where sppd.status = '6' AND sppd.jenis_sppd = '1' AND skpd_id = '$skpd'");

	    return $q->num_rows();

	}



	public function luarpending()

	{

		$skpd= $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT status FROM `sppd` where sppd.status < '6' AND sppd.jenis_sppd = '2' AND skpd_id = '$skpd'");

	    return $q->num_rows();

	}



	public function luarselesai()

	{

		$skpd= $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT status FROM `sppd` where sppd.status = '6' AND sppd.jenis_sppd = '2' AND skpd_id = '$skpd'");

	    return $q->num_rows();

	}



	public function uraian()

	{
		$skpd= $this->session->userdata('skpd');
		$q=	$this->db->query("SELECT * FROM `master_uraian` where skpd_id = '$skpd'");

	    return $q->result();

	}



	public function total_realisasi_dalam()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("select SUM(total) as realisasi FROM `transaksi_sppd` JOIN `sppd` ON `sppd`.`id` = `transaksi_sppd`.`sppd_id` where skpd_id = '$skpd' AND sppd.jenis_sppd = '1' AND validasi = '2'");

	    return $q->row()->realisasi;

	}



	public function total_realisasi_luar()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("select SUM(total) as realisasi FROM `transaksi_sppd` JOIN `sppd` ON `sppd`.`id` = `transaksi_sppd`.`sppd_id` where skpd_id = '$skpd' AND transaksi_sppd.jenis_sppd = '2' AND validasi = '2'");

	    return $q->row()->realisasi;

	}



	public function total_pagu_dalam()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT SUM(pagu_anggaran) as pagu FROM `master_uraian` where jenis_uraian = '1' AND skpd_id = '$skpd'");

	    return $q->row()->pagu;

	}



	public function total_pagu_luar()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT SUM(pagu_anggaran) as pagu FROM `master_uraian` where jenis_uraian = '2' AND skpd_id = '$skpd'");

	    return $q->row()->pagu;

	}

}