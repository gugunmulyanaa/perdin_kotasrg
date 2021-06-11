<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="Copyright" content="PEMERINTAH KOTA SERANG"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online PEMERINTAH Kota Serang" />
	<title><?php echo $title; ?> ||<?php echo $skpd['singkatan_opd']; ?> KOTA SERANG</title>
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
            font-size:16pt;
            margin-bottom:0px;
        }
        p{
            font-size:13pt;
            margin:1.5px;
        }
        h1{
            page-break-before: always;
        }
    </style>
</head>
<body>
    <section>
    <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:55%;border-color:white"><img style="width:50px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/qrcode/'.getqr($kwitansi['sppd_id']); ?>" alt=""></td>
                    <td style="width:45%;border-color:white"><p style="margin:0px;">LAMPIRAN II<br>PerMenKeu RI Nomor. 113/PMK 05/2012</p></td>
                </tr>
            </tbody>
        </table>
        <div style="text-align:center;">
            <h4>
            <b><u>RINCIAN BIAYA PERJALANAN DINAS</u></b>
            </h4>
        </div>
        <br><br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:20%;border-color:white"><p>Lampiran No.</p></td>
                    <td style="width:80%;border-color:white"><p>: 800/<?php echo nomor($kegiatan['id']); ?>/<?php echo $skpd['singkatan_opd']; ?>/<?php echo romawi_bulan($kegiatan['tgl_cetak']); ?>/<?php echo tahun_indo($kegiatan['tgl_cetak']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:20%;border-color:white"><p>Tanggal</p></td>
                    <td style="width:80%;border-color:white"><p>: <?php echo tgl_indo(getcetak($kwitansi['sppd_id'])); ?></p></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="width:100%;">
            <tbody>
                <tr>
                    <td style="width:6%"><b style="margin:4px;">NO.</b></td>
                    <td style="width:40%;text-align:center;"><b style="margin:4px;">PERINCIAN BIAYA</b></td>
                    <td style="width:24%;text-align:center;"><b style="margin:4px;">JUMLAH</b></td>
                    <td style="width:30%;text-align:center;"><b style="margin:4px;">KETERANGAN</b></td>
                </tr>
                <tr>
                    <td style="width:6%;border-bottom:1px solid white"><p style="margin:4px;">1.</p><p style="margin:4px;">2.</p><p style="margin:4px;">3.</p><p style="margin:4px;">4.</p><br></td>
                    <td style="width:40%;text-align:justify;border-bottom:1px solid white"><p style="margin:4px;">Uang Harian <?php echo rupiah($kwitansi['uang_harian']); ?> X <?php echo $kwitansi['lamanya']; ?> Hari</p><p style="margin:4px;">Uang Transport <?php echo rupiah($kwitansi['uang_transport']); ?> X 1</p><p style="margin:4px;">Uang Representasi <?php echo rupiah($kwitansi['uang_representatif']); ?> X <?php echo $kwitansi['lamanya']; ?> Hari</p><p style="margin:4px;">Uang Akomodasi <?php echo rupiah($kwitansi['uang_hotel']); ?> X <?php $hotel=$kwitansi['lamanya']-1; echo $hotel; ?> Hari</p><br></td>
                    <td style="width:24%;text-align:right;border-bottom:1px solid white"><p style="margin:4px;"><?php echo rupiah($kwitansi['tot_harian']); ?></p><p style="margin:4px;"><?php echo rupiah($kwitansi['tot_transport']); ?></p><p style="margin:4px;"><?php echo rupiah($kwitansi['tot_representatif']); ?></p><p style="margin:4px;"><?php echo rupiah($kwitansi['tot_hotel']); ?></p><br></td>
                    <td style="width:30%;text-align:justify;border-bottom:1px solid white"><p style="margin:4px;">Biaya Perjalanan Dinas Luar Daerah ke <?php echo gettujuan($kwitansi['sppd_id']); ?>, Selama <?php echo $kwitansi['lamanya']; ?> hari Pada Tanggal <?php echo tgl_indo($kegiatan['tanggal_pergi']); ?> Sampai Tanggal <?php echo tgl_indo($kegiatan['tanggal_pulang']); ?>. Hadir pada kegiatan untuk <?php echo getkegiatan($kwitansi['sppd_id']); ?></p><br></td>
                </tr>
                <tr>
                    <td style="width:6%"><p style="margin:4px;"></p></td>
                    <td style="width:40%;text-align:right;"><p style="margin:4px;"><b>JUMLAH :</b></p></td>
                    <td style="width:24%;text-align:right;"><p style="margin:4px;"><b><?php echo rupiah($kwitansi['total']); ?></p></b></td>
                    <td style="width:30%;text-align:justify;"><p style="margin:4px;"></p></td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align:left;"><p style="margin:4px;"><i>Terbilang : <?php echo terbilang($kwitansi['total'], $style=3); ?></i></i></p></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:55%;border-color:white"></td>
                    <td style="width:45%;border-color:white"><p style="margin:0px;">Kota Serang, <?php echo tgl_indo($tgl_cetak); ?></p></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:55%;border-color:white">
                    <p style="text-align:left;margin:0px;border-color:white">Telah dibayar sejumlah</p>
                    </td>
                    <td style="width:45%;border-color:white">
                    <p style="text-align:left;margin:0px;border-color:white">Telah menerima jumlah uang sebesar</p>
                    </td>
                </tr>
                <tr>
                    <td style="width:55%;border-color:white">
                    <p style="text-align:left;margin:0px;border-color:white"><?php echo rupiah($kwitansi['total']); ?></p>
                    </td>
                    <td style="width:45%;border-color:white">
                    <p style="text-align:left;margin:0px;border-color:white"><?php echo rupiah($kwitansi['total']); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b>BENDAHARA</b><br><br><br><br></p>
                    </td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b>YANG MENERIMA</b><br><br><br><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;margin:0px;width:50%;border-color:white"><b><u><?php echo getdepan($skpd['bendahara_opd']); ?> <?php echo getpegawai($skpd['bendahara_opd']); ?> <?php echo getbelakang($skpd['bendahara_opd']); ?></u></b></td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b><u><?php echo getdepan($kwitansi['pegawai_id']); ?> <?php echo getpegawai($kwitansi['pegawai_id']); ?> <?php echo getbelakang($kwitansi['pegawai_id']); ?></u></b><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;margin:0px;width:50%;border-color:white">NIP.</b> <?php echo getnip($skpd['bendahara_opd']); ?></b></td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;"><b>NIP.</b> <?php echo getnip($kwitansi['pegawai_id']); ?></b></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <div style="width:100%;border-bottom:2px dashed"></div>
        <div style="text-align:center;">
            <h4>
            <b><u>PERHITUNGAN SPPD RAMPUNG</u></b>
            </h4>
        </div>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:30%;border-color:white"><p>Ditetapkan sejumlah</p></td>
                    <td style="width:70%;border-color:white"><p>: <?php echo rupiah($kwitansi['total']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:30%;border-color:white"><p>Yang telah dibayar semula</p></td>
                    <td style="width:70%;border-color:white"><p>: <?php echo rupiah($kwitansi['total']); ?></p></td>
                </tr>
                <tr>
                    <td style="width:30%;border-color:white"><p>Sisa Kurang/Lebih</p></td>
                    <td style="width:70%;border-color:white"><p>: Rp 0</p></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b></b><br><br><br><br></p>
                    </td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b>Pengguna Anggaran</b><br><br><br><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;margin:0px;width:50%;border-color:white"></td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;border-color:white"><b><u><?php echo getdepan($skpd['kepala_opd']); ?> <?php echo getpegawai($skpd['kepala_opd']); ?> <?php echo getbelakang($skpd['kepala_opd']); ?></u></b><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;margin:0px;width:50%;border-color:white"></td>
                    <td style="width:50%;border-color:white">
                    <p style="text-align:center;margin:0px;"><b>NIP.</b> <?php echo getnip($skpd['kepala_opd']); ?></b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>