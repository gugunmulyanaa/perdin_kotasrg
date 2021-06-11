<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-info">
            <div class="card-header">
            <img src="<?php echo base_url(); ?>/assets/uploads/kominfo.png" alt="AdminLTE Logo" class="img-fluid">
            </div>
                <div class="card-body pad">
                    <h4 class="text-center"><u><b>LAPORAN HASIL PERJALANAN DINAS</b></u></h4><br>
                    <p>Petugas yang melaksanakan perjalanan dinas :</p>
                    <table style="border-color:white;width:100%;margin-top:0px">
                        <tbody>
                        <?php foreach($pegawai as $row): ?>
                            <tr>
                                <td style="width:23%;border-color:white;">
                                    <p>Nama</p>
                                    <p>NIP</p>
                                    <p>Pangkat/Golongan</p>
                                    <p>Jabatan</p>
                                </td>
                                <td style="width:2%;border-color:white;">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </td>
                                <td style="width:65%;border-color:white;">
                                <p><?php echo $row->gelar_depan; ?> <?php echo $row->nama; ?>, <?php echo $row->gelar_belakang; ?></p>
                                <p><?php echo $row->nip; ?></p>
                                <p><?php echo getpangkat($row->golongan_id); ?> / Golongan <?php echo getgol($row->golongan_id); ?></p>
                                <p><?php echo $row->jabatan; ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p>Dengan ini melaporkan hasil kegiatan perjalanan dinas :</p>
                    <table style="border-color:white;width:100%;">
                        <tbody>
                            <tr>
                                <td style="width:23%;border-color:white;">
                                    <p>Hari/Tanggal</p>
                                    <p>Waktu</p>
                                    <p>Tempat</p>
                                    <p>Acara</p>
                                </td>
                                <td style="width:2%;border-color:white;">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </td>
                                <td style="width:65%;border-color:white;">
                                <p><?php echo $sppd['hari']; ?>, <?php echo tgl_indo($sppd['tanggal_pergi']); ?> s/d <?php echo tgl_indo($sppd['tanggal_pulang']); ?></p>
                                <p><?php echo $sppd['waktu']; ?></p>
                                <p><?php echo $sppd['tempat']; ?></p>
                                <p><?php echo $sppd['acara']; ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                    <form role="form" action="<?php echo site_url('sppd_dalam/savelhpd/'.$id);?>" method="post">
                        <input type="hidden" value="<?php echo $id; ?>" name="id" readonly class="form-control">
                        <textarea class="textarea" name="lhpd"><?php echo $sppd['lhpd']; ?></textarea>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Tanggal Cetak :</label>
                            <div class="col-sm-10">
                                <input type="text" id="datepicker" class="form-control" name="tgl_cetak" autocomplete="off"
                                placeholder="Input Tanggal Cetak LHPD" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Cetak Laporan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>