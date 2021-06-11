<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card card-primary card-outline">
        <div class="card-header d-flex p-0">
            <ul class="nav nav-pills p-2">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Uang Harian</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Uang Transport</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Uang Penginapan</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Uang Representasi</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <h3>Uang Harian Dalam Daerah Kota Serang</h3>
                <div class="card card-success">
                    <div class="card-header">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '<button data-toggle="modal" data-target="#modal_hr_dalam_add" 
                        class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Harian Dalam</button>
                        <button data-toggle="modal" data-target="#modal_hr_dalam_ktrngn_edit" 
                        class="btn btn-default btn-sm"><i class="fas fa-edit"></i> Edit Keterangan Harian Dalam</button>';
                    }else{
                        echo "";
                    }?>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Uraian Eselon</th>
                                <th style="width: 150px">Satuan</th>
                                <th style="width: 150px">Biaya</th>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<th style="width: 150px">Opsi</th>';
                                }else{
                                    echo"";
                                }?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($hr_dalam as $row): $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>(<?php echo eselon($row->eselon_id); ?>)-<?php echo nama_eselon($row->eselon_id); ?></td>
                                <td>Orang/Hari</td>
                                <td><?php echo rupiah($row->biaya); ?></td>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<td><center>
                                    <a href="'.site_url('regulasi/hapus_hr_dalam/'.$row->id).'" 
                                    class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                                    <button data-toggle="modal" data-target="#modal_edit_hr_dalam_"'.$row->id.'" 
                                    class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></button>
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
                </div>
                <!-- /.card col-->
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Harian Dalam:</h5>
                        <?php echo ket_ssh(1); ?>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tab-custom-content" style="border-top:4px solid #212529">
                    </div>
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                <h3>Uang Harian Luar Daerah Non Paket</h3>
                <div class="card card-primary">
                    <div class="card-header">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '<button data-toggle="modal" data-target="#modal_hr_luar_non_add" 
                        class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Harian Luar Non Paket</button>
                        <button data-toggle="modal" data-target="#modal_hr_luar_non_ktrngn_edit" 
                        class="btn btn-default btn-sm"><i class="fas fa-edit"></i> Edit Keterangan Luar Non Paket</button>';
                    }else{
                        echo "";
                    }?>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                        <thead>                  
                            <tr>
                            <th style="width: 10px">No</th>
                            <th>Uraian Eselon</th>
                            <th style="width: 150px">Wilayah Dalam Prov. Banten (Org/Hari)</th>
                            <th style="width: 150px">Wilayah DKI Jakarta (Org/Hari)</th>
                            <th style="width: 150px">Wilayah Luar Prov. Banten (Org/Hari)</th>
                            <?php if($this->session->userdata('skpd')=='121001'){
                            echo '<th style="width: 150px">Opsi</th>';
                            }else{
                                echo"";
                            }?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($hr_luar_non as $row): $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>(<?php echo eselon($row->eselon_id); ?>)-<?php echo nama_eselon($row->eselon_id); ?></td>
                                <td><?php echo rupiah($row->dalam_banten); ?></td>
                                <td><?php echo rupiah($row->jakarta); ?></td>
                                <td><?php echo rupiah($row->luar_banten); ?></td>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<td><center>
                                <a href="'.site_url('regulasi/hapus_hr_luar_non/'.$row->id).'" 
                                class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                                <button data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-target="#modal_edit_hr_luar_non_'.$row->id.'" 
                                class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></button>
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
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Harian Luar Non Paket:</h5>
                        <?php echo ket_ssh(2); ?>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tab-custom-content" style="border-top:4px solid #212529">
                    </div>
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                <h3>Uang Harian Luar Daerah Paket Full Board</h3>
                <div class="card card-danger">
                    <div class="card-header">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '<button data-toggle="modal" data-target="#modal_hr_luar_full_add" 
                        class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Harian Luar Paket Full</button>
                        <button data-toggle="modal" data-target="#modal_hr_luar_full_ktrngn_edit" 
                        class="btn btn-default btn-sm"><i class="fas fa-edit"></i> Edit Keterangan Luar Paket Full</button>';
                    }else{
                        echo "";
                    }?>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                        <thead>                  
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Uraian Eselon</th>
                                <th style="width: 150px">Wilayah Dalam Prov. Banten (Org/Hari)</th>
                                <th style="width: 150px">Wilayah DKI Jakarta (Org/Hari)</th>
                                <th style="width: 150px">Wilayah Luar Prov. Banten (Org/Hari)</th>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                echo '<th style="width: 150px">Opsi</th>';
                                }else{
                                    echo"";
                                }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach($hr_luar_full as $row): $no++ ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td>(<?php echo eselon($row->eselon_id); ?>)-<?php echo nama_eselon($row->eselon_id); ?></td>
                                    <td><?php echo rupiah($row->dalam_banten); ?></td>
                                    <td><?php echo rupiah($row->jakarta); ?></td>
                                    <td><?php echo rupiah($row->luar_banten); ?></td>
                                    <?php if($this->session->userdata('skpd')=='121001'){
                                        echo '<td><center>
                                        <a href="'.site_url('regulasi/hapus_hr_luar_full/'.$row->id).'" 
                                        class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                                        <button data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-target="#modal_edit_hr_luar_paket_full_'.$row->id.'" 
                                        class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></button>
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
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Harian Luar Paket Full:</h5>
                        <?php echo ket_ssh(3); ?>
                    </div>
                </div>
                <!-- /.card col-->
            </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <h3>Biaya Transportasi Luar Daerah</h3>
                <?php if($this->session->userdata('skpd')=='121001'){
                    echo '<button data-toggle="modal" data-target="#modal_add_jarak_tempuh" 
                    class="btn btn-success"><i class="fas fa-pencil-alt"></i> Tambah Jarak Tempuh</button>
                    <button data-toggle="modal" data-target="#modal_add_ssh_transport" 
                    class="btn btn-danger"><i class="fas fa-pencil-alt"></i> Tambah Biaya Transport</button>
                    <button data-toggle="modal" data-target="#modal_edit_ket_transport" 
                    class="btn btn-info"><i class="fas fa-edit"></i> Edit Keterangan Transport</button>
                    <br><br>';
                }else{
                    echo "";
                }?>
                <?php foreach($trans_jarak as $row): ?>
                <div class="card card-secondary">
                    <div class="card-header">
                    <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10"><h3 class="card-title">(<?php echo $row->uraian; ?>)</h3></div>
                    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '
                        <button data-toggle="modal" data-target="#modal_edit_jarak_tempuh_'.$row->id_transport.'" 
                        class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i></button>
                        <a href="'.site_url('regulasi/hapus_jarak_tempuh/'.$row->id_transport).'" 
                        class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                        ';
                    }else{
                        echo"";
                    }?>
                        <button class="btn btn-sm btn-info" data-widget="collapse">
                        <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    </div>
                    <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                        <?php 
                        $ssh=$this->db->where('transport_id',$row->id_transport)->get('ssh_transport')->result();
                        foreach($ssh as $row): ?>
                        <?php if ($row->transport_id == ''){
                            echo"<tr><td class='text-danger'><b>Data Transport Belum di input</b></td></tr>";
                        }elseif($row->transport_id != ''&& $this->session->userdata('skpd')=='121001'){ echo'
                        <tr>
                            <td>
                            <li>('.eselon($row->eselon_id).')-'.nama_eselon($row->eselon_id).'&nbspBiaya&nbsp: '.rupiah($row->biaya).'</li>
                            </td>
                            <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="'.site_url('regulasi/hapus_ssh_transport/'.$row->id).'" 
                                class="btn btn-danger tombolhapus"><i class="fas fa-trash"></i></a>
                            </div>
                            </td>
                        </tr>'; 
                        }else{
                            echo'
                        <tr>
                            <td>
                            <li>('.eselon($row->eselon_id).')-'.nama_eselon($row->eselon_id).'&nbspBiaya&nbsp: '.rupiah($row->biaya).'</li>
                            </td>
                        </tr>';
                        }?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <?php endforeach; ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Transportasi Luar Daerah:</h5>
                        <?php echo ket_ssh(4); ?>
                    </div>
                </div>
                </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3>Uang Akomodasi/Penginapan</h3>
                <div class="card card-primary">
                    <div class="card-header">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '<button data-toggle="modal" data-target="#modal_akomodasi_add" 
                        class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Akomodasi</button>
                        <button data-toggle="modal" data-target="#modal_edit_akomodasi" 
                        class="btn btn-default btn-sm"><i class="fas fa-edit"></i> Edit Keterangan Akomodasi</button>';
                    }else{
                        echo "";
                    }?>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                        <thead>                  
                            <tr>
                            <th style="width: 10px">No</th>
                            <th>Uraian</th>
                            <th style="width: 150px">DKI JAKARTA</th>
                            <th style="width: 150px">Pulau Jawa</th>
                            <th style="width: 150px">Luar Pulau Jawa</th>
                            <?php if($this->session->userdata('skpd')=='121001'){
                            echo '<th style="width: 150px">Opsi</th>';
                            }else{
                                echo"";
                            }?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($akomodasi as $row): $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>(<?php echo eselon($row->eselon_id); ?>)-<?php echo nama_eselon($row->eselon_id); ?></td>
                                <td><?php echo rupiah($row->ibukota); ?></td>
                                <td><?php echo rupiah($row->pulau_jawa); ?></td>
                                <td><?php echo rupiah($row->luar_jawa); ?></td>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                    echo '<td><center>
                                    <a href="'.site_url('regulasi/hapus_akomodasi/'.$row->id).'" 
                                    class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                                    <button data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-target="#modal_edit_akomodasi_'.$row->id.'" 
                                    class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></button>
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
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Akomodasi:</h5>
                        <?php echo ket_ssh(5); ?>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                <div class="col-lg-10 col-md-10 col-sm-12">
                <h3>Uang Representasi</h3>
                <div class="card card-primary">
                    <div class="card-header">
                    <?php if($this->session->userdata('skpd')=='121001'){
                        echo '<button data-toggle="modal" data-target="#modal_representasi_add" 
                        class="btn btn-default btn-sm"><i class="fas fa-plus"></i> Tambah Representasi</button>
                        <button data-toggle="modal" data-target="#modal_edit_representasi" 
                        class="btn btn-default btn-sm"><i class="fas fa-edit"></i> Edit Keterangan Representasi</button>';
                    }else{
                        echo "";
                    }?>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered">
                        <thead>                  
                            <tr>
                            <th style="width: 10px">No</th>
                            <th>Uraian</th>
                            <th style="width: 150px">Dalam Daerah Kota Serang</th>
                            <th style="width: 150px">Dalam Daerah Prov. Banten</th>
                            <th style="width: 150px">Luar Daerah Prov. Banten</th>
                            <?php if($this->session->userdata('skpd')=='121001'){
                            echo '<th style="width: 150px">Opsi</th>';
                            }else{
                                echo"";
                            }?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($representasi as $row): $no++ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>(<?php echo eselon($row->eselon_id); ?>)-<?php echo nama_eselon($row->eselon_id); ?></td>
                                <td><?php echo rupiah($row->kota_serang); ?></td>
                                <td><?php echo rupiah($row->dalam_banten); ?></td>
                                <td><?php echo rupiah($row->luar_banten); ?></td>
                                <?php if($this->session->userdata('skpd')=='121001'){
                                    echo '<td><center>
                                    <a href="'.site_url('regulasi/hapus_representasi/'.$row->id).'" 
                                    class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                                    <button data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-target="#modal_edit_representasi_'.$row->id.'" 
                                    class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i></button>
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
                </div>
                <!-- /.card col-->
                <div class="col-lg-10 col-md-10 col-sm-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Keterangan SSH Representasi:</h5>
                        <?php echo ket_ssh(6); ?>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- END CUSTOM TABS -->
    </div>
</section>
</div>
<!---------------------------- START modal add Harian Dalam --------------------------------------->
<div class="modal fade" id="modal_hr_dalam_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Harian Dalam</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_hr_dalam'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon" style="width: 100%;" required>
                        <option selected="selected">Pilih Eselon</option>
                        <?php 
                            foreach($eselon as $q): ;
                            echo '<option value="'.$q->id_eselon.'">'.$q->eselon.'-'.$q->uraian.'</option>';
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya SSH</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya" autocomplete="off"
                        placeholder="Input Biaya SSH" required>
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
<?php foreach($hr_dalam as $row): ?>
<div class="modal fade" id="modal_edit_hr_dalam_<?=$row->id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Harian Dalam <?php echo nama_eselon($row->eselon_id); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_hr_dalam/'.$row->id); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>" <?php if($row->eselon_id == $p->id_eselon){echo "selected";} ?>><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya SSH</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya" autocomplete="off"
                        placeholder="Input Biaya SSH" required value="<?php echo $row->biaya; ?>">
                    </div>
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
<!-- modal edit Keterangan Harian Dalam -->
<div class="modal fade" id="modal_hr_dalam_ktrngn_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Harian Dalam</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_hr_dalam');?>" method="post">
            <textarea class="textarea" name="ket_hr_dalam"><?php echo ket_ssh(1); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- END modal Harian Dalam ----------------------------------------->
<!--------------------------- START modal add Harian Luar Non Paket ------------------------------->
<div class="modal fade" id="modal_hr_luar_non_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Harian Luar Non Paket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_hr_luar_non'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon1" style="width: 100%;" required>
                        <option selected="selected">Pilih Eselon</option>
                        <?php 
                            foreach($eselon as $q): ;
                            echo '<option value="'.$q->id_eselon.'">'.$q->eselon.'-'.$q->uraian.'</option>';
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Dalam Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dalam" autocomplete="off"
                        placeholder="Input Biaya SSH Dalam Prov Banten" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Wilayah DKI Jakarta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dki" autocomplete="off"
                        placeholder="Input Biaya SSH WIlayah DKI Jakarta" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Luar Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_luar" autocomplete="off"
                        placeholder="Input Biaya SSH Luar Prov Banten" required>
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
<?php foreach($hr_luar_non as $row): ?>
<div class="modal fade" id="modal_edit_hr_luar_non_<?=$row->id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Harian Luar Non Paket <?php echo nama_eselon($row->eselon_id); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_hr_luar_non/'.$row->id); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon1" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>" <?php if($row->eselon_id == $p->id_eselon){echo "selected";} ?>><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Dalam Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dalam" autocomplete="off"
                        placeholder="Input Biaya SSH Dalam Prov Banten" required value="<?php echo $row->dalam_banten; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Wilayah DKI Jakarta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dki" autocomplete="off"
                        placeholder="Input Biaya SSH WIlayah DKI Jakarta" required value="<?php echo $row->jakarta; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Luar Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_luar" autocomplete="off"
                        placeholder="Input Biaya SSH Luar Prov Banten" required value="<?php echo $row->luar_banten; ?>">
                    </div>
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
<!-- modal add Keterangan Harian Luar Non Paket -->
<div class="modal fade" id="modal_hr_luar_non_ktrngn_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Harian Luar Non Paket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_hr_luar_non');?>" method="post">
            <textarea class="textarea" name="ket_hr_luar_non"><?php echo ket_ssh(2); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- END modal Harian Luar Non Paket -------------------------------->
<!----------------------------- START modal add Harian Luar Paket Full ---------------------------->
<div class="modal fade" id="modal_hr_luar_full_add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Harian Luar Paket Full Board</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_hr_luar_full'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon2" style="width: 100%;" required>
                        <option selected="selected">Pilih Eselon</option>
                        <?php 
                            foreach($eselon as $q): ;
                            echo '<option value="'.$q->id_eselon.'">'.$q->eselon.'-'.$q->uraian.'</option>';
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Dalam Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dalam2" autocomplete="off"
                        placeholder="Input Biaya SSH Dalam Prov Banten" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Wilayah DKI Jakarta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dki2" autocomplete="off"
                        placeholder="Input Biaya SSH WIlayah DKI Jakarta" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Luar Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_luar2" autocomplete="off"
                        placeholder="Input Biaya SSH Luar Prov Banten" required>
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
<?php foreach($hr_luar_full as $row): ?>
<div class="modal fade" id="modal_edit_hr_luar_paket_full_<?=$row->id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Harian Luar Paket Full <?php echo nama_eselon($row->eselon_id); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_hr_luar_full/'.$row->id); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon2" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>" <?php if($row->eselon_id == $p->id_eselon){echo "selected";} ?>><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Dalam Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dalam2" autocomplete="off"
                        placeholder="Input Biaya SSH Dalam Prov Banten" required value="<?php echo $row->dalam_banten; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Wilayah DKI Jakarta</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_dki2" autocomplete="off"
                        placeholder="Input Biaya SSH WIlayah DKI Jakarta" required value="<?php echo $row->jakarta; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Luar Prov Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya_luar2" autocomplete="off"
                        placeholder="Input Biaya SSH Luar Prov Banten" required value="<?php echo $row->luar_banten; ?>">
                    </div>
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
<!-- modal add Keterangan Harian Luar Paket Full -->
<div class="modal fade" id="modal_hr_luar_full_ktrngn_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Harian Luar Paket Full</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_hr_luar_full');?>" method="post">
            <textarea class="textarea" name="ket_hr_luar_full"><?php echo ket_ssh(3); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- START modal Jarak Tempuh ------------------------->
<!-- modal add Keterangan Harian Luar Paket Full -->
<div class="modal fade" id="modal_add_jarak_tempuh">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Jarak Tempuh Transport</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_jarak_tempuh'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Uraian Jarak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="uraian" autocomplete="off"
                    placeholder="Input Uraian Jarak SSH" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jarak Awal</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="awal" autocomplete="off"
                    placeholder="Input Jarak Awal" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jarak Akhir</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="akhir" autocomplete="off"
                    placeholder="Input Jarak Akhir" required>
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
<?php foreach($trans_jarak as $row): ?>
<div class="modal fade" id="modal_edit_jarak_tempuh_<?=$row->id_transport;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data <?php echo $row->uraian; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_jarak_tempuh/'.$row->id_transport); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id_transport;?>" name="id" class="form-control">
        <div class="form-group row">
                <label class="col-sm-2 control-label">Uraian Jarak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="uraian" autocomplete="off"
                    placeholder="Input Uraian Jarak SSH" required value="<?php echo $row->uraian; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jarak Awal</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="awal" autocomplete="off"
                    placeholder="Input Jarak Awal" required value="<?php echo $row->awal; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jarak Akhir</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="akhir" autocomplete="off"
                    placeholder="Input Jarak Akhir" required value="<?php echo $row->akhir; ?>">
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
<!-------------------------------- END modal Jarak Tempuh ----------------------------------------->
<!-------------------------------- START modal SSH TRANSPORT -------------------------------------->
<!-- modal add Keterangan Harian Luar Paket Full -->
<div class="modal fade" id="modal_add_ssh_transport">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Transport</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_ssh_transport'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon3" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>"><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Jarak Tempuh</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="jarak" style="width: 100%;" data-placeholder="Pilih Jarak Tempuh" required>
                        <option></option>
                        <?php foreach($trans_jarak as $p):; ?>
                        <option value="<?php echo $p->id_transport; ?>"><?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Biaya Transport</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="biaya2" autocomplete="off"
                        placeholder="Input Biaya Transport" required>
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
<!-- modal EDit Keterangan Transport -->
<div class="modal fade" id="modal_edit_ket_transport">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Transportasi Luar Daerah</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_transport');?>" method="post">
            <textarea class="textarea" name="ket_transport"><?php echo ket_ssh(4); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- END modal SSH Transport ---------------------------------------->
<!-------------------------------- START modal SSH Akomodasi -------------------------------------->
<!-- modal add SSH Akomodasi -->
<div class="modal fade" id="modal_akomodasi_add">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Akomodasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_ssh_akomodasi'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon4" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>"><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Daerah Ibukota</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="ibukota" autocomplete="off"
                        placeholder="Input Akomodasi Daerah Ibukota" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pulau Jawa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="pulau_jawa" autocomplete="off"
                        placeholder="Input Akomodasi Pulau Jawa" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Luar Pulau Jawa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="luar_jawa" autocomplete="off"
                        placeholder="Input Akomodasi Luar Pulau Jawa" required>
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
<?php foreach($akomodasi as $row): ?>
<div class="modal fade" id="modal_edit_akomodasi_<?=$row->id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Akomodasi <?php echo nama_eselon($row->eselon_id); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_akomodasi/'.$row->id); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon4" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>" <?php if($row->eselon_id == $p->id_eselon){echo "selected";} ?>><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Daerah Ibukota</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="ibukota" autocomplete="off"
                        placeholder="Input Biaya SSH Akomodasi Daerah Ibukota" required value="<?php echo $row->ibukota; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pulau Jawa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="pulau_jawa" autocomplete="off"
                        placeholder="Input Biaya SSH Akomodasi Pulau Jawa" required value="<?php echo $row->pulau_jawa; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Luar Pulau Jawa</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="luar_jawa" autocomplete="off" placeholder="Input Biaya SSH Akomodasi Luar Pulau Jawa" required value="<?php echo $row->luar_jawa; ?>">
                    </div>
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
<!-- modal Edit Keterangan Akomodasi -->
<div class="modal fade" id="modal_edit_akomodasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Akomodasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_akomodasi');?>" method="post">
            <textarea class="textarea" name="ket_akomodasi"><?php echo ket_ssh(5); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- END modal SSH akomodasi ---------------------------------------->
<!-------------------------------- START modal SSH Representasi -------------------------------------->
<!-- modal add SSH representasi -->
<div class="modal fade" id="modal_representasi_add">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah SSH Representasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/add_ssh_representasi'); ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon5" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>"><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Dalam Daerah Kota Serang</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="serang" autocomplete="off"
                        placeholder="Input Representasi Dalam Derah Kota Serang" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Dalam Daerah Prov. Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="dalam_banten" autocomplete="off"
                        placeholder="Input Representasi Dalam Daerah Prov. Banten" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Luar Daerah Prov. Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="luar_banten" autocomplete="off"
                        placeholder="Input Representasi Luar Daerah Prov. Banten" required>
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
<?php foreach($representasi as $row): ?>
<div class="modal fade" id="modal_edit_representasi_<?=$row->id;?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Representasi <?php echo nama_eselon($row->eselon_id); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('regulasi/edit_representasi/'.$row->id); ?>" method="post">
        <input type="hidden" readonly value="<?=$row->id;?>" name="id" class="form-control">
            <div class="form-group row">
                <label class="col-sm-2 control-label">Nama Eselon</label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="eselon5" style="width: 100%;" data-placeholder="Pilih Eselon Pegawai" required>
                        <option></option>
                        <?php foreach($eselon as $p):; ?>
                        <option value="<?php echo $p->id_eselon; ?>" <?php if($row->eselon_id == $p->id_eselon){echo "selected";} ?>><?php echo $p->eselon; ?>-<?php echo $p->uraian; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Dalam Daerah Kota Serang</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="serang" autocomplete="off"
                        placeholder="Input Representasi Dalam Derah Kota Serang" required value="<?php echo $row->kota_serang; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Dalam Daerah Prov. Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="dalam_banten" autocomplete="off"
                        placeholder="Input Representasi Dalam Daerah Prov. Banten" required value="<?php echo $row->dalam_banten; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Luar Daerah Prov. Banten</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="luar_banten" autocomplete="off"
                        placeholder="Input Representasi Luar Prov. Banten" required value="<?php echo $row->luar_banten; ?>">
                    </div>
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
<!-- modal Edit Keterangan Akomodasi -->
<div class="modal fade" id="modal_edit_representasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Keterangan SSH Representasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form role="form" action="<?php echo site_url('regulasi/ket_representasi');?>" method="post">
            <textarea class="textarea" name="ket_representasi"><?php echo ket_ssh(6); ?></textarea>
            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Edit Keterangan</button>
        </form>
        </div>
        </div>
    </div>
</div>
<!-------------------------------- END modal SSH Represtatif ---------------------------------------->