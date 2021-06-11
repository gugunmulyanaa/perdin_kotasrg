<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi_dalam extends CI_Controller {
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
        $this->load->model('M_kwitansi_dalam');
	}
	
    public function kwitansi($id)
	{
		$keg=idkeg($id);
		$pagutotal=$this->M_kwitansi_dalam->getpagu($keg);
		$pagubelanja=$this->M_kwitansi_dalam->getpagubelanja($id);
		$pagudigunakan=$this->M_kwitansi_dalam->getusepagu($keg);
		$pagupersen= $pagudigunakan/$pagutotal * 100;
		$data=array(
			"title"=>'Detail Perkegiatan SPPD Dalam Daerah',
			"aktif"=>"sppddalam",
			"id" => $id,
			"pagutotal" => $pagutotal,
			"pagudigunakan" => $pagudigunakan,
			"pagubelanja" => $pagubelanja,
			"pagupersen" => $pagupersen,
			"kwitansi"=>$this->M_kwitansi_dalam->getall($id),
			"asn"=>$this->M_kwitansi_dalam->getpegawai(),
			"thl"=>$this->M_kwitansi_dalam->getthl(),
			"sopir"=>$this->M_kwitansi_dalam->getsopir(),
			"content"=>"kwitansi_dalam/kwitansi.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Detail SPPD dalam daerah', site_url('Kwitansi_dalam'));
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		$keg=idkegkwt($id);
		$spt=getspt($id);
		$pegawai=cekpegawaikwt($id);
		$eselon = $this->M_kwitansi_dalam->geteselon($pegawai);
		$harian = $this->M_kwitansi_dalam->getharian($eselon);
		$transport = 0;
		$representasi = $this->M_kwitansi_dalam->getrepresentasi($eselon);
		$akomodasi = 0;
		$pagutotal=$this->M_kwitansi_dalam->getpagu($keg);
		$pagubelanja=$this->M_kwitansi_dalam->getpagubelanja($spt);
		$pagudigunakan=$this->M_kwitansi_dalam->getusepagu($keg);
		$pagupersen= $pagudigunakan/$pagutotal * 100;
		$data=array(
			"title"=>'Edit Belanja Biaya SPPD Dalam Daerah',
			"aktif"=>"sppddalam",
			"id" => $id,
			"pagutotal" => $pagutotal,
			"pagudigunakan" => $pagudigunakan,
			"pagubelanja" => $pagubelanja,
			"pagupersen" => $pagupersen,
			"harian" => $harian,
			"transport" => $transport,
			"representatif" => $representasi,
			"hotel" => $akomodasi,
			"getrow"=>$this->M_kwitansi_dalam->getrow($id),
			"pegawai"=>$this->M_kwitansi_dalam->getpegawai(),
			"content"=>"kwitansi_dalam/edit_kwitansi.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Detail SPPD Dalam Daerah', site_url('kwitansi_dalam'));
		$this->breadcrumb->append_crumb('Edit Biaya Belanja', site_url('kwitansi_dalam/edit'));
		$this->load->view('template',$data);
	}

	public function add_auto_kwitansi($id)
	{
		$berangkat=getberangkat($id);
		$pulang=getpulang($id);
		$satker=getopd($id);
		$indobrg=tgl_indo($berangkat);
		$indoplg=tgl_indo($pulang);
		$namasatker=getskpd($satker);
		$pptk=getuser($id);
		$namapptk=getnama($pptk);
		$program = idprog($id);
		$kegiatan = idkeg($id);
		$pegawai=$_POST['pegawai'];
		$cek=$this->db->query("SELECT transaksi_sppd.sppd_id, sppd.id, pegawai_id, tanggal_pergi, tanggal_pulang  FROM `transaksi_sppd` JOIN `sppd` ON transaksi_sppd.sppd_id = sppd.id WHERE pegawai_id = '$pegawai' AND sppd.tanggal_pulang >= '$berangkat' AND sppd.tanggal_pergi <= '$pulang'")->num_rows();
		$selisih = date_diff(date_create($pulang), date_create($berangkat));
		$lamanya1 = $selisih->format('%a');
		$lamanya = $lamanya1 + 1;
		$kategori = $this->M_kwitansi_dalam->getkategori($pegawai);
		$eselon = $this->M_kwitansi_dalam->geteselon($pegawai);
		$harian = $this->M_kwitansi_dalam->getharian($eselon);
		$t_harian = ($lamanya * $harian);
		$transport = 0;
		$t_transport = ($lamanya * 0);
		$representasi = $this->M_kwitansi_dalam->getrepresentasi($eselon);
		$t_representasi = ($lamanya * $representasi);
		$akomodasi = 0;
		$t_akomodasi = ($lamanya * 0 );
		$total = ($t_harian + $t_transport + $t_representasi + $t_akomodasi);
		$pagutotal=$this->M_kwitansi_dalam->getpagu($kegiatan);
		$pagudigunakan=$this->M_kwitansi_dalam->getusepagu($kegiatan);
		$pagunow = $total + $pagudigunakan;
		$cekpagu = $pagutotal - $pagunow;
		$this->form_validation->set_rules('pegawai', 'pegawai', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diInput hubungi Diskominfo Kota Serang");
			redirect('kwitansi_dalam/kwitansi/'.$id);
		}elseif($cek>0){
			$this->session->set_flashdata('error',"Pegawai memiliki kegiatan lain di tanggal $indobrg sampai $indoplg dibuat oleh $namapptk pada $namasatker");
			redirect('kwitansi_dalam/kwitansi/'.$id);
		}elseif($cekpagu<0){
			$this->session->set_flashdata('error',"Pagu Anggaran anda pada kegiatan ini sudah melewati batas");
			redirect('kwitansi_dalam/kwitansi/'.$id);
		}else{			
			$data=array(
				"sppd_id"=>$id,
				"jenis_sppd"=>1,
				"program_id"=>$program,
				"kegiatan_id"=>$kegiatan,
				"kategori"=>$kategori,
				"pegawai_id"=>$_POST['pegawai'],
				"lamanya" => $lamanya,
				"uang_harian"=>$harian,
				"uang_transport"=>$transport,
				"uang_representatif"=>$representasi,
				"uang_hotel"=>$akomodasi,
				"tot_harian"=>$t_harian,
				"tot_transport"=>$t_transport,
				"tot_representatif"=>$t_representasi,
				"tot_hotel"=>$t_akomodasi,
				"total"=>$total,
				"validasi"=>1
			);
			$this->db->insert('transaksi_sppd',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('kwitansi_dalam/kwitansi/'.$id);
		}
	}

	public function editkwitansi($id)
	{
		$this->form_validation->set_rules('harian', 'harian', 'required');
		$this->form_validation->set_rules('transport', 'transport', 'required');
		$this->form_validation->set_rules('representatif', 'representatif', 'required');
		$this->form_validation->set_rules('hotel', 'hotel', 'required');
		$id_spt = getspt($id);
		/*----------------------------------*/
		$harian = str_replace('.', '', $_POST['harian']);
		$transport = str_replace('.', '', $_POST['transport']);
		$representatif = str_replace('.', '', $_POST['representatif']);
		$hotel = str_replace('.', '', $_POST['hotel']);
		/*----------------------------------*/
		$pegawai=cekpegawaikwt($id);
		$eselon = $this->M_kwitansi_dalam->geteselon($pegawai);
		$lamanya = getlamanya($id);
		$lamanyaht = $lamanya - 1;
		$cekharian = $this->M_kwitansi_dalam->getharian($eselon);
		$t_harian = ($lamanya * $harian);
		$cektransport = 0;
		$t_transport = ($lamanya * 0);
		$cekrepresentatif = $this->M_kwitansi_dalam->getrepresentasi($eselon);
		$t_representasi = ($lamanya * $representatif);
		$cekhotel = 0;
		$t_hotel = ($lamanyaht * 0);
		$total =($t_harian + $t_transport + $t_representasi + $t_hotel);
		/*--------------------------------------------------------------*/
		$kegiatan = idkeg($id_spt);
		$pagutotal=$this->M_kwitansi_dalam->getpagu($kegiatan);
		$pagudigunakan=$this->M_kwitansi_dalam->getusepagu($kegiatan);
		$pagunow = $total + $pagudigunakan;
		$cekpagu = $pagutotal - $pagunow;
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi Diskominfo Kota Serang");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}elseif($harian > $cekharian || $transport > $cektransport || $representatif > $cekrepresentatif || $hotel > $cekhotel){
			$this->session->set_flashdata('error',"Biaya Belanja anda melebihi SSH yang berlaku");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}elseif($cekpagu<0){
			$this->session->set_flashdata('error',"Pagu Anggaran anda pada kegiatan ini sudah melewati batas");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}else{
			$data=array(
				"uang_harian"=>$harian,
				"uang_transport"=>$transport,
				"uang_representatif"=>$representatif,
				"uang_hotel"=>$hotel,
				"tot_harian"=>$t_harian,
				"tot_transport"=>$t_transport,
				"tot_representatif"=>$t_representasi,
				"tot_hotel"=>$t_hotel,
				"total"=>$total,
			);
			$this->db->where('id', $id);
			$this->db->update('transaksi_sppd', $data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}
	}

	public function hapuskwitansi($id)
	{
		$id_spt = getspt($id);
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}else{
			$data=array(
				"status"=>1,
			);
			$this->db->where('id', $id);
			$this->db->delete('transaksi_sppd');
			$this->db->where('id', $id_spt);
			$this->db->update('sppd', $data);
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('kwitansi_dalam/kwitansi/'.$id_spt);
		}
	}
}