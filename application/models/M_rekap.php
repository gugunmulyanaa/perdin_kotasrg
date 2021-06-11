<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_rekap extends CI_Model {



	public function getprogram()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT * FROM `master_program` where skpd_id = '$skpd'");

	    return $q->result();

	}

	public function getkegiatan()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT * FROM `master_kegiatan` where skpd_id = '$skpd'");

	    return $q->result();

	}

	public function getpegawai()

	{

		$skpd = $this->session->userdata('skpd');

		$q=	$this->db->query("SELECT * FROM `master_pegawai` where skpd_id = '$skpd'");

	    return $q->result();

	}

	public function skpd($skpd)

	{

		$q=	$this->db->query("SELECT * FROM `setting` where kode_opd='$skpd'");

	    return $q->row_array();

	}

	public function all()

	{
		$id_skpd = $this->session->userdata('skpd');

		$kegiatan=$_POST['kegiatan'];

		$program=$_POST['program'];

		$pegawai=$_POST['pegawai'];

		$tgl_awal=$_POST['tgl_awal'];

		$tgl_akhir=$_POST['tgl_akhir'];

		if($pegawai!=""){

			$and="AND transaksi_sppd.pegawai_id='$pegawai'";

		}else{

			$and="";

		}

		if($program!=""){

			$and1="AND transaksi_sppd.program_id='$program'";

		}else{

			$and1="";

		}

		if($kegiatan!=""){

			$and2="AND transaksi_sppd.kegiatan_id='$kegiatan'";

		}else{

			$and2="";

		}

		if($tgl_awal!=""){

			$and3="AND sppd.tanggal_pergi BETWEEN '$tgl_awal'";

		}else{

			$and3="";

		}

		if($tgl_akhir!=""){

			$and4="AND '$tgl_akhir'";

		}else{

			$and4="";

		}

		$q= $this->db->query(

			"SELECT * FROM `sppd` JOIN `transaksi_sppd`

			WHERE sppd.skpd_id = $id_skpd AND sppd.jenis_sppd = '1' AND sppd.status = '6' AND sppd.id = transaksi_sppd.sppd_id

			".$and." ".$and1." ".$and2." ".$and3." ".$and4." ORDER BY pegawai_id, tanggal_pergi ASC

			");

		return $q->result();	

	}

	public function total()

	{
		$id_skpd = $this->session->userdata('skpd');

		$kegiatan=$_POST['kegiatan'];

		$program=$_POST['program'];

		$pegawai=$_POST['pegawai'];

		$tgl_awal=$_POST['tgl_awal'];

		$tgl_akhir=$_POST['tgl_akhir'];		

		if($pegawai!=""){

			$and="AND transaksi_sppd.pegawai_id='$pegawai'";

		}else{

			$and="";

		}

		if($program!=""){

			$and1="AND transaksi_sppd.program_id='$program'";

		}else{

			$and1="";

		}

		if($kegiatan!=""){

			$and2="AND transaksi_sppd.kegiatan_id='$kegiatan'";

		}else{

			$and2="";

		}

		if($tgl_awal!=""){

			$and3="AND sppd.tanggal_pergi BETWEEN '$tgl_awal'";

		}else{

			$and3="";

		}

		if($tgl_akhir!=""){

			$and4="AND '$tgl_akhir'";

		}else{

			$and4="";

		}

		$q= $this->db->query(

			"SELECT sum(total) as total FROM `sppd` JOIN `transaksi_sppd`

			WHERE sppd.skpd_id = $id_skpd AND sppd.jenis_sppd = '1' AND sppd.status = '6' AND sppd.id = transaksi_sppd.sppd_id

			".$and." ".$and1." ".$and2." ".$and3." ".$and4."

			");

		return $q->row()->total;	

	}

}