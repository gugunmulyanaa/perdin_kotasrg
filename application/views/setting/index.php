<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Detail SKPD</h3>
                    <div class="card-tools">
                    <button data-toggle="modal" data-target="#modal_edit_skpd" 
                    class="btn btn-warning btn-sm"><i class="fas fa-university"></i> Edit SKPD</button>
                    </div>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-university mr-1"></i> Nama SKPD</strong>
                    <p class="text-muted">
                    <?php echo $getrow['nama_opd']; ?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-university mr-1"></i> Singkatan SKPD</strong>
                    <p class="text-muted">
                    <?php echo $getrow['singkatan_opd']; ?>
                    </p>
                    <hr>
                    <strong><i class="fas fa-user mr-1"></i> Nama Kepala SKPD</strong>
                    <p class="text-muted"><?php echo getdepan($getrow['kepala_opd']); ?> <?php echo getpegawai($getrow['kepala_opd']); ?>, <?php echo getbelakang($getrow['kepala_opd']); ?></p>
                    <hr>
                    <strong><i class="fas fa-user mr-1"></i> Nama Bendahara</strong>
                    <p class="text-muted"><?php echo getdepan($getrow['bendahara_opd']); ?> <?php echo getpegawai($getrow['bendahara_opd']); ?>, <?php echo getbelakang($getrow['bendahara_opd']); ?></p>
                    <hr>
                    <button data-toggle="modal" data-target="#modal_reset" 
                    class="btn btn-block btn-danger"><i class="fas fa-lock"></i> Ganti Password</button>
                </div>
                <!-- /.card-body -->
        </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kop Surat</h3>
                    <div class="card-tools">
                    <button data-toggle="modal" data-target="#modal_edit_kop" 
                    class="btn btn-warning btn-sm"><i class="fas fa-file-image"></i> Edit Kop Surat</button>
                    </div>
                </div>
                <div class="card-body">
                    <img src="<?php echo base_url(); ?>/assets/uploads/<?= $getrow['kop_opd']; ?>" class="img-fluid" alt="Kop Surat">
                </div>
                <!-- /.card-body -->

        </div>
    </div>
    </div>
</section>
</div>
<!-- modal Edit Reset Pass SKPD -->
<div class="modal fade" id="modal_reset">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Reset Password SKPD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('ResetPassword/reset/'); ?>" method="post">
            <div class="form-group row" id="show_hide_password">
                <label class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-10">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" autocomplete="off"
                    placeholder="Masukan password baru minimal 6 karakter" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="form-group row" id="show_hide_password">
                <label class="col-sm-2 control-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                <div class="input-group">
                    <input type="password" class="form-control" name="passconf" autocomplete="off"
                    placeholder="Masukan Konfirmasi Password Baru" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-success">Submit <i class="fas fa-paper-plane"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- modal Edit SKPD -->
<div class="modal fade" id="modal_edit_skpd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Detail SKPD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('setting/editskpd/'.$getrow['id']); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama SKPD</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" autocomplete="off"
                    placeholder="Masukan Nama Lengkap SKPD" required value="<?php echo $getrow['nama_opd']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Singkatan SKPD</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="singkatan" autocomplete="off"
                    placeholder="Masukan Singkatan SKPD" required value="<?php echo $getrow['singkatan_opd']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Kepala Dinas</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="kepala" style="width: 100%;"
                    data-placeholder="Pilih Nama Kepala Dinas" required>
                    <option></option>
                        <?php foreach($peg as $row):; ?>
                        <option value="<?php echo $row->id; ?>" <?php if($getrow['kepala_opd']== $row->id){echo "selected";} ?>>
                        <?php echo $row->gelar_depan; ?> <?php echo $row->nama; ?>,<?php echo $row->gelar_belakang; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Bendahara</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="bendahara" style="width: 100%;"
                    data-placeholder="Pilih Nama Bendahara" required>
                    <option></option>
                        <?php foreach($peg as $row):; ?>
                        <option value="<?php echo $row->id; ?>" <?php if($getrow['bendahara_opd']== $row->id){echo "selected";} ?>>
                        <?php echo $row->gelar_depan; ?> <?php echo $row->nama; ?>,<?php echo $row->gelar_belakang; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-success">Submit <i class="fas fa-paper-plane"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- modal edit Kop Surat -->
<div class="modal fade" id="modal_edit_kop">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Kop Surat</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('setting/do_upload/'.$getrow['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="exampleInputFile">Upload Gambar Kop Surat</label>
            <input type="file" class="form-control" name="filekop">
                <p class="text-danger"><i>Format Gambar Wajib PNG, Resolusi W:850px dan H:125px, Max size 3MB </i></p>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-warning">Edit <i class="fas fa-edit"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>