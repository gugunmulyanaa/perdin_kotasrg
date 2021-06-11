<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends CI_Controller {

	function __construct()
	{
    	parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$this->breadcrumb->initialize($config);
        no_access();
        $this->load->model('M_regulasi');
	}
	public function index()
	{
		$data=array(
			"title"=>'Master Data SSH SPPD',
			"aktif"=>"regulasi",
			"eselon"=>$this->M_regulasi->master_eselon(),
			"trans_jarak"=>$this->M_regulasi->master_transport(),
			"hr_dalam"=>$this->M_regulasi->harian_dalam(),
			"hr_luar_non"=>$this->M_regulasi->harian_luar_non_paket(),
			"hr_luar_full"=>$this->M_regulasi->harian_luar_paket_full(),
			"akomodasi"=>$this->M_regulasi->akomodasi(),
			"representasi"=>$this->M_regulasi->representasi(),
			"content"=>"regulasi/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Data Regulasi SPPD', site_url('Regulasi'));
		$this->load->view('template',$data);
	}
	public function add_hr_dalam()
	{
		$biaya = str_replace('.', '', $_POST['biaya']);
		$this->form_validation->set_rules('eselon', 'eselon', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon'],
				"biaya"=>$biaya
			);
			$this->db->insert('ssh_harian_dalam',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_hr_luar_non()
	{
		$this->form_validation->set_rules('eselon1', 'eselon1', 'required');
		$this->form_validation->set_rules('biaya_dalam', 'biaya_dalam', 'required');
		$this->form_validation->set_rules('biaya_dki', 'biaya_dki', 'required');
		$this->form_validation->set_rules('biaya_luar', 'biaya_luar', 'required');
		$biayadalam = str_replace('.', '', $_POST['biaya_dalam']);
		$biayadki = str_replace('.', '', $_POST['biaya_dki']);
		$biayaluar = str_replace('.', '', $_POST['biaya_luar']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon1'],
				"dalam_banten"=>$biayadalam,
				"jakarta"=>$biayadki,
				"luar_banten"=>$biayaluar
			);
			$this->db->insert('ssh_harian_luar_non_paket',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_hr_luar_full()
	{
		$this->form_validation->set_rules('eselon2', 'eselon2', 'required');
		$this->form_validation->set_rules('biaya_dalam2', 'biaya_dalam2', 'required');
		$this->form_validation->set_rules('biaya_dki2', 'biaya_dki2', 'required');
		$this->form_validation->set_rules('biaya_luar2', 'biaya_luar2', 'required');
		$biayadalam2 = str_replace('.', '', $_POST['biaya_dalam2']);
		$biayadki2 = str_replace('.', '', $_POST['biaya_dki2']);
		$biayaluar2 = str_replace('.', '', $_POST['biaya_luar2']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon2'],
				"dalam_banten"=>$biayadalam2,
				"jakarta"=>$biayadki2,
				"luar_banten"=>$biayaluar2
			);
			$this->db->insert('ssh_harian_luar_paket_full',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_jarak_tempuh()
	{
		$this->form_validation->set_rules('uraian', 'uraian', 'required');
		$this->form_validation->set_rules('awal', 'awal', 'required');
		$this->form_validation->set_rules('akhir', 'akhir', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"uraian"=>$_POST['uraian'],
				"awal"=>$_POST['awal'],
				"akhir"=>$_POST['akhir']
			);
			$this->db->insert('master_transport',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_ssh_transport()
	{
		$this->form_validation->set_rules('eselon3', 'eselon3', 'required');
		$this->form_validation->set_rules('jarak', 'jarak', 'required');
		$this->form_validation->set_rules('biaya2', 'biaya2', 'required');
		$biaya2 = str_replace('.', '', $_POST['biaya2']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon3'],
				"transport_id"=>$_POST['jarak'],
				"biaya"=>$biaya2
			);
			$this->db->insert('ssh_transport',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_ssh_akomodasi()
	{
		$this->form_validation->set_rules('eselon4', 'eselon4', 'required');
		$this->form_validation->set_rules('ibukota', 'ibukota', 'required');
		$this->form_validation->set_rules('pulau_jawa', 'pulau_jawa', 'required');
		$this->form_validation->set_rules('luar_jawa', 'luar_jawa', 'required');
		$ibukota = str_replace('.', '', $_POST['ibukota']);
		$pulaujawa = str_replace('.', '', $_POST['pulau_jawa']);
		$luarjawa = str_replace('.', '', $_POST['luar_jawa']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon4'],
				"ibukota"=>$ibukota,
				"pulau_jawa"=>$pulaujawa,
				"luar_jawa"=>$luarjawa
			);
			$this->db->insert('ssh_akomodasi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function add_ssh_representasi()
	{
		$this->form_validation->set_rules('eselon5', 'eselon5', 'required');
		$this->form_validation->set_rules('serang', 'serang', 'required');
		$this->form_validation->set_rules('dalam_banten', 'dalam_banten', 'required');
		$this->form_validation->set_rules('luar_banten', 'luar_banten', 'required');
		$serang = str_replace('.', '', $_POST['serang']);
		$dalambanten = str_replace('.', '', $_POST['dalam_banten']);
		$luarbanten = str_replace('.', '', $_POST['luar_banten']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon5'],
				"kota_serang"=>$serang,
				"dalam_banten"=>$dalambanten,
				"luar_banten"=>$luarbanten
			);
			$this->db->insert('ssh_representasi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_hr_dalam()
	{
		$id=$_POST['id'];
		$biaya = str_replace('.', '', $_POST['biaya']);
		$this->form_validation->set_rules('eselon', 'eselon', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon'],
				"biaya"=>$biaya
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_harian_dalam',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_hr_luar_non()
	{
		$id=$_POST['id'];
		$this->form_validation->set_rules('eselon1', 'eselon1', 'required');
		$this->form_validation->set_rules('biaya_dalam', 'biaya_dalam', 'required');
		$this->form_validation->set_rules('biaya_dki', 'biaya_dki', 'required');
		$this->form_validation->set_rules('biaya_luar', 'biaya_luar', 'required');
		$biayadalam = str_replace('.', '', $_POST['biaya_dalam']);
		$biayadki = str_replace('.', '', $_POST['biaya_dki']);
		$biayaluar = str_replace('.', '', $_POST['biaya_luar']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon1'],
				"dalam_banten"=>$biayadalam,
				"jakarta"=>$biayadki,
				"luar_banten"=>$biayaluar
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_harian_luar_non_paket',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_hr_luar_full()
	{
		$id=$_POST['id'];
		$this->form_validation->set_rules('eselon2', 'eselon2', 'required');
		$this->form_validation->set_rules('biaya_dalam2', 'biaya_dalam2', 'required');
		$this->form_validation->set_rules('biaya_dki2', 'biaya_dki2', 'required');
		$this->form_validation->set_rules('biaya_luar2', 'biaya_luar2', 'required');
		$biayadalam2 = str_replace('.', '', $_POST['biaya_dalam2']);
		$biayadki2 = str_replace('.', '', $_POST['biaya_dki2']);
		$biayaluar2 = str_replace('.', '', $_POST['biaya_luar2']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon2'],
				"dalam_banten"=>$biayadalam2,
				"jakarta"=>$biayadki2,
				"luar_banten"=>$biayaluar2
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_harian_luar_paket_full',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_jarak_tempuh()
	{
		$id=$_POST['id'];
		$this->form_validation->set_rules('uraian', 'uraian', 'required');
		$this->form_validation->set_rules('awal', 'awal', 'required');
		$this->form_validation->set_rules('akhir', 'akhir', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"uraian"=>$_POST['uraian'],
				"awal"=>$_POST['awal'],
				"akhir"=>$_POST['akhir']
			);
			$this->db->where('id_transport', $id);
			$this->db->update('master_transport',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_akomodasi()
	{
		$id=$_POST['id'];
		$this->form_validation->set_rules('eselon4', 'eselon4', 'required');
		$this->form_validation->set_rules('ibukota', 'ibukota', 'required');
		$this->form_validation->set_rules('pulau_jawa', 'pulau_jawa', 'required');
		$this->form_validation->set_rules('luar_jawa', 'luar_jawa', 'required');
		$ibukota = str_replace('.', '', $_POST['ibukota']);
		$pulaujawa = str_replace('.', '', $_POST['pulau_jawa']);
		$luarjawa = str_replace('.', '', $_POST['luar_jawa']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon4'],
				"ibukota"=>$ibukota,
				"pulau_jawa"=>$pulaujawa,
				"luar_jawa"=>$luarjawa
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_akomodasi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
	public function edit_representasi()
	{
		$id=$_POST['id'];
		$this->form_validation->set_rules('eselon5', 'eselon5', 'required');
		$this->form_validation->set_rules('serang', 'serang', 'required');
		$this->form_validation->set_rules('dalam_banten', 'dalam_banten', 'required');
		$this->form_validation->set_rules('luar_banten', 'luar_banten', 'required');
		$serang = str_replace('.', '', $_POST['serang']);
		$dalambanten = str_replace('.', '', $_POST['dalam_banten']);
		$luarbanten = str_replace('.', '', $_POST['luar_banten']);
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('regulasi');
		}else{
			$data=array(
				"eselon_id"=>$_POST['eselon5'],
				"kota_serang"=>$serang,
				"dalam_banten"=>$dalambanten,
				"luar_banten"=>$luarbanten
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_representasi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Di Simpan");
			redirect('regulasi');
		}
	}
    public function hapus_hr_dalam($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_harian_dalam');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_hr_luar_non($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_harian_luar_non_paket');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_hr_luar_full($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_harian_luar_paket_full');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_jarak_tempuh($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id_transport', $id);
			$this->db->delete('master_transport');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_ssh_transport($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_transport');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_akomodasi($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_akomodasi');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function hapus_representasi($id)
	{
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('regulasi');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('ssh_representasi');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('regulasi');
		}
	}
	public function ket_hr_dalam()
	{
		$ket_hr_dalam=$_POST['ket_hr_dalam'];
		$id = 1;
		if($ket_hr_dalam == "" || $ket_hr_dalam == "<p><br></p>" || $ket_hr_dalam == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_hr_dalam
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
	public function ket_hr_luar_non()
	{
		$ket_hr_luar_non=$_POST['ket_hr_luar_non'];
		$id = 2;
		if($ket_hr_luar_non == "" || $ket_hr_luar_non == "<p><br></p>" || $ket_hr_luar_non == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_hr_luar_non
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
	public function ket_hr_luar_full()
	{
		$ket_hr_luar_full=$_POST['ket_hr_luar_full'];
		$id = 3;
		if($ket_hr_luar_full == "" || $ket_hr_luar_full == "<p><br></p>" || $ket_hr_luar_full == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_hr_luar_full
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
	public function ket_transport()
	{
		$ket_transport=$_POST['ket_transport'];
		$id = 4;
		if($ket_transport == "" || $ket_transport == "<p><br></p>" || $ket_transport == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_transport
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
	public function ket_akomodasi()
	{
		$ket_akomodasi=$_POST['ket_akomodasi'];
		$id = 5;
		if($ket_akomodasi == "" || $ket_akomodasi == "<p><br></p>" || $ket_akomodasi == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_akomodasi
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
	public function ket_representasi()
	{
		$ket_representasi=$_POST['ket_representasi'];
		$id = 6;
		if($ket_representasi == "" || $ket_representasi == "<p><br></p>" || $ket_representasi == "<p></p>"){
			$this->session->set_flashdata('error',"Harap Hubungi TIM Developer");
			redirect('regulasi');
		}else{
			$data2=array(
				"uraian"=> $ket_representasi
			);
			$this->db->where('id', $id);
			$this->db->update('ssh_keterangan', $data2);
			redirect('regulasi');
		}
	}
}