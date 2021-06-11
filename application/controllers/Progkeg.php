<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progkeg extends CI_Controller {
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
        $this->load->model('M_progkeg');
    }
    public function index()
	{
		$data=array(
			"title"=>'Master Data DPA SPPD',
            "aktif"=>"progkeg",
			"prog"=>$this->M_progkeg->getprog(),
			"keg"=>$this->M_progkeg->getkeg(),
			"pptk"=>$this->M_progkeg->pejabat(),
			"uraian"=>$this->M_progkeg->geturaian(),
			"content"=>"progkeg/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Data Program Kegiatan', site_url('Progkeg'));
		$this->load->view('template',$data);
	}
	public function addprogram()
	{
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$skpd = $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('progkeg');
		}else{
			$data=array(
				"kode"=>$_POST['kode'],
				"nama"=>$_POST['nama'],
				"skpd_id"=>$skpd
			);
			$this->db->insert('master_program',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Simpan");
			redirect('progkeg');
		}
	}
	public function editprog($id)
	{
		$data=array(
			"title"=>'Edit Data Program SPPD',
			"aktif"=>"progkeg",
			"id" => $id,
			"prog"=>$this->M_progkeg->program($id),
			"content"=>"progkeg/editprog.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master DPA', site_url('progkeg'));
		$this->breadcrumb->append_crumb('Edit Data Program', site_url('progkeg/editprog'));
		$this->load->view('template',$data);
	}
	public function editprogact($id)
	{
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('progkeg');
		}else{
			$data=array(
				"kode"=>$_POST['kode'],
				"nama"=>$_POST['nama']
			);
			$this->db->where('id', $id);
			$this->db->update('master_program',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Edit");
			redirect('progkeg');
		}
	}
	public function hapusprogram($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('progkeg');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('master_program');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('progkeg');
		}
	}
	public function addkegiatan()
	{
		$this->form_validation->set_rules('prog_kode', 'prog_kode', 'required');
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$skpd = $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('progkeg');
		}else{
			$data=array(
				"program_kode"=>$_POST['prog_kode'],
				"kode_kegiatan"=>$_POST['kode'],
				"nama_kegiatan"=>$_POST['nama'],
				"skpd_id"=>$skpd
			);
			$this->db->insert('master_kegiatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Simpan");
			redirect('progkeg');
		}
	}
	public function editkeg($id)
	{
		$data=array(
			"title"=>'Edit Data Kegiatan SPPD',
			"aktif"=>"progkeg",
			"id" => $id,
			"prog"=>$this->M_progkeg->getprog(),
			"keg"=>$this->M_progkeg->kegiatan($id),
			"content"=>"progkeg/editkeg.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master DPA', site_url('progkeg'));
		$this->breadcrumb->append_crumb('Edit Data Kegiatan', site_url('progkeg/editkeg'));
		$this->load->view('template',$data);
	}
	public function editkegact($id)
	{
		$this->form_validation->set_rules('prog_kode', 'prog_kode', 'required');
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('progkeg');
		}else{
			$data=array(
				"program_kode"=>$_POST['prog_kode'],
				"kode_kegiatan"=>$_POST['kode'],
				"nama_kegiatan"=>$_POST['nama'],
			);
			$this->db->where('id_kegiatan', $id);
			$this->db->update('master_kegiatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Edit");
			redirect('progkeg');
		}
	}
	public function hapuskegiatan($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('progkeg');
		}else{
			$this->db->where('id_kegiatan', $id);
			$this->db->delete('master_kegiatan');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('progkeg');
		}
	}
	public function adduraian()
	{
		$this->form_validation->set_rules('prog', 'prog', 'required');
		$this->form_validation->set_rules('keg', 'keg', 'required');
		$this->form_validation->set_rules('pptk', 'pptk', 'required');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$pagu = str_replace('.', '', $_POST['pagu']);
		$skpd = $this->session->userdata('skpd');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal disimpan cek kembali inputan anda");
			redirect('progkeg');
		}else{
			$data=array(
				"program_id"=>$_POST['prog'],
				"kegiatan_id"=>$_POST['keg'],
				"jenis_uraian"=>$_POST['jenis'],
				"pagu_anggaran"=>$pagu,
				"pejabat_id"=>$_POST['pptk'],
				"skpd_id"=>$skpd
			);
			$this->db->insert('master_uraian',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Simpan");
			redirect('progkeg');
		}
	}
	public function edituraian($id)
	{
		$data=array(
			"title"=>'Edit Data Uraian SPPD',
			"aktif"=>"progkeg",
			"id" => $id,
			"prog"=>$this->M_progkeg->getprog(),
			"keg"=>$this->M_progkeg->getkeg(),
			"pptk"=>$this->M_progkeg->pejabat(),
			"urai"=>$this->M_progkeg->uraian($id),
			"content"=>"progkeg/edituraian.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Master DPA', site_url('progkeg'));
		$this->breadcrumb->append_crumb('Edit Data Rincian DPA', site_url('progkeg/edituraian'));
		$this->load->view('template',$data);
	}
	public function edituraiact($id)
	{
		$this->form_validation->set_rules('prog', 'prog', 'required');
		$this->form_validation->set_rules('keg', 'keg', 'required');
		$this->form_validation->set_rules('pptk', 'pptk', 'trim|required');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$pagu = str_replace('.', '', $_POST['pagu']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('progkeg');
		}else{
			$data=array(
				"program_id"=>$_POST['prog'],
				"kegiatan_id"=>$_POST['keg'],
				"jenis_uraian"=>$_POST['jenis'],
				"pagu_anggaran"=>$pagu,
				"pejabat_id"=>$_POST['pptk'],
			);
			$this->db->where('id', $id);
			$this->db->update('master_uraian',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Edit");
			redirect('progkeg');
		}
	}
	public function hapusuraian($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('progkeg');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('master_uraian');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('progkeg');
		}
	}
	
}