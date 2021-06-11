<section class="content">
    <div class="container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <form role="form" action="<?php echo site_url('sppd_luar/addspt'); ?>" method="post">
            <input type="hidden" name="user" value="<?php echo $this->session->userdata('user'); ?>" required>
            <input type="hidden" name="skpd" value="<?php echo $this->session->userdata('skpd'); ?>" required>
                <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="<?php echo base_url('sppd_luar');?>"
                        class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>1. Berdasarkan Undangan/Kunjungan</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>1.1 Nomor Surat Undangan</label>
                                <input type="text" class="form-control" name="no_undangan" autocomplete="off" placeholder="Input Nomor Surat Undangan" autofocus>
                                <p class="text-danger"><i>Bisa dikosongkan apabila perjalanan dinas dengan tujuan kunjungan</i></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">1.2 Satuan Kerja Yang Memberi Undangan</label>
                                <input type="text" class="form-control" name="satker" autocomplete="on" 
                                placeholder="Input Satuan Kerja yang Memberikan Undangan">
                                <p class="text-danger"><i>Bisa dikosongkan apabila perjalanan dinas dengan tujuan kunjungan</i></p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">1.3 Perihal Surat Undangan</label>
                                <input type="text" class="form-control" name="perihal" autocomplete="off" 
                                placeholder="Input Perihal Dari Surat Undangan">
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
                                autocomplete="off" required placeholder="Format tanggal : Tahun-Bulan-Hari">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">2.2 Tanggal Pulang</label>
                                <input type="text" id="datepicker2" class="form-control" name="tgl_pulang" autocomplete="off" required placeholder="Format tanggal : Tahun-Bulan-Hari">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">                        
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.3 WIlayah Tujuan</label>
                                <select class="form-control select2" name="jarak" style="width: 100%;"
                                data-placeholder="Pilih Wilayah Kab/Kota Tujuan" required>
                                <option></option>
                                    <?php foreach($wilayah as $wil):; ?>
                                    <option value="<?php echo $wil->id_jarak; ?>">
                                    (<?php echo $wil->nama_kota; ?>)-<?php echo $wil->nama_provinsi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">                        
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.4 Tempat Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" autocomplete="on" required placeholder="Input Tempat Tujuan Perjalanan Dinas">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.5 Hari</label>
                                <input type="text" class="form-control" name="hari" autocomplete="on" required placeholder="Contoh : Senin s/d Kamis">
                            </div>
                        </div>                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.6 Waktu</label>
                                <input type="text" class="form-control" name="waktu" 
                                autocomplete="on" required placeholder="Contoh : 08.00 s/d Selesai">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.7 Kendaraan Dinas</label>
                                <select class="form-control" required name="kendaraan">
                                    <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                                    <option value="Kendaraan Dinas Roda 2">Kendaraan Dinas Roda 2</option>
                                    <option value="Kendaraan Dinas Roda 4">Kendaraan Dinas Roda 4</option>
                                    <option value="Kendaraan Dinas Roda 2">Kendaraan Pribadi Roda 2</option>
                                    <option value="Kendaraan Dinas Roda 4">Kendaraan Pribadi Roda 4</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Kereta">Kereta</option>
                                    <option value="Pesawat">Pesawat</option>
                                    <option value="Kendaraan Umum">Kendaraan Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.8 Pilih Paket</label>
                                <select class="form-control" required name="paket">
                                    <option value="" disabled selected>Pilih Paket Luar Daerah</option>
                                    <option value="2">Paket NON FULL Board</option>
                                    <option value="3">Paket FULL Board</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">2.9 Acara/Maksud Perjalanan Dinas</label>
                                <textarea class="form-control" rows="3" name="acara" placeholder="Input Acara atau maksud dari perjalanan dinas" required></textarea>
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
                                    <option value="<?php echo $e->id; ?>">
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
                                    <option value="<?php echo $e->id_kegiatan; ?>">
                                    (<?php echo $e->program_kode; ?>.<?php echo $e->kode_kegiatan; ?>)-<?php echo $e->nama_kegiatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>                        
                        </div>
                    </div>
                    <div class="card-footer col-12">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                        Submit <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>
    </div>
</section>
</div>