<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
    	parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
		$this->load->model('M_users');
	}
	public function index()
	{
		$data=array(
			"title"=>'Daftar User Pengguna SPPD',
			"aktif"=>"user",
			"all"=>$this->M_users->all(),
			"pptk"=>$this->M_users->pptk(),
			"content"=>"users/index.php",
		);
		$this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('User Management', site_url('Users'));
		$this->load->view('template',$data);
	}
	public function add()
	{
		$nip_spasi = getnip($_POST['username']);
		$nip = str_replace(' ', '', $nip_spasi);
		$nama = getpegawai($_POST['username']);
		$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[admin.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'passconf', 'trim|required|matches[password]');
		$nip_spasi = getnip($_POST['username']);
		$nip = str_replace(' ', '', $nip_spasi);
		$nama = getpegawai($_POST['username']);
		$skpd = $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal Membuat User, Silahkan Cek Kembali");
			redirect('Users');
		}else{
			$data=array(
				"pegawai_id"=>$_POST['username'],
				"nama"=>$nama,
				"username"=>$nip,
				"password"=>md5($_POST['password']),
				"skpd_id"=>$skpd,
				"akses"=>2
			);
			$this->db->insert('admin',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('Users');
		}
	}
	public function edit($id)
	{
		if($this->input->post('password') == '' ){
		$this->form_validation->set_rules('pptk', 'pptk', 'trim|required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('users');
		}else{
			$data=array(
				"nama"=>$_POST['pptk'],
				"akses"=>$_POST['akses']
			);
			$this->db->where('id_admin', $id);
			$this->db->update('admin',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");
			redirect('users');
		}
		}else{
			$this->form_validation->set_rules('pptk', 'pptk', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'passconf', 'trim|required|matches[password]');
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
				redirect('users');
			}else{
				$data=array(
					"nama"=>$_POST['pptk'],
					"password"=>md5($_POST['password']),
					"akses"=>$_POST['akses']
				);
				$this->db->where('id_admin', $id);
				$this->db->update('admin',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");
				redirect('users');
			}
		}
    }
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('users');
		}else{
			$this->db->where('id_admin', $id);
			$this->db->delete('admin');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('users');
		}
	}
}
