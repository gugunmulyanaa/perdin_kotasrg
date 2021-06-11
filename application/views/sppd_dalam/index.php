<section class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-indigo">
                <a href="<?php echo site_url('sppd_dalam/add');?>" 
                class="btn bg-maroon"><i class="fas fa-plus"></i> Tambah Data Kegiatan</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-responsive table-hover" style="width:100%">
                    <thead>
                    <tr>
                    <th width="3%"><center>No.</center></th>
                    <th width="17%"><center>Status</center></th>
                    <th width="20%"><center>Tanggal</center></th>
                    <th width="22%"><center>Tujuan & Acara</center></th>
                    <th width="17%"><center>Rincian SPPD</center></th>
                    <th width="23%"><center>Tombol</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($sppd as $row): $no++ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><center><?php if(getjumpegawai($row->id) >= 1 && getstatus($row->id) == 1){
                            echo "<btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input Pegawai'><i class='fas fa-user'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Cetak SPT' ><i class='fas fa-file-alt'></i></btn>  
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Cetak Visum'><i class='fas fa-print'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Input LHPD'><i class='fas fa-clipboard-list'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
						}elseif(getjumpegawai($row->id) >= 1 && getstatus($row->id) == 2){
                            echo "<btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input Pegawai'><i class='fas fa-user'></i></btn> 
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak SPT'><i class='fas fa-file-alt'></i></i></btn>
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Cetak Visum'><i class='fas fa-print'></i></btn>
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Input LHPD'><i class='fas fa-clipboard-list'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
                        }elseif(getjumpegawai($row->id) >= 1 && getstatus($row->id) == 3){
                            echo "<btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input Pegawai'><i class='fas fa-user'></i></btn>
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak SPT'><i class='fas fa-file-alt'></i></i></btn>
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak Visum'><i class='fas fa-print'></i></btn>
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Input LHPD'><i class='fas fa-clipboard-list'></i></btn>
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
                        }elseif(getjumpegawai($row->id) >= 1 && getstatus($row->id) == 4){
                            echo "<btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input SPT'><i class='fas fa-user'></i></btn> 
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak SPT'><i class='fas fa-file-alt'></i></i></btn>  
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak Visum'><i class='fas fa-print'></i></btn> 
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input LHPD'><i class='fas fa-clipboard-list'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
                        }elseif(getjumpegawai($row->id) >= 1 && getstatus($row->id) == 5){
                            echo "<btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input Pegawai'><i class='fas fa-user'></i></btn> 
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak SPT'><i class='fas fa-file-alt'></i></i></btn>  
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Cetak Visum'><i class='fas fa-print'></i></btn> 
                            <btn class='btn btn-primary btn-sm' data-toggle='tooltip' title='Sudah Input LHPD'><i class='fas fa-clipboard-list'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
                        }else{
                            echo "<btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Input Pegawai'><i class='fas fa-user'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Cetak SPT'><i class='fas fa-file-alt'></i></i></btn>  
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Cetak Visum'><i class='fas fa-print'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Input LHPD'><i class='fas fa-clipboard-list'></i></btn> 
                            <btn class='btn bg-dark btn-sm' data-toggle='tooltip' title='Belum Divalidasi'><i class='fas fa-clipboard-check'></i></btn>";
                        }?></center></td>
                        <td>
                            Pergi <?php echo tgl_indo($row->tanggal_pergi); ?> <br> 
                            Pulang <?php echo tgl_indo($row->tanggal_pulang); ?> <br>
                        </td>
                        <td>Tujuan : <?php echo $row->tempat; ?><br>Acara : <?php echo $row->acara; ?></td>
                        <td><center>
                        <a href="<?php echo base_url('kwitansi_dalam/kwitansi/'.$row->id);?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> RINCIAN SPPD
                        </a>
                        </center></td>
                        <td><center>
                            <a href="<?php echo site_url('sppd_dalam/hapus/'.$row->id); ?>" 
                            class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i> Hapus</a>
                            <a href="<?php echo base_url('sppd_dalam/edit/'.$row->id);?>" 
                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <br>
                            <button data-toggle="modal" data-target="#modal_qr_<?=$row->id;?>" 
                            class="btn bg-black btn-sm"> <i class="fas fa-qrcode"></i> QR-CODE</button>
                            <?php if(getjumpegawai($row->id) >= 1 && getstatus($row->id) >= 3){
                                echo '<a href="'.base_url('sppd_dalam/lhpd/'.$row->id).'" 
                                class="btn bg-teal btn-sm"><i class="fas fa-file-alt"></i> LHPD</a>';
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
    </div>
</section>
</div>
<?php foreach($sppd as $row): ?>
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