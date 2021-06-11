<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Jarak extends CI_Controller {



	function __construct()

	{

    	parent::__construct();

		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';

		$config['tag_close'] = '</ol>';

		$config['li_open'] = '<li class="breadcrumb-item">';

		$config['li_close'] = '</li>';

		$this->breadcrumb->initialize($config);

        no_access();

        $this->load->model('M_jarak');

	}

	public function index()

	{

		$data=array(

			"title"=>'Master Data Jarak Tujuan SPPD',

            		"aktif"=>"jarak",

            		"dalam"=>$this->M_jarak->dalam_daerah(),

            		"keluar"=>$this->M_jarak->luar_daerah(),

			"content"=>"jarak/index.php",

		);

        	$this->breadcrumb->append_crumb('Home', site_url('Dashboard'));

        	$this->breadcrumb->append_crumb('Data Jarak SPPD', site_url('Jarak'));

		$this->load->view('template',$data);

	}

	public function add_dalam()

	{

		$this->form_validation->set_rules('kota', 'kota', 'trim|required|is_unique[master_jarak.nama_kota]');

		$this->form_validation->set_rules('provinsi', 'provinsi', 'required');

		$this->form_validation->set_rules('jarak', 'jarak', 'required');

		if($this->form_validation->run()==FALSE){

			$this->session->set_flashdata('error',"Gagal diinput Cek Kembali Inputan Anda");

			redirect('jarak');

		}else{

			$data=array(

				"nama_kota"=>$_POST['kota'],

				"nama_provinsi"=>$_POST['provinsi'],

				"jarak"=>$_POST['jarak'],

				"kategori"=>1

			);

			$this->db->insert('master_jarak',$data);

			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");

			redirect('jarak');

		}

	}

	public function edit_dalam($id)

	{

		$this->form_validation->set_rules('provinsi4', 'provinsi4', 'required');

		$this->form_validation->set_rules('jarak4', 'jarak4', 'required');

		if($this->form_validation->run()==FALSE){

			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");

			redirect('jarak');

		}else{

			$data=array(

				"nama_provinsi"=>$_POST['provinsi4'],

				"jarak"=>$_POST['jarak4'],

				"kategori"=>1

			);

			$this->db->where('id_jarak', $id);

			$this->db->update('master_jarak',$data);

			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");

			redirect('jarak');

		}

    }

	public function add_luar()

	{

		$this->form_validation->set_rules('kota2', 'kota2', 'trim|required|is_unique[master_jarak.nama_kota]');

		$this->form_validation->set_rules('provinsi2', 'provinsi2', 'required');

		$this->form_validation->set_rules('jarak2', 'jarak2', 'required');

		if($this->form_validation->run()==FALSE){

			$this->session->set_flashdata('error',"Gagal diinput Cek Kembali Inputan Anda");

			redirect('jarak');

		}else{

			$data=array(

				"nama_kota"=>$_POST['kota2'],

				"nama_provinsi"=>$_POST['provinsi2'],

				"jarak"=>$_POST['jarak2'],

				"kategori"=>2

			);

			$this->db->insert('master_jarak',$data);

			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");

			redirect('jarak');

		}

	}

	public function edit_luar($id)

	{

		$this->form_validation->set_rules('provinsi3', 'provinsi3', 'required');

		$this->form_validation->set_rules('jarak3', 'jarak3', 'required');

		if($this->form_validation->run()==FALSE){

			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");

			redirect('jarak');

		}else{

			$data=array(

				"nama_provinsi"=>$_POST['provinsi3'],

				"jarak"=>$_POST['jarak3'],

				"kategori"=>2

			);

			$this->db->where('id_jarak', $id);

			$this->db->update('master_jarak',$data);

			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");

			redirect('jarak');

		}

    }

    public function hapus($id)

	{

		if($id==""){

			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");

			redirect('Jarak');

		}else{

			$this->db->where('id_jarak', $id);

			$this->db->delete('master_jarak');

			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");

			redirect('Jarak');

		}

	}

}