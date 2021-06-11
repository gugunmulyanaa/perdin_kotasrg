<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="Copyright" content="PEMERINTAH KOTA SERANG"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online PEMERINTAH KOTA SERANG" />
	<title><?php echo $title; ?> || <?php echo $skpd['singkatan_opd']; ?> KOTA SERANG</title>
	<style>
        table.table-bordered{
            border-collapse: collapse;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
            vertical-align: top;
        }
        h4{
            font-size:14pt;
            margin-bottom:0px;
        }
        p{
            font-size:12pt;
            margin:1.5px;
        }
        h1{
            page-break-before: always;
        }
    </style>
</head>
<body>
    <section>
        <center><img style="width:700px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/'.$setda['kop_opd']; ?>" alt=""></center>
        <div style="text-align:center;">
            <h4>
            <b><u>SURAT PERINTAH PERJALANAN DINAS</u></b>
            </h4>
            <span>Nomor : 800/<?php echo nomor($kegiatan['id']); ?>/<?php echo $skpd['singkatan_opd']; ?>/<?php echo romawi_bulan($kegiatan['tgl_cetak']); ?>/<?php echo tahun_indo($kegiatan['tgl_cetak']); ?></span>
        </div>
        <br><br>
        <table class="table table-bordered" style="width:100%;margin-top:0px">
            <tbody>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">1.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Pejabat berwenang yang memberi perintah</p></td>
                    <td style="width:47%;"><p style="margin:4px;">SEKRETARIAT DAERAH<br><?php echo getdepan($setda['kepala_opd']); ?> <?php echo getpegawai($setda['kepala_opd']); ?>, <?php echo getbelakang($setda['kepala_opd']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">2.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Nama/NIP yang diberikan perintah</p></td>
                    <td style="width:47%"><p style="margin:4px;"><?php echo getdepan($kwitansi['pegawai_id']); ?> <?php echo getpegawai($kwitansi['pegawai_id']); ?> <?php echo getbelakang($kwitansi['pegawai_id']); ?> /<br>
                    <?php echo getnip($kwitansi['pegawai_id']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">3.</p></td>
                    <td style="width:47%"><p style="margin:4px;">a. Pangkat dan golongan ruang gaji<br>Menurut PP No.6 Tahun 1997<br>b. Jabatan/Instansi<br>c. Tingkat Biaya Perjalanan Dinas</p></td>
                    <td style="width:47%"><p style="margin:4px;">a. <?php echo getpangkat(getgolpeg($kwitansi['pegawai_id'])); ?> <?php echo getgol(getgolpeg($kwitansi['pegawai_id'])); ?><br><br>b. <?php echo getjab($kwitansi['pegawai_id']); ?><br>c. Luar Daerah</p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">4.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Maksud Perjalanan Dinas</td>
                    <td style="width:47%"><p style="text-align:justify;margin:4px;"><?php echo $kegiatan['acara']; ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">5.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Alat Angkut</td>
                    <td style="width:47%"><p style="margin:4px;"><?php echo $kegiatan['kendaraan']; ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">6.</p></td>
                    <td style="width:47%"><p style="margin:4px;">a. Tempat Berangkat<br>b. Tempat Tujuan</td>
                    <td style="width:47%"><p style="margin:4px;">a. <?php echo $skpd['singkatan_opd']; ?> Kota Serang<br>b. <?php echo $kegiatan['tempat']; ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">7.</p></td>
                    <td style="width:47%"><p style="margin:4px;">a. Lamanya Perjalanan Dinas<br>b. Tanggal Berangkat<br>c. Tanggal Pulang</p></td>
                    <td style="width:47%"><p style="margin:4px;">a. <?php echo $kwitansi['lamanya']; ?> Hari<br>b. <?php echo tgl_indo($kegiatan['tanggal_pergi']); ?><br>c. <?php echo tgl_indo($kegiatan['tanggal_pulang']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">8.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Pengikut <span style="padding-left:60px">Nama</span>
                    <?php $no=0; foreach($pengikut as $row): $no++ ?>
                    <br><?= $no; ?>. <?= getdepan($row->pegawai_id); ?> <?= getpegawai($row->pegawai_id); ?>, <?= getbelakang($row->pegawai_id); ?>
                    <?php endforeach; ?>
                    <?php $jumlah = count($pengikut); 
                        if($jumlah == 0){
                            echo '<br>1.<br>2.<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 1){
                            echo '<br>2.<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 2){
                            echo '<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 3){
                            echo '<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 4){
                            echo '<br>5.<br>6.';
                        }elseif($jumlah == 5){
                            echo '<br>6.';
                        }else{
                            echo '';
                        }?></p></td>
                    <td style="width:47%"><p style="margin:4px;">Tanggal Lahir <span style="padding-left:60px">Keterangan</span>
                    <?php $no=0; foreach($pengikut as $row): $no++ ?>
                    <br><?= $no; ?>.
                    <?php endforeach; ?>
                    <?php $jumlah = count($pengikut); 
                        if($jumlah == 0){
                            echo '<br>1.<br>2.<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 1){
                            echo '<br>2.<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 2){
                            echo '<br>3.<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 3){
                            echo '<br>4.<br>5.<br>6.';
                        }elseif($jumlah == 4){
                            echo '<br>5.<br>6.';
                        }elseif($jumlah == 5){
                            echo '<br>6.';
                        }else{
                            echo '';
                        }?><br></p></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;">9.</p></td>
                    <td style="width:47%"><p style="margin:4px;">Pembeban Anggaran<br>a. Instansi<br>b. Kode Rekening<br>c. Mata Anggaran</p></td>
                    <td style="width:47%"><p style="margin:4px;"><br>a. <?php echo $skpd['singkatan_opd']; ?> Kota Serang<br>b. <?php echo getkodeprog($kwitansi['program_id']); ?>.<?php echo getkodekeg($kwitansi['kegiatan_id']); ?>.5.2.2.15.02<br>c. Tahun <?php echo tahun_indo($kegiatan['tgl_cetak']); ?></p></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:55%;border-color:white"></td>
                    <td style="width:17%;border-color:white"><p style="margin:0px;">Dikeluarkan di</p></td>
                    <td style="width:1%;border-color:white"><p style="margin:0px;">:</p></td>
                    <td style="width:27%;border-color:white"><p style="margin:0px;">Kota Serang</p></td>
                </tr>
                <tr>
                    <td style="width:55%;border-color:white"></td>
                    <td style="width:17%;border-color:white"><p style="margin:0px;">Pada tanggal</p></td>
                    <td style="width:1%;border-color:white"><p style="margin:0px;">:</p></td>
                    <td style="width:27%;border-color:white"><p style="margin:0px;"><?php echo tgl_indo(getcetak($kwitansi['sppd_id'])); ?></p></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
            <tr>
                    <td style="width:55%;border-color:white">
                    <img style="padding-left:30px;width:100px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/qrcode/'.$kegiatan['qrcode']; ?>" alt="">
                    </td>
                    <td style="width:45%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b>SEKRETARIS DAERAH</b><br><br><br><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:55%;border-color:white"></td>
                    <td style="width:45%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b><u><?php echo getdepan($setda['kepala_opd']); ?> <?php echo getpegawai($setda['kepala_opd']); ?>, <?php echo getbelakang($setda['kepala_opd']); ?></u></b><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:55%;border-color:white"></td>
                    <td style="width:45%;border-color:white">
                    <p style="text-align:center;margin:0px;"><b>NIP.</b> <?php echo getnip($setda['kepala_opd']); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <h1></h1>
    <section>
        <table class="table table-bordered" style="width:100%;margin-top:0px">
            <tbody>
                <tr>
                    <td colspan="3" style="border-left-style:hidden;border-bottom:1px solid white"><p>I.</p></td>
                    <td style="width:24%;padding-bottom:0px;border-bottom:1px solid white">
                        <p>I. Berangkat dari</p>
                        <p><span style="padding-left:10px">(tempat kedudukan)</span></p>
                        <p style="margin-bottom:0px;"><span style="padding-left:10px">Ke</span></p>
                    </td>
                    <td style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p>
                    <br>
                    <p>:</p>
                    </td>
                    <td style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p><?php echo $skpd['singkatan_opd']; ?></p>
                        <p style="margin-bottom:0px;"><?php echo $kegiatan['tempat']; ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 1------------------------------------->
                <tr>
                    <td colspan="3" style="border-left-style:hidden;border-top:1px solid white"></td>
                    <td style="width:24%;border-right:1px solid white;border-top:1px solid white">
                        <p style="margin-top:0px"><span style="padding-left:10px;">Pada tanggal</span></p>
                    </td>
                    <td style="width:2%;border-left-style:hidden;border-top:1px solid white">
                    <p style="margin-top:0px">:</p>
                    </td>
                    <td style="width:24%;border-right-style:hidden;border-left-style:hidden;border-top:1px solid white">
                        <p style="margin-top:0px"><?php echo tgl_indo($kegiatan['tanggal_pergi']); ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 1------------------------------------->
                <tr>
                    <td colspan="3" style="border-left-style:hidden;"></td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                        <p>An. Kepala</p>
                        <br>
                        <p style="text-align:center"><u><?php echo getdepan($setda['kepala_opd']); ?> <?php echo getpegawai($setda['kepala_opd']); ?>, <?php echo getbelakang($setda['kepala_opd']); ?></u></p>
                        <p style="text-align:center">NIP. <?php echo getnip($setda['kepala_opd']); ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 1------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p>II. Tiba di</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p><?php echo $kegiatan['tempat']; ?></p>
                    </td>
                    <td valign="middle" style="width:24%;padding-bottom:0px;border-bottom:1px solid white">
                        <p>Berangkat dari</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p><?php echo $kegiatan['tempat']; ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 2------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-top:0px;border-bottom:1px solid white">
                        <p><span style="padding-left:20px;">Pada Tanggal</span></p>
                        <p><span style="padding-left:20px;">Kepala</span></p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-top:0px;border-bottom:1px solid white">
                    <p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-top:0px;border-bottom:1px solid white">
                        <p><?php echo tgl_indo($kegiatan['tanggal_pergi']); ?></p>
                    </td>
                    <td valign="middle" style="width:24%;padding-top:0px;border-bottom:1px solid white">
                        <p>Ke</p>
                        <p>Pada Tanggal</p>
                        <p>Kepala</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-top:0px;border-bottom:1px solid white">
                    <p>:</p>
                    <p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-top:0px;border-bottom:1px solid white">
                        <p><?php echo $skpd['singkatan_opd']; ?></p></p>
                        <p><?php echo tgl_indo($kegiatan['tanggal_pulang']); ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 2------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%" align="center"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 2------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p>III. Tiba di</p>
                        <p><span style="padding-left:25px;">Pada Tanggal</span></p>
                        <p><span style="padding-left:25px;">Kepala</span></p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                    <td valign="middle" style="width:24%;padding-bottom:0px;border-bottom:1px solid white">
                        <p>Berangkat dari</p>
                        <p>Ke</p>
                        <p>Pada Tanggal</p>
                        <p>Kepala</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 3------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%" align="center"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 3------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p>IV. Tiba di</p>
                        <p><span style="padding-left:25px;">Pada Tanggal</span></p>
                        <p><span style="padding-left:25px;">Kepala</span></p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                    <td valign="middle" style="width:24%;padding-bottom:0px;border-bottom:1px solid white">
                        <p>Berangkat dari</p>
                        <p>Ke</p>
                        <p>Pada Tanggal</p>
                        <p>Kepala</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p><p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 4------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%" align="center"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 4------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p>V. Tiba di</p>
                        <p><span style="padding-left:20px;">Pada Tanggal</span></p>
                        <p><span style="padding-left:20px;">Kepala</span></p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                    <td valign="middle" style="width:24%;padding-bottom:0px;border-bottom:1px solid white">
                        <p>Berangkat dari</p>
                        <p>Ke</p>
                        <p>Pada Tanggal</p>
                        <p>Kepala</p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><p>:</p><p>:</p><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;border-right-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 5------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%" align="center"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                        <br><br>
                        <p style="text-align:center"><hr width="70%"></p>
                        <p><span style="padding-left:50px;">NIP.</span></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 5------------------------------------->
                <tr>
                    <td style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p>VI. Tiba di</p>
                        <p><span style="padding-left:25px;">(tempat kedudukan)</span></p>
                        <p><span style="padding-left:25px;">Pada Tanggal</span></p>
                    </td>
                    <td valign="middle" style="width:2%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                    <p>:</p><br><p>:</p>
                    </td>
                    <td valign="middle" style="width:24%;border-left-style:hidden;padding-bottom:0px;border-bottom:1px solid white">
                        <p><?php echo $skpd['singkatan_opd']; ?></p><br>
                        <p><?php echo tgl_indo($kegiatan['tanggal_pulang']); ?></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;border-bottom-style:hidden;text-align:justify">
                        <p>Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</p>
                    </td>
                </tr>
                <!--------------------------- Break Line 6------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <p><span style="padding-left:25px;">Pejabat yang berwenang/</span></p>
                        <p><span style="padding-left:25px;">Pejabat lainnya yang ditunjuk</span></p>
                        <br><br>
                        <p style="text-align:center"><u><?php echo getdepan($setda['kepala_opd']); ?> <?php echo getpegawai($setda['kepala_opd']); ?>, <?php echo getbelakang($setda['kepala_opd']); ?></u></p>
                        <p style="text-align:center">NIP. <?php echo getnip($setda['kepala_opd']); ?></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;border-top-style:hidden">
                        <p>Pejabat yang berwenang/</p>
                        <p>Pejabat lainnya yang ditunjuk</p>
                        <br><br>
                        <p style="text-align:center"><u><?php echo getdepan($setda['kepala_opd']); ?> <?php echo getpegawai($setda['kepala_opd']); ?>, <?php echo getbelakang($setda['kepala_opd']); ?></u></p>
                        <p style="text-align:center">NIP. <?php echo getnip($setda['kepala_opd']); ?></p>
                    </td>
                </tr>
                <!--------------------------- Break Line 6------------------------------------->
                <tr>
                    <td valign="top" colspan="3" style="border-left-style:hidden;">
                        <p><b>VII.<span style="padding-left:10px;">Catatan Lain-lain</span></b></p>
                    </td>
                    <td valign="top" colspan="3" style="border-right-style:hidden;">
                    </td>
                </tr>
                <!--------------------------- Break Line 7------------------------------------->
                <tr>
                    <td valign="top" colspan="6" style="border-left-style:hidden;border-right-style:hidden;">
                        <p><b>VIII. PERHATIAN</b></p>
                        <p style="text-align:justify;">Pejabat yang berwenang menerbitkan SPPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal barang/tiba, serta bendaharawan bertanggungjawab berdasarkan peraturan-peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</p>
                    </td>
                </tr>
                <!--------------------------- Break Line 7------------------------------------->
            </tbody>
        </table>
    </section>
</body>
</html>