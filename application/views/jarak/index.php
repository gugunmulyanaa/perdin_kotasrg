<section class="content">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <div class="card card-primary card-outline">

                    <div class="card-header">

                    <h3 class="card-title">SPPD Dalam Pulau Jawa</h3>
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo "<div class='card-tools'> 
                        <button data-toggle='modal' data-target='#modal_dalam_add' class='btn btn-success btn-sm'><i class='fas fa-search-plus'></i> Tambah Jarak Dalam Daerah</button>
                        </div>";
                    }else{
                        echo "";
                    }?>

                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">

                    <table id="example" class="table table-responsive table-striped" style="width:100%">

                        <thead>

                        <tr>

                            <th width="10%"><center>No.</center></th>

                            <th width="25%"><center>Kota</center></th>

                            <th width="25%"><center>Provinsi</center></th>

                            <th width="20%"><center>Jarak</center></th>

                            <?php if($this->session->userdata('skpd')=='121001'){
                                echo "<th width='20%'><center>Tombol</center></th>";
                            }else{
                                echo"";
                            }?>

                        </tr>

                        </thead>

                        <tbody>

                        <?php $no=0; foreach($dalam as $row): $no++ ?>

                        <tr>

                            <td><center><?php echo $no; ?></center></td>

                            <td><center><?php echo $row->nama_kota; ?></center></td>

                            <td><center><?php echo $row->nama_provinsi; ?></center></td>

                            <td><center><?php echo $row->jarak; ?> KM</center></td>

                            <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<td><center>

                                <a href="'.site_url('jarak/hapus/'.$row->id_jarak).'" 

                                class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>

                                <button data-toggle="modal" data-target="#modal_edit_dalam_"'.$row->id_jarak.'" 

                                class="btn btn-warning btn-sm"> <i class="fas fa-user-edit"></i></button

                            </center></td>';
                            }else{
                                echo "";
                            }?>

                        </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                    </div>

                    <!-- /.card-body -->

                </div>

                <!-- /.card -->

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <div class="card card-success card-outline">

                    <div class="card-header">

                    <h3 class="card-title">SPPD Luar Pulau Jawa</h3>
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo "<div class='card-tools'> 
                        <button data-toggle='modal' data-target='#modal_luar_add' class='btn btn-success btn-sm'><i class='fas fa-search-plus'></i> Tambah Jarak Luar Daerah</button>
                        </div>";
                    }else{
                        echo "";
                    }?>

                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">

                    <table id="example2" class="table table-responsive table-striped" style="width:100%">

                        <thead>

                        <tr>

                            <th width="10%"><center>No.</center></th>

                            <th width="25%"><center>Kota</center></th>

                            <th width="25%"><center>Provinsi</center></th>

                            <th width="20%"><center>Jarak</center></th>

                            <?php if($this->session->userdata('skpd')=='121001'){
                                echo "<th width='20%'><center>Tombol</center></th>";
                            }else{
                                echo"";
                            }?>

                        </tr>

                        </thead>

                        <tbody>

                        <?php $no=0; foreach($keluar as $row): $no++ ?>

                        <tr>

                            <td><center><?php echo $no; ?></center></td>

                            <td><center><?php echo $row->nama_kota; ?></center></td>

                            <td><center><?php echo $row->nama_provinsi; ?></center></td>

                            <td><center><?php echo $row->jarak; ?> KM</center></td>
                            <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<td><center>

                                <a href="'.site_url('jarak/hapus/'.$row->id_jarak).'" 

                                class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>

                                <button data-toggle="modal" data-target="#modal_edit_dalam_"'.$row->id_jarak.'" 

                                class="btn btn-warning btn-sm"> <i class="fas fa-user-edit"></i></button

                            </center></td>';
                            }else{
                                echo"";
                            }?>

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

    </div>

</section>

</div>

<!-- modal add Jarak -->

