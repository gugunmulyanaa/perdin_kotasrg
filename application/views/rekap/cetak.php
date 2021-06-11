<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="Copyright" content="PEMERINTAH KOTA SERANG"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online PEMERINTAH Kota Serang" />
	<title><?php echo $title; ?> || <?php echo $skpd['singkatan_opd']; ?> KOTA SERANG</title>
	<style>
        table.table-bordered{
            border:1px solid black;
            border-collapse: collapse;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
            font-size:11pt;
            text-align: center;
        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
            vertical-align: middle;
            font-size:9pt;
            text-align: center;
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
            <b><u>REKAP BIAYA PERJALANAN DINAS DALAM DAERAH TA.<?php echo date("Y"); ?></u></b>
            </h4>
        </div>
        <br/>
        <table class="table table-bordered" style="width:100%;">
            <tbody>
                <tr>
                    <td style="width:15%;text-align:left;border-color:white"><p>Dari Tanggal</p></td>
                    <td style="width:2%;border-color:white"><p>:</p></td>
                    <?php if ($program != ''){
                        echo '<td style="width:15%;text-align:left;border-color:white"><p>'.tgl_indo($dari).'</p></td>';
                    }else{
                        echo '<td style="width:83%;text-align:left;border-color:white"><p>'.tgl_indo($dari).'</p></td>';
                    }?>                    
                    <?php if ($program != ''){
                        echo '<td style="width:12%;text-align:left;border-color:white"><p>Nama Program</p></td>
                        <td style="width:2%;border-color:white"><p>:</p></td>
                        <td style="width:54%;text-align:left;border-color:white"><p>'.getprogram($program).'</p></td>';
                    }else{
                        echo '';
                    }?>
                </tr>
                <tr>
                    <td style="width:15%;text-align:left;border-color:white"><p>Sampai Tanggal</p></td>
                    <td style="width:2%;border-color:white"><p>:</p></td>
                    <td style="width:15%;text-align:left;border-color:white"><p><?php echo tgl_indo($sampai); ?></p></td>
                    <?php if ($program != ''){
                        echo '<td style="width:12%;text-align:left;border-color:white"><p>Nama Kegiatan</p></td>
                        <td style="width:2%;border-color:white"><p>:</p></td>
                        <td style="width:54%;text-align:left;border-color:white"><p>'.getkeg($kegiatan).'</p></td>';
                    }else{
                        echo '';
                    }?>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. TBK</th>
                    <th>Nama Lengkap Tanpa Gelar</th>
                    <th>NIP</th>
                    <th>Pangkat<br>/Gol</th>
                    <th>Keperluan</th>
                    <th>Tujuan</th>
                    <th>Berangkat</th>
                    <th>Kembali</th>
                    <th>Lama Hari</th>
                    <th>Uang Harian</th>
                    <th>Uang Transport</th>
                    <th>Uang Representatif</th>
                    <th>Uang Hotel</th>
                    <th>Jumlah Dibayarkan</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=0; foreach($all as $row): $no++?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>800/<?php echo nomor($row->sppd_id); ?><br>/<?php echo $skpd['singkatan_opd']; ?>/<br><?php echo romawi_bulan($row->tanggal_pergi); ?>/<?php echo tahun_indo($row->tanggal_pergi); ?></td>
                    <td><?php echo getpegawai($row->pegawai_id); ?></td>
                    <td><?php echo getnip($row->pegawai_id); ?></td>
                    <td><?php echo getpangkat(getgolpeg($row->pegawai_id)); ?><br>/<?php echo getgol(getgolpeg($row->pegawai_id)); ?></td>
                    <td><?php echo $row->acara; ?></td>
                    <td><?php echo $row->tempat; ?></td>
                    <td><?php echo tgl_indo($row->tanggal_pergi); ?></td>
                    <td><?php echo tgl_indo($row->tanggal_pulang); ?></td>
                    <td><?php echo $row->lamanya; ?> Hari</td>
                    <td><?php echo rupiah($row->uang_harian); ?></td>
                    <td><?php echo rupiah($row->uang_transport); ?></td>
                    <td><?php echo rupiah($row->uang_representatif); ?></td>
                    <td><?php echo rupiah($row->uang_hotel); ?></td>
                    <td><?php echo rupiah($row->total); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p style="text-align:right;"><b>Total Jumlah Dibayarkan : <?php echo rupiah($total); ?></b></p>
    </section>
</body>
</html>