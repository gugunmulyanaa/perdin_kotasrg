<section class="content">
    <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <form role="form" action="<?php echo site_url('sppd_dalam/editspt'); ?>" method="post">
                <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="<?php echo base_url('sppd_dalam');?>"
                        class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <span class="btn btn-dark btn-sm">Nomor Surat : 800/<?php echo nomor($id); ?>/Sekret/<?php echo date("Y"); ?></span>
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>1. Berdasarkan Undangan/Kunjungan</h3>
                        </div>
                        <input type="hidden" value="<?php echo $id; ?>" name="id" readonly class="form-control">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>1.1 No. Surat Undangan</label>
                                <input type="text" class="form-control" name="no_undangan" autocomplete="off" placeholder="Input Nomor Surat Undangan" value="<?php echo $getrow['no_surat_msk']; ?>">
                                <p class="text-danger"><i>Kosongkan apabila perjalanan dinas dengan tujuan kunjungan</i></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">1.2 Undangan dari Satuan Kerja</label>
                                <input type="text" class="form-control" name="satker" autocomplete="on" 
                                placeholder="Input Satuan Kerja yang Memberikan Undangan" value="<?php echo $getrow['nama_satker']; ?>">
                                <p class="text-danger"><i>Kosongkan apabila perjalanan dinas dengan tujuan kunjungan</i></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">1.3 Perihal Surat Undangan</label>
                                <input type="text" class="form-control" name="perihal" autocomplete="off" 
                                placeholder="Input Perihal Dari Surat Undangan" value="<?php echo $getrow['perihal']; ?>">
                                <p class="text-danger"><i>Bisa dikosongkan apabila perjalanan dinas dengan tujuan kunjungan</i></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="tab-custom-content" style="border-top:4px solid #212529">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>2. Informasi Perjalanan Dinas</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.1 Tanggal Berangkat</label>
                                <input type="text" id="datepicker" class="form-control" name="tgl_berangkat" 
                                autocomplete="off" required placeholder="Format tanggal : Tahun-Bulan-Hari"
                                value="<?php echo $getrow['tanggal_pergi']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">2.2 Tanggal Pulang</label>
                                <input type="text" id="datepicker2" class="form-control" name="tgl_pulang" autocomplete="off" required placeholder="Format tanggal : Tahun-Bulan-Hari"
                                value="<?php echo $getrow['tanggal_pulang']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">                        
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.3 Tempat Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" autocomplete="on" required placeholder="Input Tempat Tujuan Perjalanan Dinas" value="<?php echo $getrow['tempat']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.4 Kendaraan Dinas</label>
                                <select class="form-control" required name="kendaraan">
                                    <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                                    <option value="Kendaraan Dinas Roda 2" <?php if($getrow['kendaraan']=='Kendaraan Dinas Roda 2'){echo "selected";} ?>>Kendaraan Dinas Roda 2</option>
                                    <option value="Kendaraan Dinas Roda 4" <?php if($getrow['kendaraan']=='Kendaraan Dinas Roda 4'){echo "selected";} ?>>Kendaraan Dinas Roda 4</option>
                                    <option value="Kendaraan Pribadi Roda 2" <?php if($getrow['kendaraan']=='Kendaraan Pribadi Roda 2'){echo "selected";} ?>>Kendaraan Pribadi Roda 2</option>
                                    <option value="Kendaraan Pribadi Roda 4" <?php if($getrow['kendaraan']=='Kendaraan Pribadi Roda 4'){echo "selected";} ?>>Kendaraan Pribadi Roda 4</option>
                                    <option value="Bus" <?php if($getrow['kendaraan']=='Bus'){echo "selected";} ?>>Bus</option>
                                    <option value="Kereta" <?php if($getrow['kendaraan']=='Kereta'){echo "selected";} ?>>Kereta</option>
                                    <option value="Pesawat" <?php if($getrow['kendaraan']=='Pesawat'){echo "selected";} ?>>Pesawat</option>
                                    <option value="Kendaraan Umum" <?php if($getrow['kendaraan']=='Kendaraan Umum'){echo "selected";} ?>>Kendaraan Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.5 Hari</label>
                                <input type="text" class="form-control" name="hari" autocomplete="on" required placeholder="Misal : Senin s/d Kamis" value="<?php echo $getrow['hari']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.6 Waktu</label>
                                <input type="text" class="form-control" name="waktu" autocomplete="on" required value="<?php echo $getrow['waktu']; ?>" placeholder="Misal : 08.00 s/d Selesai">
                            </div>
                        </div>                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.7 Acara/Maksud Perjalanan Dinas</label>
                                <textarea class="form-control" name="acara" rows="3" required
                                placeholder="Input Acara Perjalanan Dinas"><?php echo $getrow['acara']; ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="tab-custom-content" style="border-top:4px solid #212529">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>3. Program & Kegiatan</h3>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">3.1 Program</label>
                                <select class="form-control select2" name="program" style="width: 100%;"
                                data-placeholder="Pilih Program Perjalanan Dinas" required>
                                <option></option>
                                    <?php foreach($program as $e):; ?>
                                    <option value="<?php echo $e->id; ?>" <?php if ($getrow['program_id'] == $e->id){echo "selected";} ?>>
                                    (<?php echo $e->kode; ?>)-<?php echo $e->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">3.2 Kegiatan</label>
                                <select class="form-control select2" name="kegiatan" style="width: 100%;"
                                data-placeholder="Pilih Kegiatan Perjalanan Dinas" required>
                                <option></option>
                                    <?php foreach($kegiatan as $e):; ?>
                                    <option value="<?php echo $e->id_kegiatan; ?>" <?php if($getrow['kegiatan_id']==$e->id_kegiatan){echo "selected";} ?>>
                                    (<?php echo $e->program_kode; ?>.<?php echo $e->kode_kegiatan; ?>)-<?php echo $e->nama_kegiatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer col-12">
                        <button type="submit" class="btn btn-warning btn-lg btn-block">
                            Edit <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>
    </div>
</section>
</div>