<div class="modal fade" id="modal_dalam_add">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <div class="modal-header">

            <h4 class="modal-title">Tambah Jarak Dalam Daerah</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

        <form class="form-horizontal" action="<?php echo site_url('jarak/add_dalam'); ?>" method="post">

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Kota</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="kota" autocomplete="off"

                    placeholder="Input Nama Kota" required>

                </div>
            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Provinsi</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="provinsi" autocomplete="off"

                    placeholder="Input Nama Provinsi" required>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Jarak Tujuan</label>

                <div class="col-sm-10">

                    <input type="number" class="form-control" name="jarak" autocomplete="off"

                    placeholder="Input Jarak Kota Tujuan Lihat di maps" required>

                </div>

            </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="submit" class="btn btn-primary">Submit <i class="fas fa-paper-plane"></i></button>

            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>

        </div>

        </div>

        </form>

    </div>

</div>

<!-- modal add Jarak -->

<div class="modal fade" id="modal_luar_add">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <div class="modal-header">

            <h4 class="modal-title">Tambah Jarak Luar Daerah</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

        <form class="form-horizontal" action="<?php echo site_url('jarak/add_luar'); ?>" method="post">

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Kota</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="kota2" autocomplete="off"

                    placeholder="Input Nama Kota" required>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Provinsi</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="provinsi2" autocomplete="off"

                    placeholder="Input Nama Provinsi" required>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Jarak Tujuan</label>

                <div class="col-sm-10">

                    <input type="number" class="form-control" name="jarak2" autocomplete="off"

                    placeholder="Input Jarak Kota Tujuan Lihat di maps" required>

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

<!-- modal edit Jarak luar-->

<?php foreach($keluar as $row): ?>

<div class="modal fade" id="modal_edit_luar_<?=$row->id_jarak;?>">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <div class="modal-header">

            <h4 class="modal-title">Edit Jarak Luar Daerah</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

        <form class="form-horizontal" action="<?php echo site_url('jarak/edit_luar/'.$row->id_jarak); ?>" method="post">

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Kota</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="kota3" autocomplete="off"

                    placeholder="Input Nama User & Jangan Menggunakan Spasi" value="<?=$row->nama_kota;?>" required disabled>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Provinsi</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="provinsi3" autocomplete="off"

                    placeholder="Input nama Bidang PPTK" value="<?=$row->nama_provinsi;?>" required>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Jarak Tujuan</label>

                <div class="col-sm-10">

                    <input type="number" class="form-control" name="jarak3" autocomplete="off"

                    placeholder="Input Password Minimal 6 Karakter Kombinasi Angka & Huruf" value="<?=$row->jarak;?>" required>

                </div>

            </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="submit" class="btn btn-warning">Edit Luar Daerah <i class="fas fa-edit"></i></button>

            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>

        </div>

        </div>

        </form>

    </div>

</div>

<?php endforeach; ?>

<!-- modal edit Jarak dalam-->

<?php foreach($dalam as $row): ?>

<div class="modal fade" id="modal_edit_dalam_<?=$row->id_jarak;?>">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <div class="modal-header">

            <h4 class="modal-title">Edit Jarak Dalam Daerah</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body">

        <form class="form-horizontal" action="<?php echo site_url('jarak/edit_dalam/'.$row->id_jarak); ?>" method="post">

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Kota</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="kota4" autocomplete="off"

                    placeholder="Input Nama User & Jangan Menggunakan Spasi" value="<?=$row->nama_kota;?>" required disabled>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Nama Provinsi</label>

                <div class="col-sm-10">

                    <input type="text" class="form-control" name="provinsi4" autocomplete="off"

                    placeholder="Input nama Bidang PPTK" value="<?=$row->nama_provinsi;?>" required>

                </div>

            </div>

            <div class="form-group row">

                <label class="col-sm-2 control-label">Jarak Tujuan</label>

                <div class="col-sm-10">

                    <input type="number" class="form-control" name="jarak4" autocomplete="off"

                    placeholder="Input Password Minimal 6 Karakter Kombinasi Angka & Huruf" value="<?=$row->jarak;?>" required>

                </div>

            </div>

        </div>

        <div class="modal-footer justify-content-between">

            <button type="submit" class="btn btn-warning">Edit Dalam Daerah <i class="fas fa-edit"></i></button>

            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>

        </div>

        </div>

        </form>

    </div>

</div>

<?php endforeach; ?>