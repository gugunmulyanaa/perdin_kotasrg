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
        ol{
            font-size:14pt;
            margin:5px;
        }
        ul{
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
            <b><u>LAPORAN HASIL PERJALANAN DINAS</u></b>
            </h4>
        </div>
        <br/>        
        <p style="padding-left:30px;">Petugas yang melaksanakan perjalanan dinas :</p>
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
        <p style="padding-left:30px;">Dengan ini dilaporkan hasil kegiatan perjalanan dinas :</p>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                    <td style="width:10%"></td>
                    <td style="width:23%;">
                        <p>Hari/Tanggal</p>
                        <p>Waktu</p>
                        <p>Tempat</p>
                        <p>Acara</p>
                    </td>
                    <td style="width:2%;">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </td>
                    <td style="width:65%">
                    <p><?php echo $kegiatan['hari']; ?>, <?php echo tgl_indo($kegiatan['tanggal_pergi']); ?> s/d <?php echo tgl_indo($kegiatan['tanggal_pulang']); ?></p>
                    <p><?php echo $kegiatan['waktu']; ?></p>
                    <p><?php echo $kegiatan['tempat']; ?></p>
                    <p><?php echo $kegiatan['acara']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="border-color:white;width:100%;">
            <tbody>
                <tr>
                <td style="width:10%"></td>
                <td style="width:90%"><p><?php echo $lhpd; ?></p></td>
                </tr>
            </tbody>
        </table>
        <p style="padding-left:30px;">Demikian laporan hasil Perjalanan Dinas ini dibuat untuk diketahui sebagaimana mestinya.</p>
        <table style="border-color:white;width:100%;margin-top:0px;">
            <tbody>
            <tr>
                <td style="width:51%;"></td>
                <td style="width:18%;padding:0px;"><p style="margin:0px;">Dikeluarkan di</p></td>
                <td style="width:1%;padding:0px;"><p style="margin:0px;">:</p></td>
                <td style="width:30%;padding:0px;"><p style="margin:0px;">Kota Serang</p></td>
            </tr>
            <tr>
                <td style="width:51%;"></td>
                <td style="width:18%;padding:0px;"><p style="margin:0px;">Pada tanggal</p></td>
                <td style="width:1%;padding:0px;"><p style="margin:0px;">:</p></td>
                <td style="width:30%;padding:0px;"><p style="margin:0px;"><?php echo tgl_indo($tgl_cetak); ?></p></td>
            </tr>
            </tbody>
        </table>
        <table style="border-color:white;width:100%;margin-top:0px">
            <tbody>
            <tr>
                <td style="width:40%;padding:0px;"> <img style="padding-left:30px;width:60px;" src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/assets/qrcode/'.$kegiatan['qrcode']; ?>" alt=""></td>
                <td style="width:60%;padding:0px;"><p style="margin:0px;text-align:center">Yang Melaksanakan Tugas</p></td>
            </tr>
            </tbody>
        </table>
        <table style="border-color:white;width:100%;margin-top:0px">
            <tbody>
            <?php $no=0; foreach($all as $row): $no++;?>
                <tr>
                    <td style="width:37%;border-color:white;"></td>
                    <td style="width:3%;border-color:white;padding:1.5rem 0 0 0">
                    <p><?php echo $no; ?>.</p></td>
                    <td style="width:30%;border-color:white;padding:1.5rem 0 0 0">
                        <p><?php echo $row->gelar_depan; ?> <?php echo $row->nama; ?> <?php echo $row->gelar_belakang; ?></p>
                    </td>
                    <td style="width:2%;border-color:white;padding:1.5rem 0 0 0;">
                        <p>:</p>
                    </td>
                    <td style="width:28%;border-color:white;padding:1.5rem 0 0 0">
                    <p>__________________</p>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>