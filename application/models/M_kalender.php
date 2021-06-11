<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_kalender extends CI_Model {



	public function fetch_all($skpd)

	{

		$q=	$this->db->query("SELECT transaksi_sppd.id as id, transaksi_sppd.jenis_sppd as jenis, pegawai_id, tanggal_pergi, tanggal_pulang FROM `transaksi_sppd` JOIN `sppd` ON `sppd`.`id` = `transaksi_sppd`.`sppd_id` where skpd_id = '$skpd'");

	    return $q->result_array();

	}

}