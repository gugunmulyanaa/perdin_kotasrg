<section class="content">
    <div class="container-fluid">
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                <button data-toggle="modal" data-target="#modal_add" 
                class="btn btn-success"><i class="fas fa-user-plus"></i> Tambah User</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-responsive table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th width="10%"><center>No.</center></th>
                        <th width="10%"><center>Username</center></th>
                        <th width="30%"><center>Nama Pengguna</center></th>
                        <th width="10%"><center>Status</center></th>
                        <th width="20%"><center>Tombol</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($all as $row): $no++ ?>
                    <tr>
                        <td><center><?php echo $no; ?></center></td>
                        <td><center><?php echo $row->username; ?></center></td>
                        <td><center><?php echo $row->nama; ?></center></td>
                        <td><center>
                            <?php if($row->akses == 1){
                                echo "<span class='badge bg-purple'>Admin</span>";
                            }elseif($row->akses == 2){
                                echo "<span class='badge bg-teal'>User PPTK</span>";
                            }?>
                        </center></td>
                        <td><center>
                            <a href="<?php echo site_url('users/hapus/'.$row->id_admin); ?>" 
                            class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i> Hapus</a>
                            <button data-toggle="modal" data-target="#modal_edit_<?=$row->id_admin;?>" 
                            class="btn btn-warning btn-sm"> <i class="fas fa-user-edit"></i> Edit</button
                        </center></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
</div>
<!-- modal add User -->
<div class="modal fade" id="modal_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah User Pengguna SPPD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('users/add'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama PPTK</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="username" style="width: 100%;"
                    data-placeholder="Pilih Nama PPTK" required>
                    <option></option>
                        <?php foreach($pptk as $peg):; ?>
                        <option value="<?php echo $peg->pejabat_id; ?>">
                        <?php echo getpegawai($peg->pejabat_id); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" autocomplete="off"
                    placeholder="Masukan Password User PPTK" required>
                    <p class="text-danger"><i>Password Minimal 6 Karakter</i></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Konfirmasi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passconf" autocomplete="off"
                    placeholder="Konfirmasi Ulang Password Anda" required>
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
<?php foreach($all as $row): ?>
<!-- modal edit User -->
<div class="modal fade" id="modal_edit_<?=$row->id_admin;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit User Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('users/edit/'.$row->id_admin); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" autocomplete="off"
                    placeholder="Input Nama User & Jangan Menggunakan Spasi" value="<?=$row->username;?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama PPTK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pptk" autocomplete="off"
                    placeholder="Input nama Bidang PPTK" value="<?=$row->nama;?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" autocomplete="off"
                    placeholder="Input Password Minimal 6 Karakter Kombinasi Angka & Huruf">
                    <p class="text-danger"><i>Apabila tidak mengganti password dikosongkan saja</i></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Konfirmasi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passconf" autocomplete="off"
                    placeholder="Konfirmasi Ulang Password Anda">
                    <p class="text-danger"><i>Apabila tidak mengganti password dikosongkan saja</i></p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Hak Akses</label>
                <div class="col-sm-2">
                    <input type="radio" name="akses" value="1" <?php if($row->akses ==1){echo "checked";} ?> required> Admin
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="akses" value="2" <?php if($row->akses ==2){echo "checked";} ?> required> User PPTK
                </div>
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
<?php endforeach; ?>