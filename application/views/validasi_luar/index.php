<section class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-responsive table-hover" style="width:100%">
                    <thead>
                    <tr>
                    <th width="5%"><center>No.</center></th>
                    <th width="20%"><center>Tanggal</center></th>
                    <th width="20%"><center>Tujuan</center></th>
                    <th width="20%"><center>Acara</center></th>
                    <th width="15%"><center>User PPTK</center></th>
                    <th width="15%"><center>Tombol</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($sppd as $row): $no++ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            Pergi <?php echo tgl_indo($row->tanggal_pergi); ?> <br> 
                            Pulang <?php echo tgl_indo($row->tanggal_pulang); ?>
                        </td>
                        <td>Tujuan : <?php echo $row->tempat; ?></td>
                        <td>Acara : <?php echo $row->acara; ?></td>
                        <td><center><span class="badge badge-success"><?php echo getnama($row->username); ?></span></center></td>
                        <td><center>
                            <a href="<?php echo base_url('validasi_luar/detail/'.$row->id);?>" class="btn bg-indigo"><i class="fas fa-eye"></i> Detail Rincian 
                            </a>
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
<?php foreach($sppd as $row): ?>
<!-- modal cetak spt diskominfo -->
<div class="modal fade" id="modal_cetak_<?=$row->id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Input tanggal Cetak SPT Pegawai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('cetak/cetakspt/'.$row->id); ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control tanggal" name="tgl_cetak" 
                autocomplete="on" required placeholder="Contoh : 26 September 2019">
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
<!-- modal cetak spt setda -->
<div class="modal fade" id="modal_setda_<?=$row->id;?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Input tanggal Cetak SPT Kepala Dinas</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('cetak/cetaksptsetda/'.$row->id); ?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control tanggal" name="tgl_cetak" 
                autocomplete="on" required placeholder="Contoh : 26 September 2019">
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
<!-- modal QR Code -->
<div class="modal fade" id="modal_qr_<?=$row->id;?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">QR-Code SPPD</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <img class="img-fluid" src="<?=base_url('assets/qrcode/'.$row->qrcode)?>">
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>