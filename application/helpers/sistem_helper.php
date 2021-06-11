<?php
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userdata('akses') == 1){
        redirect('Dashboard');
    }elseif($ci->session->userdata('akses') == 2){
        redirect('Calendar');
    }
}
function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('user')){
        redirect('login');
    }
}
function getId($tabel,$id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%04s", $tmp);
        }
    }
    else
    {
        $kd = "000000001";
    }
    return $kd;
}
function nomor($id)
{
    $kd = sprintf("%04s", $id);
    return $kd;
}
function menuaktif($aktif,$menu){
    if($aktif==$menu){
        return "nav-link active";
    }else{
        return "nav-link";
    }
}
function getmenu(){
    $CI =& get_instance();
	if($CI->session->userdata('level')==1){
        return "sidebar.php";
    }elseif($CI->session->userdata('level')==2){
        return "menucomercial.php";
    }elseif($CI->session->userdata('level')==3){
        return "menutechnical.php";
    }elseif($CI->session->userdata('level')==4||$CI->session->userdata('level')==5||$CI->session->userdata('level')==6){
        return "menuadministration.php";
    }
}
function levelsuper(){
    $CI =& get_instance();
    if($CI->session->userdata('level')!=1){
        $CI->session->set_flashdata('error', "Anda Tidak Memiliki Akses Pada Halaman Tersebut");
        redirect('Calendar');
    }
}
function levelpptk(){
    $CI =& get_instance();
    if($CI->session->userdata('level')!=2){
        $CI->session->set_flashdata('error', "Anda Tidak Memiliki Akses Pada Halaman Tersebut");
        redirect('Dashboard');
    }
}
function levelbendahara(){
    $CI =& get_instance();
    if($CI->session->userdata('level')!=3){
        $CI->session->set_flashdata('error', "Anda Tidak Memiliki Akses Pada Halaman Tersebut");
        redirect('Dashboard');
    }
}
function getnama($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from admin where username='$id'")->row_array();
    return $q['nama'];
}
function getidskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from admin where username='$id'")->row_array();
    return $q['skpd_id'];
}
function getidpeg($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from admin where username='$id'")->row_array();
    return $q['pegawai_id'];
}
function getnamaskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from admin JOIN setting ON setting.kode_opd = admin.skpd_id where username='$id'")->row_array();
    return $q['nama_opd'];
}
function getkopskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from setting where kode_opd='$id'")->row_array();
    return $q['kop_opd'];
}
function getkepalaskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from setting where kode_opd='$id'")->row_array();
    return $q['kepala_opd'];
}
function getsingkatanskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from setting where id='$id'")->row_array();
    return $q['singkatan_opd'];
}
function getskpd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from setting where kode_opd='$id'")->row_array();
    return $q['singkatan_opd'];
}
function getpegawai($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['nama'];
}
function getnip($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['nip'];
}
function getjab($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['jabatan'];
}
function getgol($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai JOIN master_golongan ON master_pegawai.golongan_id = master_golongan.id_golongan where master_pegawai.golongan_id='$r'")->row_array();
    return $q['golongan'];
}
function getgolpeg($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['golongan_id'];
}
function getpangkat($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai JOIN master_golongan ON master_pegawai.golongan_id = master_golongan.id_golongan where master_pegawai.golongan_id='$r'")->row_array();
    return $q['pangkat'];
}
function getpangkatpeg($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['pangkat'];
}
function getdepan($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['gelar_depan'];
}
function getbelakang($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_pegawai where id='$r'")->row_array();
    return $q['gelar_belakang'];
}
function getprogram($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_program where id='$r'")->row_array();
    return $q['nama'];
}
function getkodeprog($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_program where id='$r'")->row_array();
    return $q['kode'];
}
function getkeg($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_kegiatan where id_kegiatan='$r'")->row_array();
    return $q['nama_kegiatan'];
}
function getkodekeg($r)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_kegiatan where id_kegiatan='$r'")->row_array();
    return $q['kode_kegiatan'];
}
function getqr($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['qrcode'];
}
function getcetak($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['tgl_cetak'];
}
function getkegiatan($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['acara'];
}
function getberangkat($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['tanggal_pergi'];
}
function getpulang($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['tanggal_pulang'];
}
function gettujuan($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['tempat'];
}
function getkendaraan($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['kendaraan'];
}
function gethari($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['hari'];
}
function getwaktu($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['waktu'];
}
function getstatus($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['status'];
}
function getnomor($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['no_surat_msk'];
}
function getsatker($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['nama_satker'];
}
function getopd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['skpd_id'];
}
function getuser($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['username'];
}
function getperihal($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['perihal'];
}
function cekpegawai($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where sppd_id='$id' LIMIT 1")->row_array();
    return $q['pegawai_id'];
}
function cekpegawaikwt($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['pegawai_id'];
}
function getjumpegawai($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where sppd_id='$id'")->num_rows();
    return $q;
}
function getspt($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['sppd_id'];
}
function getlamanya($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['lamanya'];
}
function getharian($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['uang_harian'];
}
function gettransport($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['uang_transport'];
}
function getrepresentatif($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['uang_representatif'];
}
function gethotel($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['uang_hotel'];
}
function getjumstatus($s)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from penduduk where status='$s'")->num_rows();
    return $q;

}
function rupiah($value) {
    return 'Rp ' .number_format($value,0,',-','.');
}
if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}
if ( ! function_exists('tahun_indo'))
{
	function tahun_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tahun = $pecah[0];
		return $tahun;
	}
}
if ( ! function_exists('romawi_bulan'))
{
	function romawi_bulan($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$bulan = bulan_romawi($pecah[1]);
		return $bulan;
	}
}
if ( ! function_exists('bulan'))
{
	function bulan_romawi($bln)
	{
		switch ($bln)
		{
			case 1:
				return "I";
				break;
			case 2:
				return "II";
				break;
			case 3:
				return "III";
				break;
			case 4:
				return "IV";
				break;
			case 5:
				return "V";
				break;
			case 6:
				return "VI";
				break;
			case 7:
				return "VII";
				break;
			case 8:
				return "VIII";
				break;
			case 9:
				return "IX";
				break;
			case 10:
				return "X";
				break;
			case 11:
				return "XI";
				break;
			case 12:
				return "XII";
				break;
		}
	}
}
if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}
if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}
function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}
/*--------------------------------------------------------------------------*/
function nama_eselon($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_eselon where id_eselon='$id'")->row_array();
    return $q['uraian'];
}
function eselon($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_eselon where id_eselon='$id'")->row_array();
    return $q['eselon'];
}
function ket_ssh($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from ssh_keterangan where id='$id'")->row_array();
    return $q['uraian'];
}
function idkeg($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['kegiatan_id'];
}
function idkegkwt($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from transaksi_sppd where id='$id'")->row_array();
    return $q['kegiatan_id'];
}
function idjarak($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['jarak_id'];
}
function paket($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['jenis_paket'];
}
function jenis_sppd($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['jenis_sppd'];
}
function idprog($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from sppd where id='$id'")->row_array();
    return $q['program_id'];
}
function getpejabat($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_uraian where kegiatan_id='$id'")->row_array();
    return $q['pejabat_id'];
}
function getkota($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_jarak where id_jarak='$id'")->row_array();
    return $q['nama_kota'];
}
function getprovinsi($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_jarak where id_jarak='$id'")->row_array();
    return $q['nama_provinsi'];
}
function getkategori($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from master_jarak where id_jarak='$id'")->row_array();
    return $q['kategori'];
}
function realisasi($keg, $jenis)
{
    $ci=& get_instance();
    $q = $ci->db->query("select SUM(total) as realisasi FROM `transaksi_sppd` where kegiatan_id='$keg' AND jenis_sppd = '$jenis' AND validasi = '2'")->row_array();
    return $q['realisasi'];
}