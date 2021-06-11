<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <a href="<?php echo base_url('validasi_dalam');?>"
                class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="<?php echo base_url('validasi_dalam/validasi/'.$id);?>"
                class="btn bg-maroon btn-sm tombolvalid"><i class="fas fa-check-circle"></i> Validasi</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-hover table-responsive" style="width:100%">
                    <thead>
                    <tr>
                    <th width="5%"><center>No.</center></th>
                    <th width="27%"><center>Nama Pegawai</center></th>
                    <th width="45%"><center>Biaya Belanja SPPD</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($kwitansi as $row): $no++;?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo getdepan($row->pegawai_id); ?> <?php echo getpegawai($row->pegawai_id); ?>, <?php echo getbelakang($row->pegawai_id); ?></td>
                        <td>
                            Harian : <?= $row->lamanya ?> X <?php echo rupiah($row->uang_harian); ?> = <?php echo rupiah($row->tot_harian); ?><br>
                            Transport : <?= $row->lamanya ?> X <?php echo rupiah($row->uang_transport); ?> = <?php echo rupiah($row->tot_transport); ?><br>
                            Representasi : <?= $row->lamanya ?> X <?php echo rupiah($row->uang_representatif); ?> = <?php echo rupiah($row->tot_representatif); ?><br>
                            Penginapan : <?php $lamanya=$row->lamanya; $lama=$lamanya-1; echo $lama ?> X <?php echo rupiah($row->uang_hotel); ?> = <?php echo rupiah($row->tot_hotel); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Biaya Perjalanan Ini</span>
                <span class="info-box-number"><?=rupiah($pagubelanja);?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
            <!-- /.info-box -->
            <div class="card card-dark card-outline">
                <div class="card-header">
                <h3 class="card-title">Detail Kegiatan SPPD</h3>
                </div>
                <div class="card-body">
                <p><b>Tgl Berangkat :</b> <?= tgl_indo(getberangkat($id));?></p>
                <p><b>Tgl Pulang :</b> <?= tgl_indo(getpulang($id));?></p>
                <p><b>Hari :</b> <?=gethari($id);?></p>
                <p><b>Waktu :</b> <?=getwaktu($id);?></p>
                <p><b>Acara :</b> <?=getkegiatan($id);?></p>
                <p><b>Tujuan :</b> <?=gettujuan($id);?></p>
                <p><b>Sisa Anggaran :</b> <?=rupiah($pagudigunakan);?>/<?=rupiah($pagutotal);?></p>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                    aria-valuenow="3000" aria-valuemin="0" aria-valuemax="3600" style="width: <?=$pagupersen; ?>%">
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
</div>