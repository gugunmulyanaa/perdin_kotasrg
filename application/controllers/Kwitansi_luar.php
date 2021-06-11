<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi_luar extends CI_Controller {
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
        $this->load->model('M_kwitansi_luar');
	}
	
    public function kwitansi($id)
	{
		$keg=idkeg($id);
		$pagutotal=$this->M_kwitansi_luar->getpagu($keg);
		$pagubelanja=$this->M_kwitansi_luar->getpagubelanja($id);
		$pagudigunakan=$this->M_kwitansi_luar->getusepagu($keg);
		$pagupersen= $pagudigunakan/$pagutotal * 100;
		$data=array(
			"title"=>'Daftar Pegawai Bertugas Perkegiatan SPPD',
			"aktif"=>"sppdluar",
			"id" => $id,
			"pagutotal" => $pagutotal,
			"pagubelanja" => $pagubelanja,
			"pagudigunakan" => $pagudigunakan,
			"pagupersen" => $pagupersen,
			"kwitansi"=>$this->M_kwitansi_luar->getall($id),
			"asn"=>$this->M_kwitansi_luar->getpegawai(),
			"thl"=>$this->M_kwitansi_luar->getthl(),
			"sopir"=>$this->M_kwitansi_luar->getsopir(),
			"content"=>"kwitansi_luar/kwitansi.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
        $this->breadcrumb->append_crumb('Detail SPPD Luar daerah', site_url('Kwitansi_luar'));
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		$keg=idkegkwt($id);
		$spt=getspt($id);
		$pegawai=cekpegawaikwt($id);
		$eselon = $this->M_kwitansi_luar->geteselon($pegawai);
		$jarak = idjarak($spt);
		$provinsi = getprovinsi($jarak);
		$kategori = getkategori($jarak);
		$paket = paket($spt);
		$idtrans = $this->M_kwitansi_luar->jarak($jarak);
		/*Start Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		if($paket == 2 && $provinsi == 'BANTEN'){
			$harian = $this->M_kwitansi_luar->non_dlm_banten($eselon);
		}elseif($paket == 2 && $provinsi == 'JAKARTA'){
			$harian = $this->M_kwitansi_luar->non_jakarta($eselon);
		}elseif($paket == 2 ){
			$harian = $this->M_kwitansi_luar->non_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Harian Luar Daerah Paket Fullboard*/
		if($paket == 3 && $provinsi == 'BANTEN'){
			$harian = $this->M_kwitansi_luar->full_dlm_banten($eselon);
		}elseif($paket == 3 && $provinsi == 'JAKARTA'){
			$harian = $this->M_kwitansi_luar->full_jakarta($eselon);
		}elseif($paket == 3 ){
			$harian = $this->M_kwitansi_luar->full_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Akomodasi*/
		if($kategori = 1){
			$akomodasi = $this->M_kwitansi_luar->ako_pulau_jawa($eselon);
		}elseif($provinsi == 'JAKARTA'){
			$akomodasi = $this->M_kwitansi_luar->ako_jakarta($eselon);
		}elseif($kategori == 2 ){
			$akomodasi = $this->M_kwitansi_luar->ako_luar_jawa($eselon);
		}
		/*END Pengecekan Akomodasi*/
		/*Start Pengecekan Representasi*/
		if($provinsi == 'BANTEN'){
			$representasi = $this->M_kwitansi_luar->rep_dalam_prov($eselon);
		}else{
			$representasi = $this->M_kwitansi_luar->rep_luar_prov($eselon);
		}
		/*END Pengecekan Representasi*/
		/*Start Pengecekan Transport*/
		if($provinsi == 'JAKARTA'){
			$transport = $this->M_kwitansi_luar->trans_jakarta($eselon);
		}else{
			$transport = $this->M_kwitansi_luar->trans_luar($idtrans, $eselon);
		}
		/*END Pengecekan Transport*/
		$pagutotal=$this->M_kwitansi_luar->getpagu($keg);
		$pagubelanja=$this->M_kwitansi_luar->getpagubelanja($spt);
		$pagudigunakan=$this->M_kwitansi_luar->getusepagu($keg);
		$pagupersen= $pagudigunakan/$pagutotal * 100;
		$data=array(
			"title"=>'Edit Belanja Biaya SPPD Luar Daerah',
			"aktif"=>"sppdluar",
			"id" => $id,
			"pagutotal" => $pagutotal,
			"pagudigunakan" => $pagudigunakan,
			"pagubelanja" => $pagubelanja,
			"pagupersen" => $pagupersen,
			"harian" => $harian,
			"transport" => $transport,
			"representatif" => $representasi,
			"hotel" => $akomodasi,
			"getrow"=>$this->M_kwitansi_luar->getrow($id),
			"pegawai"=>$this->M_kwitansi_luar->getpegawai(),
			"content"=>"kwitansi_luar/edit_kwitansi.php",
		);
        $this->breadcrumb->append_crumb('Home', site_url('Dashboard'));
		$this->breadcrumb->append_crumb('Detail SPPD Luar Daerah', site_url('kwitansi_luar'));
		$this->breadcrumb->append_crumb('Edit Biaya Belanja', site_url('kwitansi_luar/edit'));
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
		$jarak = idjarak($id);
		$provinsi = getprovinsi($jarak);
		$kategori = getkategori($jarak);
		$paket = paket($id);
		$idtrans = $this->M_kwitansi_luar->jarak($jarak);
		$kategori = $this->M_kwitansi_luar->getkategori($pegawai);
		$eselon = $this->M_kwitansi_luar->geteselon($pegawai);
		/*Start Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		if($paket == 2 && $provinsi == 'BANTEN'){
			$harian = $this->M_kwitansi_luar->non_dlm_banten($eselon);
		}elseif($paket == 2 && $provinsi == 'JAKARTA'){
			$harian = $this->M_kwitansi_luar->non_jakarta($eselon);
		}elseif($paket == 2 ){
			$harian = $this->M_kwitansi_luar->non_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Harian Luar Daerah Paket Fullboard*/
		if($paket == 3 && $provinsi == 'BANTEN'){
			$harian = $this->M_kwitansi_luar->full_dlm_banten($eselon);
		}elseif($paket == 3 && $provinsi == 'JAKARTA'){
			$harian = $this->M_kwitansi_luar->full_jakarta($eselon);
		}elseif($paket == 3 ){
			$harian = $this->M_kwitansi_luar->full_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Akomodasi*/
		if($kategori = 1){
			$akomodasi = $this->M_kwitansi_luar->ako_pulau_jawa($eselon);
		}elseif($provinsi == 'JAKARTA'){
			$akomodasi = $this->M_kwitansi_luar->ako_jakarta($eselon);
		}elseif($kategori == 2 ){
			$akomodasi = $this->M_kwitansi_luar->ako_luar_jawa($eselon);
		}
		/*END Pengecekan Akomodasi*/
		/*Start Pengecekan Representasi*/
		if($provinsi == 'BANTEN'){
			$representasi = $this->M_kwitansi_luar->rep_dalam_prov($eselon);
		}else{
			$representasi = $this->M_kwitansi_luar->rep_luar_prov($eselon);
		}
		/*END Pengecekan Representasi*/
		/*Start Pengecekan Transport*/
		if($provinsi == 'JAKARTA'){
			$transport = $this->M_kwitansi_luar->trans_jakarta($eselon);
		}else{
			$transport = $this->M_kwitansi_luar->trans_luar($idtrans, $eselon);
		}
		/*END Pengecekan Transport*/
		$t_harian = ($lamanya * $harian);
		$t_transport = $transport;
		$t_representasi = ($lamanya * $representasi);
		$t_akomodasi = ($lamanya1 * $akomodasi);
		$total = ($t_harian + $t_transport + $t_representasi + $t_akomodasi);
		/*Start Pengecekan Pagu Anggaran*/	
		$pagutotal=$this->M_kwitansi_luar->getpagu($kegiatan);
		$pagudigunakan=$this->M_kwitansi_luar->getusepagu($kegiatan);
		$pagunow = $total + $pagudigunakan;
		$cekpagu = $pagutotal - $pagunow;	
		/*END Pengecekan Pagu Anggaran*/
		$this->form_validation->set_rules('pegawai', 'pegawai', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diInput hubungi Diskominfo Kota Serang");
			redirect('kwitansi_luar/kwitansi/'.$id);
		}elseif($cek>0){
			$this->session->set_flashdata('error',"Pegawai memiliki kegiatan lain di tanggal $indobrg sampai $indoplg dibuat oleh $namapptk pada $namasatker");
			redirect('kwitansi_luar/kwitansi/'.$id);
		}elseif($cekpagu<0){
			$this->session->set_flashdata('error',"Pagu Anggaran anda pada kegiatan ini tidak mencukupi");
			redirect('kwitansi_luar/kwitansi/'.$id);
		}else{			
			$data=array(
				"sppd_id"=>$id,
				"jenis_sppd"=>2,
				"program_id"=>$program,
				"kegiatan_id"=>$kegiatan,
				"kategori"=>$kategori,
				"pegawai_id"=>$pegawai,
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
			redirect('kwitansi_luar/kwitansi/'.$id);
		}
	}

	public function editkwitansi($id)
	{
		$this->form_validation->set_rules('harian', 'harian', 'required');
		$this->form_validation->set_rules('transport', 'transport', 'required');
		$this->form_validation->set_rules('representatif', 'representatif', 'required');
		$this->form_validation->set_rules('hotel', 'hotel', 'required');
		$id_spt = getspt($id);
		$harian = str_replace('.', '', $_POST['harian']);
		$transport = str_replace('.', '', $_POST['transport']);
		$representatif = str_replace('.', '', $_POST['representatif']);
		$hotel = str_replace('.', '', $_POST['hotel']);
		/*-------------------------------------------------------------*/
		$jarak = idjarak($id_spt);
		$provinsi = getprovinsi($jarak);
		$kategori = getkategori($jarak);
		$paket = paket($id_spt);
		$pegawai=cekpegawaikwt($id);
		$eselon = $this->M_kwitansi_luar->geteselon($pegawai);
		/*Start Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		if($paket == 2 && $provinsi == 'BANTEN'){
			$cekharian = $this->M_kwitansi_luar->non_dlm_banten($eselon);
		}elseif($paket == 2 && $provinsi == 'JAKARTA'){
			$cekharian = $this->M_kwitansi_luar->non_jakarta($eselon);
		}elseif($paket == 2 ){
			$cekharian = $this->M_kwitansi_luar->non_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Harian Luar Daerah Paket Fullboard*/
		if($paket == 3 && $provinsi == 'BANTEN'){
			$cekharian = $this->M_kwitansi_luar->full_dlm_banten($eselon);
		}elseif($paket == 3 && $provinsi == 'JAKARTA'){
			$cekharian = $this->M_kwitansi_luar->full_jakarta($eselon);
		}elseif($paket == 3 ){
			$cekharian = $this->M_kwitansi_luar->full_luar_banten($eselon);
		}
		/*END Pengecekan Harian Luar Daerah Paket Non Fullboard*/
		/*Start Pengecekan Akomodasi*/
		if($kategori = 1){
			$cekhotel = $this->M_kwitansi_luar->ako_pulau_jawa($eselon);
		}elseif($provinsi == 'JAKARTA'){
			$cekhotel = $this->M_kwitansi_luar->ako_jakarta($eselon);
		}elseif($kategori == 2 ){
			$cekhotel = $this->M_kwitansi_luar->ako_luar_jawa($eselon);
		}
		/*END Pengecekan Akomodasi*/
		/*Start Pengecekan Representasi*/
		if($provinsi == 'BANTEN'){
			$cekrepresentatif = $this->M_kwitansi_luar->rep_dalam_prov($eselon);
		}else{
			$cekrepresentatif = $this->M_kwitansi_luar->rep_luar_prov($eselon);
		}
		/*END Pengecekan Representasi*/
		$lamanya = getlamanya($id);
		$lamanyaht = $lamanya - 1;
		$t_harian = ($lamanya * $harian );
		$t_transport = $transport;
		$t_representatif = ($lamanya * $representatif );
		$t_hotel = ($lamanyaht * $hotel );
		$total = ($t_harian + $t_transport + $t_representatif + $t_hotel);
		/*--------------------------------------------------------------*/
		$kegiatan = idkeg($id_spt);
		$pagutotal=$this->M_kwitansi_luar->getpagu($kegiatan);
		$pagudigunakan=$this->M_kwitansi_luar->getusepagu($kegiatan);
		$pagunow = $total + $pagudigunakan;
		$cekpagu = $pagutotal - $pagunow;
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Gagal diinput hubungi developer");
			redirect('kwitansi_luar/kwitansi/'.$id_spt);
		}elseif($harian > $cekharian || $representatif > $cekrepresentatif || $hotel > $cekhotel){
			$this->session->set_flashdata('error',"Biaya Belanja anda melebihi SSH yang berlaku");
			redirect('kwitansi_luar/kwitansi/'.$id_spt);
		}elseif($cekpagu<0){
			$this->session->set_flashdata('error',"Pagu Anggaran anda pada kegiatan ini sudah melewati batas");
			redirect('kwitansi_luar/kwitansi/'.$id);
		}else{
			$data=array(
				"uang_harian"=>$harian,
				"uang_transport"=>$transport,
				"uang_representatif"=>$representatif,
				"uang_hotel"=>$hotel,
				"tot_harian"=>$t_harian,
				"tot_transport"=>$t_transport,
				"tot_representatif"=>$t_representatif,
				"tot_hotel"=>$t_hotel,
				"total"=>$total,
			);
			$this->db->where('id', $id);
			$this->db->update('transaksi_sppd', $data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('kwitansi_luar/kwitansi/'.$id_spt);
		}
	}

	public function hapuskwitansi($id)
	{
		$id_spt = getspt($id);
		if($id==""){
			$this->session->set_flashdata('error', "Data Gagal Dihapus Hubungi Developer");
			redirect('kwitansi_luar/kwitansi/'.$id_spt);
		}else{
			$data=array(
				"status"=>1,
			);
			$this->db->where('id', $id);
			$this->db->delete('transaksi_sppd');
			$this->db->where('id', $id_spt);
			$this->db->update('sppd', $data);
			$this->session->set_flashdata('sukses', "Data Berhasil Di Hapus");
			redirect('kwitansi_luar/kwitansi/'.$id_spt);
		}
	}
}