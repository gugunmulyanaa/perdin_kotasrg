<div class="content">
    <div class="card card-maroon card-outline">
        <div class="card-header d-flex p-0">
            <ul class="nav nav-pills p-2">
                <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('pegawai');?>" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)"><i class="fas fa-arrow-left"></i> Kembali</a></li>
            </ul>
        </div><!-- /. End card-header -->  
        <div class="card-body pb-0">
        <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Pegawai ASN</h3>
                </div>
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Pegawai/edit/'.$getpegawai['id']); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gelar Depan Pegawai</label>
                                    <input type="text" class="form-control" name="depan" autocomplete="on" value="<?php echo $getpegawai['gelar_depan']; ?>" placeholder="Input Gelar Depan">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gelar Belakang Pegawai</label>
                                <input type="text" class="form-control" name="belakang" autocomplete="on" value="<?php echo $getpegawai['gelar_belakang']; ?>" placeholder="Input Gelar Belakang">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required value="<?php echo $getpegawai['nama']; ?>" placeholder="Input Nama Lengkap Pegawai">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP Pegawai</label>
                            <input type="text" class="form-control" name="nip" autocomplete="off" required value="<?php echo $getpegawai['nip']; ?>"placeholder="Input NIP Pegawai Pakai Spasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jabatan Pegawai</label>
                            <input type="text" class="form-control" name="jabatan" autocomplete="off" value="<?php echo $getpegawai['jabatan']; ?>" required placeholder="Input Jabatan Pegawai">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Eselon Pegawai</label>
                                    <select class="form-control select2" name="eselon" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                                    <option></option>
                                        <?php foreach($eselon as $e):; ?>
                                        <option value="<?php echo $e->id_eselon; ?>" <?php if($getpegawai['eselon_id'] == $e->id_eselon){echo "selected";} ?>>
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
                                    <option value="<?php echo $gol->id_golongan; ?>" <?php if($getpegawai['golongan_id'] == $gol->id_golongan){echo "selected";} ?>>
                                    <?php echo $gol->golongan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-warning">Edit</button>
                    </div>
                </form><!-- form end -->
            </div>
            </div>
            <!-- End Col -->
        </div>
        </div>
        <!-- /. End tab 1 -->        
        </div>
        </div>
    </div>
</div>
</div>