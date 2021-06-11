<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
        $this->load->model('M_pegawai');
	}
	public function index()
	{
		$data=array(
			"title"=>'Master Data Pegawai',
            "aktif"=>"pegawai",
			"all"=>$this->M_pegawai->all(),
			"allthl"=>$this->M_pegawai->allthl(),
			"allsopir"=>$this->M_pegawai->allsopir(),
			"golongan"=>$this->M_pegawai->golongan(),
			"eselon"=>$this->M_pegawai->eselon(),
			"content"=>"pegawai/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Data Pegawai', site_url('Pegawai'));
		$this->load->view('template',$data);
	}
	public function add()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('depan', 'depan');
		$this->form_validation->set_rules('belakang', 'belakang');
        $this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('eselon', 'eselon', 'required');
		$this->form_validation->set_rules('golongan', 'golongan', 'required');
		$skpd= $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
				"gelar_depan"=>$_POST['depan'],
				"gelar_belakang"=>$_POST['belakang'],
				"nip"=>$_POST['nip'],
				"golongan_id"=>$_POST['golongan'],
				"eselon_id"=>$_POST['eselon'],
				"kategori"=>1,
				"jabatan"=>$_POST['jabatan'],
				"skpd_id" => $skpd
			);
			$this->db->insert('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('pegawai');
		}
	}
	public function addthl()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$skpd= $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
				"jabatan"=>$_POST['jabatan'],
				"eselon_id"=>10,
				"kategori"=>2,
				"skpd_id" => $skpd
			);
			$this->db->insert('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('pegawai');
		}
	}
	public function addsopir()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$skpd= $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
				"jabatan"=>'Sopir',
				"eselon_id"=>11,
				"kategori"=>3,
				"skpd_id" => $skpd
			);
			$this->db->insert('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('pegawai');
		}
	}
	public function editpegawai($id)
	{
		$data=array(
			"title"=>'Edit Data Pegawai ASN',
			"aktif"=>"pegawai",
			"id" => $id,
			"getpegawai"=>$this->M_pegawai->getpegawai($id),
			"golongan"=>$this->M_pegawai->golongan(),
			"eselon"=>$this->M_pegawai->eselon(),
			"content"=>"pegawai/editpegawai.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master Pegawai', site_url('pegawai'));
		$this->breadcrumb->append_crumb('Edit Data ASN', site_url('pegawai/editpegawai'));
		$this->load->view('template',$data);
	}
	public function editthl($id)
	{
		$data=array(
			"title"=>'Edit Data Pegawai THL',
			"aktif"=>"pegawai",
			"id" => $id,
			"getthl"=>$this->M_pegawai->getthl($id),
			"content"=>"pegawai/editthl.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master Pegawai', site_url('pegawai'));
		$this->breadcrumb->append_crumb('Edit Data THL', site_url('pegawai/editthl'));
		$this->load->view('template',$data);
	}
	public function editsopir($id)
	{
		$data=array(
			"title"=>'Edit Data Pegawai Sopir',
			"aktif"=>"pegawai",
			"id" => $id,
			"getsopir"=>$this->M_pegawai->getsopir($id),
			"all"=>$this->M_pegawai->all(),
			"content"=>"pegawai/editsopir.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master Pegawai', site_url('pegawai'));
		$this->breadcrumb->append_crumb('Edit Data Sopir', site_url('pegawai/editsopir'));
		$this->load->view('template',$data);
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('depan', 'depan');
		$this->form_validation->set_rules('belakang', 'belakang');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$this->form_validation->set_rules('golongan', 'golongan', 'required');
		$this->form_validation->set_rules('eselon', 'eselon', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
				"gelar_depan"=>$_POST['depan'],
				"gelar_belakang"=>$_POST['belakang'],
				"nip"=>$_POST['nip'],
				"golongan_id"=>$_POST['golongan'],
				"eselon_id"=>$_POST['eselon'],
                "jabatan"=>$_POST['jabatan']
			);
			$this->db->where('id', $id);
			$this->db->update('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");
			redirect('pegawai');
		}
	}
	public function editthlact($id)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
                "jabatan"=>$_POST['jabatan']
			);
			$this->db->where('id', $id);
			$this->db->update('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");
			redirect('pegawai');
		}
	}
	public function editsopiract($id)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('pegawai');
		}else{
			$data=array(
				"nama"=>$_POST['nama'],
			);
			$this->db->where('id', $id);
			$this->db->update('master_pegawai',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Edit");
			redirect('pegawai');
		}
    }
    public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('pegawai');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('master_pegawai');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('Pegawai');
		}
	}
	public function hapusthl($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('pegawai');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('master_pegawai');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('Pegawai');
		}
	}
	public function hapussopir($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('pegawai');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('master_pegawai');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('Pegawai');
		}
	}
}