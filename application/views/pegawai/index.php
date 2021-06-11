<div class="content">
    <div class="card card-maroon card-outline">
        <div class="card-header d-flex p-0">
            <ul class="nav nav-pills p-2">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Pegawai ASN</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Pegawai THL</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Sopir</a></li>
            </ul>
        </div><!-- /. End card-header -->  
        <div class="card-body pb-0">
        <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Pegawai ASN</h3>
                </div>
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Pegawai/add'); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gelar Depan Pegawai</label>
                                    <input type="text" class="form-control" name="depan" autocomplete="on" placeholder="Input Gelar Depan">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gelar Belakang Pegawai</label>
                                <input type="text" class="form-control" name="belakang" autocomplete="on" placeholder="Input Gelar Belakang">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required placeholder="Input Nama Lengkap Pegawai">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP Pegawai</label>
                            <input type="text" class="form-control" name="nip" autocomplete="off" required placeholder="Input NIP Pegawai Pakai Spasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan Pegawai</label>
                            <input type="text" class="form-control" name="jabatan" autocomplete="off" required placeholder="Input Jabatan Pegawai">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Eselon Pegawai</label>
                                    <select class="form-control select2" name="eselon" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                                    <option></option>
                                        <?php foreach($eselon as $e):; ?>
                                        <option value="<?php echo $e->id_eselon; ?>">
                                        (<?php echo $e->eselon; ?>)-<?php echo $e->uraian; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Golongan Pegawai</label>
                                <select class="form-control select2" name="golongan" style="width: 100%;" data-placeholder="Pilih Golongan Pegawai" required>
                                <option></option>
                                    <?php foreach($golongan as $gol):; ?>
                                    <option value="<?php echo $gol->id_golongan; ?>">
                                    <?php echo $gol->golongan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>
                </form><!-- form end -->
            </div>
            </div>
            <!-- End Col -->
            <?php foreach($all as $row): ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card card-info">
                <div class="card-header">
                <h4><b><?php echo $row->nip; ?></b></h4>
                </div>
                <div class="card-body pt-0">
                <div class="row">
                <div class="col-9">
                    <h2 class="lead"><b><?php echo $row->gelar_depan; ?> <?php echo $row->nama; ?> <?php echo $row->gelar_belakang; ?></b></h2>
                    <p class="text-muted" style="margin-bottom:0px"><?php echo $row->pangkat; ?></p>
                    <p class="text-muted" style="margin-bottom:0px">Golongan <?php echo $row->golongan; ?></p>
                    <p class="text-muted" style="margin-bottom:0px">Eselon <?php echo eselon($row->eselon_id); ?></p>
                    <p class="text-muted" style="margin-bottom:0px"><?php echo $row->jabatan; ?></p>          
                </div>
                    <div class="col-3 text-center" style="padding-top: 20px;">
                    <img src="<?php echo base_url('assets/uploads/user.png'); ?>" alt="" class="img-circle img-fluid">
                    </div>
                </div>
                </div>
                <div class="card-footer">
                <div class="text-center">
                    <a class="btn btn-danger tombolhapus" href="<?php echo site_url('pegawai/hapus/'.$row->id);?>"><i class="fas fa-user-times"></i> Hapus Pegawai</a>
                    <a class="btn btn-warning" href="<?php echo site_url('pegawai/editpegawai/'.$row->id);?>"><i class="fas fa-user-edit"></i> Edit Pegawai</a>
                </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
        </div>
        <!-- /. End tab 1 -->
        <div class="tab-pane" id="tab_2">
            <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Pegawai THL</h3>
                </div>
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Pegawai/addthl'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required placeholder="Input Nama Lengkap Pegawai">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan Pegawai</label>
                            <input type="text" class="form-control" name="jabatan" autocomplete="off" required placeholder="Input Jabatan Pegawai">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>
                </form><!-- form end -->
            </div>
            </div>
            <!-- End Col -->
            <?php $no=0; foreach($allthl as $row): $no++ ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card card-info">
                <div class="card-header">
                <h4><b><?php echo $no; ?></b></h4>
                </div>
                <div class="card-body pt-0">
                <div class="row">
                    <div class="col-9">
                    <h2 class="lead"><b><?php echo $row->nama; ?></b></h2>
                    <p class="text-muted" style="margin-bottom:0px"><?php echo $row->jabatan; ?></p>          
                </div>
                    <div class="col-3 text-center" style="padding-top: 20px;">
                    <img src="<?php echo base_url('assets/uploads/user.png'); ?>" alt="" class="img-circle img-fluid">
                    </div>
                </div>
                </div>
                <div class="card-footer">
                <div class="text-center">
                    <a class="btn btn-danger tombolhapus" href="<?php echo site_url('pegawai/hapusthl/'.$row->id);?>"><i class="fas fa-user-times"></i> Hapus Pegawai</a>
                    <a class="btn btn-warning" href="<?php echo site_url('pegawai/editthl/'.$row->id);?>"><i class="fas fa-user-edit"></i> Edit Pegawai</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
        <!-- /. End tab 2 -->
        <div class="tab-pane" id="tab_3">
            <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Sopir</h3>
                </div>
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Pegawai/addsopir'); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Sopir</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required placeholder="Input Nama Lengkap Sopir">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                    </div>
                </form><!-- form end -->
            </div>
            </div>
            <!-- End Col -->
            <?php $no=0; foreach($allsopir as $row): $no++ ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card card-info">
                <div class="card-header">
                <h4><b><?php echo $no; ?></b></h4>
                </div>
                <div class="card-body pt-0">
                <div class="row">
                    <div class="col-9">
                    <h2 class="lead"><b><?php echo $row->nama; ?></b></h2>
                </div>
                    <div class="col-3 text-center" style="padding-top: 20px;">
                    <img src="<?php echo base_url('assets/uploads/user.png'); ?>" alt="" class="img-circle img-fluid">
                    </div>
                </div>
                </div>
                <div class="card-footer">
                <div class="text-center">
                    <a class="btn btn-danger tombolhapus" href="<?php echo site_url('pegawai/hapussopir/'.$row->id);?>"><i class="fas fa-user-times"></i> Hapus Pegawai</a>
                    <a class="btn btn-warning" href="<?php echo site_url('pegawai/editsopir/'.$row->id);?>"><i class="fas fa-user-edit"></i> Edit Pegawai</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
        <!-- /. End tab 3 -->
        </div>
        </div>
    </div>
</div>
</div>