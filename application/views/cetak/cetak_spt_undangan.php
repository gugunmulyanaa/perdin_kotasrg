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
            border:1px solid white;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid white;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid white;
            vertical-align: top;
        }
        h4{
            font-size:18pt;
            margin-bottom:0px;
        }
        p{
            font-size:14pt;
            margin:5px;
        }
    </style>
</head>
<body>
    <section>
        <center><img style="width:700px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/uploads/'.$skpd['kop_opd']; ?>" alt=""></center>
        <div style="text-align:center;">
            <h4>
            <b><u>SURAT PERINTAH TUGAS</u></b>
            </h4>
            <span>Nomor : 800/<?php echo nomor($kegiatan['id']); ?>/<?php echo $skpd['singkatan_opd']; ?>/<?php echo romawi_bulan($tgl_cetak); ?>/<?php echo tahun_indo($tgl_cetak); ?></span>
            <br/><br>
            <p style="padding-left:30px;text-align:justify;">Berdasarkan surat undangan nomor <?php echo $kegiatan['no_surat_msk']; ?> dari <?php echo $kegiatan['nama_satker']; ?> perihal <?php echo $kegiatan['perihal']; ?>, dengan ini Kepala <?php echo $skpd['nama_opd']; ?> Kota Serang :</p>
            <h4>
            <b>M E M E R I N T A H K A N</b>
            </h4>
        </div>
        <br/>        
        <p style="padding-left:30px;">Kepada :</p>
        <table class="table table-bordered" style="border-color:white;width:100%;margin-top:0px">
            <tbody>
            <?php foreach($all as $row): ?>
                <?php if($row->kategori == 1){
                    echo '
                <tr>
                    <td style="width:10%"></td>
                    <td style="width:23%">
                        <p>Nama</p>
                        <p>NIP</p>
                        <p>Pangkat/Golongan</p>
                        <p>Jabatan</p>
                    </td>
                    <td style="width:2%;">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </td>
                    <td style="width:65%">
                    <p>'.$row->gelar_depan.' '.$row->nama.', '.$row->gelar_belakang.'</p>
                    <p>'.$row->nip.'</p>
                    <p>'.getpangkat($row->golongan_id).' / '.getgol($row->golongan_id).'</p>
                    <p>'.$row->jabatan.'</p>
                    </td>
                </tr>';
                }else{
                    echo'<tr>
                    <td style="width:10%"></td>
                    <td style="width:23%">
                        <p>Nama</p>
                        <p>Jabatan</p>
                    </td>
                    <td style="width:2%;">
                        <p>:</p>
                        <p>:</p>
                    </td>
                    <td style="width:65%">
                    <p>'.$row->nama.'</p>
                    <p>'.$row->jabatan.'</p>
                    </td>
                </tr>';
                }?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p style="padding-left:30px;">Untuk melaksanakan tugas sebagaimana dimaksud pada:</p>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:10%"></td>
                    <td style="width:23%;">
                        <p>Hari</p>
                        <p>Tanggal</p>
                        <p>Tempat</p>
                        <p>Dalam Rangka</p>
                    </td>
                    <td style="width:2%;">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </td>
                    <td style="width:65%">
                    <?php
                    $selisih = date_diff(date_create($kegiatan['tanggal_pulang']), date_create($kegiatan['tanggal_pergi']));
                    $lamanya1 = $selisih->format('%a');
		            $lamanya = $lamanya1 + 1;
                    if($lamanya == '1'){
                        echo '<p>'.nama_hari($kegiatan['tanggal_pergi']).'</p>
                        <p>'.tgl_indo($kegiatan['tanggal_pergi']).'</p>';
                    }else{
                        echo '<p>'.nama_hari($kegiatan['tanggal_pergi']).' s/d '.nama_hari($kegiatan['tanggal_pulang']).'</p>
                        <p>'.tgl_indo($kegiatan['tanggal_pergi']).' s/d '.tgl_indo($kegiatan['tanggal_pulang']).'</p>';
                    }?>
                    <p><?php echo $kegiatan['tempat']; ?></p>
                    <p><?php echo $kegiatan['acara']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="padding-left:30px;">Demikian surat perintah ini berlaku sejak tanggal dikeluarkan dan agar dilaksanakan sebagaimana mestinya.</p>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:55%"></td>
                    <td style="width:17%"><p style="margin:0px;">Dikeluarkan di</p></td>
                    <td style="width:1%;"><p style="margin:0px;">:</p></td>
                    <td style="width:27%"><p style="margin:0px;">Kota Serang</p></td>
                </tr>
                <tr>
                    <td style="width:55%"></td>
                    <td style="width:17%"><p style="margin:0px;">Pada tanggal</p></td>
                    <td style="width:1%;"><p style="margin:0px;">:</p></td>
                    <td style="width:27%"><p style="margin:0px;"><?php echo tgl_indo($tgl_cetak); ?></p></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
            <tr>
                    <td style="width:55%">
                    <img style="padding-left:30px;width:100px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/qrcode/'.$kegiatan['qrcode']; ?>" alt="">
                    <td style="width:45%">
                    <p style="text-align:center;margin:0px;"><b>KEPALA DINAS</b><br><br><br><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:55%"></td>
                    <td style="width:45%">
                    <p style="text-align:center;margin:0px;"><b><u><?php echo getdepan($skpd['kepala_opd']); ?> <?php echo getpegawai($skpd['kepala_opd']); ?> <?php echo getbelakang($skpd['kepala_opd']); ?></u></b><br></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:55%"></td>
                    <td style="width:45%">
                    <p style="text-align:center;margin:0px;"><b>NIP.</b> <?php echo getnip($skpd['kepala_opd']); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>