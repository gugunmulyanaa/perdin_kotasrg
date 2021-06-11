<section class="content">

    <div class="container-fluid">

    <div class="col-lg-8 col-md-8 col-sm-12">

        <div class="card card-primary">

            <div class="card-header">

            <h3 class="card-title">Cetak Rekapitulasi SPPD Dalam Daerah</h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form class="form-horizontal" role="form" action="<?php echo site_url('Rekap/cetakrekap'); ?>" method="post">

            <div class="card-body">

                <div class="form-group row">

                    <label class="col-sm-2 control-label">Program</label>

                    <div class="col-sm-10">

                        <select autofocus class="select2" name="program" style="width:100%;"

                        data-placeholder="Cetak Semua Program">

                        <option></option>

                            <?php foreach($program as $p):; ?>

                            <option value="<?php echo $p->id; ?>">(<?php echo $p->kode; ?>)-<?php echo $p->nama; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-sm-2 control-label">Kegiatan</label>

                    <div class="col-sm-10">

                        <select class="form-control select2" name="kegiatan" style="width: 100%;"

                        data-placeholder="Cetak Semua Kegiatan">

                        <option></option>

                            <?php foreach($kegiatan as $k):; ?>

                            <option value="<?php echo $k->id_kegiatan; ?>">

                            (<?php echo $k->program_kode; ?>).(<?php echo $k->kode_kegiatan; ?>)-<?php echo $k->nama_kegiatan; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-sm-2 control-label">Pegawai</label>

                    <div class="col-sm-10">

                        <select class="form-control select2" name="pegawai" style="width: 100%;"

                        data-placeholder="Cetak Semua Pegawai">

                        <option></option>

                            <?php foreach($pegawai as $p):; ?>

                            <option value="<?php echo $p->id; ?>">

                            <?php echo $p->gelar_depan; ?> <?php echo $p->nama; ?>, <?php echo $p->gelar_belakang; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="form-group row">

                    <label for="inputPassword3" class="col-sm-2 control-label">Dari</label>

                    <div class="col-sm-10">

                        <input type="text" id="datepicker" class="form-control" name="tgl_awal" 

                        autocomplete="off" required placeholder="Pilih dari tanggal, Misal : 01 Januari 2019">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="inputPassword3" class="col-sm-2 control-label">Sampai</label>

                    <div class="col-sm-10">

                        <input type="text" id="datepicker2" class="form-control" name="tgl_akhir" 

                        autocomplete="off" required placeholder="Pilih sampai tanggal, Misal : 31 Desember 2019">

                    </div>

                </div>

            </div>

            <!-- /.card-body -->

            <div class="card-footer">

                <button type="submit" class="btn btn-primary btn-block">

                <i class="fas fa-print"></i> Cetak Rekapitulasi Dalam Daerah

            </div>

            <!-- /.card-footer -->

            </form>

        </div>

        <!-- /.card -->

        </div>

        <!-- /.col -->

    </div>

</section>

</div>