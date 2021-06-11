<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <a href="<?php echo base_url('sppd_luar');?>"
                class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">Tambah Pegawai</button>
                    <div class="dropdown-menu" role="menu">
                        <button data-toggle="modal" data-target="#modal_add_asn"
                        class="dropdown-item">ASN</button>
                        <div class="dropdown-divider"></div>
                        <button data-toggle="modal" data-target="#modal_add_non_asn" class="dropdown-item" href="#">NON ASN</button>
                        <div class="dropdown-divider"></div>
                        <button data-toggle="modal" data-target="#modal_add_sopir" class="dropdown-item" href="#">SOPIR</button>
                    </div>
                </div>
                <?php if(getjumpegawai($id) >= 1 && cekpegawai($id) == getkepalaskpd($this->session->userdata('skpd'))){
                    echo '<button data-toggle="modal" data-target="#modal_setda_'.$id.'" 
                    class="btn bg-maroon btn-sm"><i class="fas fa-print"></i> Cetak SPT</button>';
                }elseif(getjumpegawai($id) >= 1 && cekpegawai($id) != getkepalaskpd($this->session->userdata('skpd'))){
                    echo '<button data-toggle="modal" data-target="#modal_spt_'.$id.'"
                    class="btn bg-maroon btn-sm"><i class="fas fa-print"></i> Cetak SPT</button>';
                }else{
                    echo'';
                }?>
                <?php if(getjumpegawai($id) >= 1 && cekpegawai($id) == getkepalaskpd($this->session->userdata('skpd')) && getstatus($id) >= 2){
                    echo '<a href="'.site_url('cetak/cetaksppdsetdaluar/'.$id).'" 
                    class="btn bg-purple btn-sm"><i class="fas fa-print"></i> Cetak Visum</a>';
                }elseif(getjumpegawai($id) >= 1 && cekpegawai($id) != getkepalaskpd($this->session->userdata('skpd')) && getstatus($id) >= 2){
                    echo '<a href="'.site_url('cetak/cetaksppdluar/'.$id).'"
                    class="btn bg-purple btn-sm"><i class="fas fa-print"></i> Cetak Visum</a>';
                }else{
                    echo'';
                }?>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-hover table-responsive" style="width:100%">
                    <thead>
                    <tr>
                    <th width="5%"><center>No.</center></th>
                    <th width="27%"><center>Nama Pegawai</center></th>
                    <th width="45%"><center>Biaya SPPD</center></th>
                    <th width="23%"><center>Tombol</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($kwitansi as $row): $no++;?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo getdepan($row->pegawai_id); ?> <?php echo getpegawai($row->pegawai_id); ?>, <?php echo getbelakang($row->pegawai_id); ?></td>
                        <td>
                            Harian : <?= $row->lamanya ?> X <?php echo rupiah($row->uang_harian); ?> = <?= rupiah($row->tot_harian); ?><br>
                            Transport : 1 X <?php echo rupiah($row->uang_transport); ?> = <?= rupiah($row->tot_transport); ?><br>
                            Representatif : <?= $row->lamanya ?> X <?php echo rupiah($row->uang_representatif); ?> = <?= rupiah($row->tot_representatif); ?><br>
                            Hotel : <?php $hari = $row->lamanya - 1; echo $hari ?> X <?php echo rupiah($row->uang_hotel); ?> = <?= rupiah($row->tot_hotel); ?>
                        </td>
                        <td>
                            <center>
                            <a href="<?php echo site_url('kwitansi_luar/hapuskwitansi/'.$row->id); ?>" 
                            class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i> Hapus</a>
                            <a href="<?php echo site_url('kwitansi_luar/edit/'.$row->id); ?>" 
                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a><br>
                            <?php if(getstatus(getspt($row->id)) >= 4){
                                echo '<button data-toggle="modal" data-target="#modal_kwitansi_'.$row->id.'" class="btn bg-navy btn-sm"><i class="fas fa-print"></i> Cetak Kwitansi</button>';
                            }else{
                                echo'';
                            }?>
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
                <p><b>Tgl Berangkat :</b> <?= tgl_indo(getberangkat($id));?></p>
                <p><b>Tgl Pulang :</b> <?= tgl_indo(getpulang($id));?></p>
                <p><b>Hari :</b> <?=gethari($id);?></p>
                <p><b>Waktu :</b> <?=getwaktu($id);?></p>
                <p><b>Kendaraan :</b> <?=getkendaraan($id);?></p>
                <p><b>Tujuan :</b> <?=gettujuan($id);?></p>
                <p><b>Sisa Anggaran :</b> <?=rupiah($pagudigunakan);?>/<?=rupiah($pagutotal);?></p>
                <div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                        aria-valuenow="3000" aria-valuemin="0" aria-valuemax="3600" style="width: <?=$pagupersen;?>%">
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
</div>
<!-- modal add Pegawai ASN -->
<div class="modal fade" id="modal_add_asn">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Pegawai ASN Ditugaskan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Kwitansi_luar/add_auto_kwitansi/'.$id); ?>" method="post">
        <div class="callout callout-warning">
            <h4 class="text-danger"><i class="fas fa-info"></i> Petunjuk (Warning) :</h4>
            <p class="text-danger">- Perhitungan biaya otomatis diambil berdasarkan biaya tertinggi SSH yang berlaku.<br>- Perhitungan biaya otomatis tidak bisa digunakan apabila total biaya perjalan dinas yang akan dilaksanakan melebihi pagu anggaran kegiatan.<br>- Apabila ingin merubah biaya perjalanan dinas, silahkan gunakan fungsi (EDIT)</p>
        </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pilih Pegawai </label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="pegawai" style="width: 100%;"
                    data-placeholder="Pilih Nama Pegawai ASN yang Menjalankan Tugas" required>
                    <option></option>
                        <?php foreach($asn as $a):; ?>
                        <option value="<?php echo $a->id; ?>">
                        <?php echo $a->gelar_depan; ?> <?php echo $a->nama; ?>, <?php echo $a->gelar_belakang; ?></option>
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
<!-- modal add Pegawai NON ASN -->
<div class="modal fade" id="modal_add_non_asn">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Pegawai NON ASN Ditugaskan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Kwitansi_luar/add_auto_kwitansi/'.$id); ?>" method="post">
        <div class="callout callout-warning">
            <h4 class="text-danger"><i class="fas fa-info"></i> Petunjuk (Warning) :</h4>
            <p class="text-danger">- Perhitungan biaya otomatis diambil berdasarkan biaya tertinggi SSH yang berlaku.<br>- Perhitungan biaya otomatis tidak bisa digunakan apabila total biaya perjalan dinas yang akan dilaksanakan melebihi pagu anggaran kegiatan.<br>- Apabila ingin merubah biaya perjalanan dinas, silahkan gunakan fungsi (EDIT)</p>
        </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pilih Pegawai </label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="pegawai" style="width: 100%;"
                    data-placeholder="Pilih Nama Pegawai NON ASN yang Menjalankan Tugas" required>
                    <option></option>
                        <?php foreach($thl as $t):; ?>
                        <option value="<?php echo $t->id; ?>">
                        <?php echo $t->nama; ?></option>
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
<!-- modal add Pegawai Sopir -->
<div class="modal fade" id="modal_add_sopir">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Pegawai SOPIR Ditugaskan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Kwitansi_luar/add_auto_kwitansi/'.$id); ?>" method="post">
        <div class="callout callout-warning">
            <h4 class="text-danger"><i class="fas fa-info"></i> Petunjuk (Warning) :</h4>
            <p class="text-danger">- Perhitungan biaya otomatis diambil berdasarkan biaya tertinggi SSH yang berlaku.<br>- Perhitungan biaya otomatis tidak bisa digunakan apabila total biaya perjalan dinas yang akan dilaksanakan melebihi pagu anggaran kegiatan.<br>- Apabila ingin merubah biaya perjalanan dinas, silahkan gunakan fungsi (EDIT)</p>
        </div>
            <div class="form-group row">
                <label class="col-sm-2 control-label">Pilih Pegawai </label>
                <div class="col-sm-10">
                    <select class="form-control select2" name="pegawai" style="width: 100%;"
                    data-placeholder="Pilih Nama Pegawai SOPIR yang Menjalankan Tugas" required>
                    <option></option>
                        <?php foreach($sopir as $s):; ?>
                        <option value="<?php echo $s->id; ?>">
                        <?php echo $s->nama; ?></option>
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
<!-- modal cetak spt pegawai -->
<div class="modal fade" id="modal_spt_<?=$id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Input tanggal Cetak SPT Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('cetak/cetakspt/'.$id); ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control tanggal" name="tgl_cetak" 
                autocomplete="on" required placeholder="Klik untuk memilih tanggal cetak">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Cetak SPT <i class="fas fa-print"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- modal cetak spt kepala dinas -->
<div class="modal fade" id="modal_setda_<?=$id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Input tanggal Cetak SPT Kepala Dinas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('cetak/cetaksptsetda/'.$id); ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control tanggal" name="tgl_cetak" 
                autocomplete="on" required placeholder="Klik untuk memilih tanggal cetak">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Cetak SPT <i class="fas fa-print"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>
<?php foreach($kwitansi as $row): ?>
<div class="modal fade" id="modal_kwitansi_<?=$row->id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Input tanggal cetak kwitansi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('cetak/cetakkwitansiluar/'.$row->id); ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control tanggal" name="tgl_cetak" 
                autocomplete="on" required placeholder="Klik disini untuk memilih tanggal cetak">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Cetak Kwitansi <i class="fas fa-print"></i></button>
            <button type="button" data-dismiss="modal" class="btn btn-default float-right">Cancel</button>
        </div>
        </div>
        </form>
    </div>
</div>
<?php endforeach; ?>