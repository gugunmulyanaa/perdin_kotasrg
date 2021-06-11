<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_jarak extends CI_Model {



	public function dalam_daerah()

	{

		$q=$this->db->query("SELECT * FROM `master_jarak` where master_jarak.kategori = '1' ");

	    return $q->result();

	}

	public function luar_daerah()

	{

		$q=$this->db->query("SELECT * FROM `master_jarak` where master_jarak.kategori = '2' ");

	    return $q->result();

	}

}