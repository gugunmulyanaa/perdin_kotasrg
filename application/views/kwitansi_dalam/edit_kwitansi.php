<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <a href="<?php echo base_url('kwitansi_dalam/kwitansi/'.$getrow['sppd_id']);?>"
                class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form role="form" action="<?php echo site_url('Kwitansi_dalam/editkwitansi/'.$id); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Pegawai Bertugas</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" autocomplete="off" value="<?=getdepan($getrow['pegawai_id']);?> <?=getpegawai($getrow['pegawai_id']);?>, <?=getbelakang($getrow['pegawai_id']);?>" name="nama" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Harian</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RP</span>
                            </div>
                            <input type="text" class="form-control uang" name="harian" autocomplete="on"
                            placeholder="Input Biaya Harian Perjalanan Dinas" value="<?=$getrow['uang_harian'];?>" required>
                        </div>
                        <p class="text-danger"><i>Validasi biaya maksimal pada SSH <?=rupiah($harian);?></i></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Transport</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RP</span>
                            </div>
                            <input type="text" class="form-control uang" name="transport" autocomplete="on"
                            placeholder="Input Biaya Harian Perjalanan Dinas" value="<?=$getrow['uang_transport'];?>" required>
                        </div>
                        <p class="text-danger"><i>Biaya Transport tidak dilakukan Validasi</i></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Representatif</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RP</span>
                            </div>
                            <input type="text" class="form-control uang" name="representatif" autocomplete="on"
                            placeholder="Input Biaya Harian Perjalanan Dinas" value="<?=$getrow['uang_representatif'];?>" required>
                        </div>
                        <p class="text-danger"><i>Validasi biaya maksimal pada SSH <?=rupiah($representatif);?></i></p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya Akomodasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RP</span>
                            </div>
                            <input type="text" class="form-control uang" name="hotel" autocomplete="on"
                            placeholder="Input Biaya Harian Perjalanan Dinas" value="<?=$getrow['uang_hotel'];?>" required>
                        </div>
                        <p class="text-danger"><i>Validasi biaya maksimal pada SSH <?= rupiah($hotel);?></i></p>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-warning">Edit</button>
                </div>
                </form><!-- form end -->
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
                <p><b>Tgl Berangkat :</b> <?= tgl_indo(getberangkat($getrow['sppd_id']));?></p>
                <p><b>Tgl Pulang :</b> <?= tgl_indo(getpulang($getrow['sppd_id']));?></p>
                <p><b>Hari :</b> <?=gethari($getrow['sppd_id']);?></p>
                <p><b>Waktu :</b> <?=getwaktu($getrow['sppd_id']);?></p>
                <p><b>Acara :</b> <?=getkegiatan($getrow['sppd_id']);?></p>
                <p><b>Tujuan :</b> <?=gettujuan($getrow['sppd_id']);?></p>
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