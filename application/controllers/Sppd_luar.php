<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd_luar extends CI_Controller {
    function __construct()
	{
    	parent::__construct();
		$config['tag_open'] = '<ol class="breadcrumb float-sm-right" style="background-color:lightgrey;padding:0 15px 0 15px;border-radius:20px">';
		$config['tag_close'] = '</ol>';
		$config['li_open'] = '<li class="breadcrumb-item">';
		$config['li_close'] = '</li>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelpptk();
        $this->load->model('M_sppd_luar');
	}	
    public function index()
	{
		$id = $this->session->userdata('user');
		$data=array(
			"title"=>'Daftar Kegiatan SPPD Luar Daerah',
			"aktif"=>"sppdluar",
			"sppd"=>$this->M_sppd_luar->getallbyuser($id),
			"content"=>"sppd_luar/index.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('SPPD Luar Daerah', site_url('Sppd_luar'));
		$this->load->view('template',$data);
	}
	public function add()
	{
		$data=array(
			"title"=>'Tambah Data SPPD Luar Daerah',
			"aktif"=>"sppdluar",
			"content"=>"sppd_luar/add.php",
			"program"=>$this->M_sppd_luar->getprogram(),
			"kegiatan"=>$this->M_sppd_luar->getkegiatan(),
			"wilayah"=>$this->M_sppd_luar->getwilayah()
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('SPPD Luar Daerah', site_url('Sppd_luar'));
		$this->breadcrumb->append_crumb('Tambah Data', site_url('Sppd_luar/add'));
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		$data=array(
			"title"=>'Edit SPPD Luar Daerah',
			"aktif"=>"sppdluar",
			"id" => $id,
			"getrow"=>$this->M_sppd_luar->getrow($id),
			"program"=>$this->M_sppd_luar->getprogram(),
			"kegiatan"=>$this->M_sppd_luar->getkegiatan(),
			"wilayah"=>$this->M_sppd_luar->getwilayah(),
			"content"=>"sppd_luar/edit.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('SPPD Luar Daerah', site_url('Sppd_luar'));
		$this->breadcrumb->append_crumb('Edit Data', site_url('Sppd_luar/edit'));
		$this->load->view('template',$data);
	}

	public function addspt()
	{
		$this->form_validation->set_rules('tgl_berangkat', 'tgl_berangkat', 'required');
		$this->form_validation->set_rules('tgl_pulang', 'tgl_pulang', 'required');
		$this->form_validation->set_rules('hari', 'hari', 'required');
		$this->form_validation->set_rules('waktu', 'waktu', 'required');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
		$this->form_validation->set_rules('jarak', 'jarak', 'required');
		$this->form_validation->set_rules('paket', 'paket', 'required');
		$this->form_validation->set_rules('acara', 'acara', 'required');
		$this->form_validation->set_rules('kendaraan', 'kendaraan', 'required');
		$this->form_validation->set_rules('program', 'program', 'required');
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diInput hubungi Diskominfo Kota Serang");
			redirect('sppd_luar/add');
		}else{
		$pergi = $_POST['tgl_berangkat'];
		$pulang = $_POST['tgl_pulang'];
		$jarak = $_POST['jarak'];
		$user = $_POST['user'];
		$skpd = $_POST['skpd'];
		$id = random_string('alnum', 6);
		$code = 'QR-'.$id.'-'.$user.'-'.$skpd.'.png';
		$qrCode = new Endroid\QrCode\QrCode('Tgl Berangkat :'.tgl_indo($pergi).'//Tgl Pulang :'.tgl_indo($pulang).'//Tujuan :'.getkota($jarak).'//PPTK :'.$user.'//SKPD :'.getskpd($skpd).'//Cetakan Resmi Aplikasi SPPD AREP LUNGE Pemerintah Kota Serang');
        $qrCode->writeFile('assets/qrcode/'.$code);
			$data=array(
				"jenis_sppd"=>2,
				"no_surat_msk"=>$_POST['no_undangan'],
				"nama_satker"=>$_POST['satker'],
				"perihal"=>$_POST['perihal'],
				"tanggal_pergi"=>$pergi,
				"tanggal_pulang"=>$pulang,
				"hari"=>$_POST['hari'],
				"waktu"=>$_POST['waktu'],
				"tempat"=>$_POST['tujuan'],
				"acara"=>$_POST['acara'],
				"jarak_id"=>$_POST['jarak'],
				"kendaraan"=>$_POST['kendaraan'],
				"program_id"=>$_POST['program'],
				"kegiatan_id"=>$_POST['kegiatan'],
				"jenis_paket"=>$_POST['paket'],
				"status"=>1,
				"qrcode"=>$code,
				"username"=>$user,
				"skpd_id"=>$skpd
			);
			$this->db->insert('sppd',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('sppd_luar');
		}
	}

	public function editspt()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('tgl_berangkat', 'tgl_berangkat', 'required');
		$this->form_validation->set_rules('tgl_pulang', 'tgl_pulang', 'required');
		$this->form_validation->set_rules('hari', 'hari', 'required');
		$this->form_validation->set_rules('waktu', 'waktu', 'required');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'required');
		$this->form_validation->set_rules('jarak', 'jarak', 'required');
		$this->form_validation->set_rules('paket', 'paket', 'required');
		$this->form_validation->set_rules('acara', 'acara', 'required');
		$this->form_validation->set_rules('kendaraan', 'kendaraan', 'required');
		$this->form_validation->set_rules('program', 'program', 'required');
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
		$no_undangan = $_POST['no_undangan'];
		$satker = $_POST['satker'];
		$perihal = $_POST['perihal'];
		$id = $_POST['id'];
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('sppd_luar/edit/'.$id);
		}else{
			$data=array(
				"no_surat_msk"=>$no_undangan,
				"nama_satker"=>$satker,
				"perihal"=>$perihal,
				"tanggal_pergi"=>$_POST['tgl_berangkat'],
				"tanggal_pulang"=>$_POST['tgl_pulang'],
				"hari"=>$_POST['hari'],
				"waktu"=>$_POST['waktu'],
				"tempat"=>$_POST['tujuan'],
				"jarak_id"=>$_POST['jarak'],
				"acara"=>$_POST['acara'],
				"kendaraan"=>$_POST['kendaraan'],
				"program_id"=>$_POST['program'],
				"kegiatan_id"=>$_POST['kegiatan'],
				"jenis_paket"=>$_POST['paket']
			);
			$this->db->where('id', $id);
			$this->db->update('sppd', $data);
			$this->db->where('sppd_id', $id);
			$this->db->delete('transaksi_sppd');
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('sppd_luar');
		}
	}

	public function hapus($id)
	{
		$path = 'assets/qrcode/'.getqr($id);
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('sppd_luar');
		}else{
			unlink($path);
			$this->db->where('sppd_id', $id);
			$this->db->delete('transaksi_sppd');
			$this->db->where('id', $id);
			$this->db->delete('sppd');
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('sppd_luar');
		}
	}

	public function lhpd($id)
	{
		$data=array(
			"title"=>'Laporan Hasil Perjalanan Dinas',
			"aktif"=>"sppdluar",
			"id" => $id,
			"pegawai"=>$this->M_sppd_luar->getpegawai($id),
			"sppd"=>$this->M_sppd_luar->getrow($id),
			"content"=>"sppd_luar/lhpd.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('SPPD Luar Daerah', site_url('Sppd_luar'));
		$this->breadcrumb->append_crumb('Input Laporan Perjalanan', site_url('Sppd_luar/add'));
		$this->load->view('template',$data);
	}

	public function savelhpd($id)
	{
		$this->load->library('Pdf');
		$skpd = $this->session->userdata('skpd');
		$data=array(
			"title"=>'Cetak LHPD',
			"id" => $id,
			"skpd" => $skpd,
			"kegiatan"=>$this->M_sppd_luar->getrow($id),
			"all"=>$this->M_sppd_luar->all($id),
			"skpd"=>$this->M_sppd_luar->skpd(),
			"tgl_cetak"=>$_POST['tgl_cetak'],
			"lhpd"=>$_POST['lhpd']
		);
		$lhpd=$_POST['lhpd'];
		if($lhpd == "" || $lhpd == "<p><br></p>" || $lhpd == "<p></p>"){
			$this->session->set_flashdata('error',"Anda Belum Mengisi Laporan Perjalanan Dinas");
			redirect('sppd_luar/lhpd/'.$id);
		}else{
			$data2=array(
				"lhpd"=> $lhpd,
				"status"=> 4
			);
			$this->db->where('id', $id);
			$this->db->update('sppd', $data2);
			$this->pdf->setPaper('legal', 'potrait');
			$this->pdf->filename = "Cetak-LHPD.pdf";
			$this->pdf->load_view('cetak/cetak_lhpd', $data);
		}
	}
}