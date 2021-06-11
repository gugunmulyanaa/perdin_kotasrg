<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		$this->load->model('M_setting');
		$this->load->library('upload');
	}
	public function index()
	{
		$data=array(
			"title"=>'Setting Aplikasi SPPD',
			"aktif"=>"setting",
			"getrow"=>$this->M_setting->getskpd(),
			"peg"=>$this->M_setting->peg(),
			"content"=>"setting/index.php",
		);
		$this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Setting Aplikasi', site_url('Setting'));
		$this->load->view('template',$data);
	}
	public function editskpd($id)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('singkatan', 'singkatan', 'required');
		$this->form_validation->set_rules('kepala', 'kepala', 'required');
		$this->form_validation->set_rules('bendahara', 'bendahara', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('setting');
		}else{
			$data=array(
				"nama_opd"=>$_POST['nama'],
				"singkatan_opd"=>$_POST['singkatan'],
				"kepala_opd"=>$_POST['kepala'],
				"bendahara_opd"=>$_POST['bendahara'],
			);
			$this->db->where('id', $id);
			$this->db->update('setting',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil di Edit");
			redirect('setting');
		}
	}
	function do_upload($id){
		$config['encrypt_name'] = TRUE;
        $config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'png';
		$config['max_size'] = '1024*3';	
		$this->upload->initialize($config);
        if(!empty($_FILES['filekop']['name'])){
            if ($this->upload->do_upload('filekop')){
				$gbr = $this->upload->data();
                //Compress Image
				$config['image_library']='gd2';				
                $config['source_image']='./assets/uploads/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
				$config['quality']= '100%';
                $config['width']= 850;
                $config['height']= 125;
                $config['new_image']= './assets/uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
                $gambar=$gbr['file_name'];
                $this->M_setting->simpan_upload($id,$gambar);
				$this->session->set_flashdata('sukses',"Data Berhasil di Upload");
				redirect('setting');
            }else{
				$this->session->set_flashdata('error',"Cek Kembali Aturan Upload File Kop Surat");
				redirect('setting');
			}
        }else{
			$this->session->set_flashdata('error',"Tidak ada Gambar yang diupload");
			redirect('setting');
        }
    }
}
