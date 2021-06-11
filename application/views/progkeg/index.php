<section class="content">
  <div class="container-fluid">
    <div class="card card-navy card-outline">
      <div class="card-header d-flex p-0">
        <ul class="nav nav-pills p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Rincian DPA</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Program</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)">Kegiatan</a></li>
        </ul>
      </div><!-- /. End card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Rincian DPA SPPD</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo site_url('Progkeg/adduraian'); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Program</label>
                    <select class="form-control select2" name="prog" style="width: 100%;" data-placeholder="Pilih Nama Program" required>
                        <option></option>
                        <?php foreach($prog as $p):; ?>
                        <option value="<?php echo $p->id; ?>"><?php echo $p->kode; ?>-<?php echo $p->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kegiatan</label>
                    <select class="form-control select2" name="keg" style="width: 100%;" data-placeholder="Pilih Nama Kegiatan" required>
                        <option></option>
                        <?php foreach($keg as $p):; ?>
                        <option value="<?php echo $p->id_kegiatan; ?>"><?php echo $p->kode_kegiatan; ?>-<?php echo $p->nama_kegiatan; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama PPTK</label>
                    <select class="form-control select2" name="pptk" style="width: 100%;" data-placeholder="Pilih Nama PPTK" required>
                        <option></option>
                        <?php foreach($pptk as $p):; ?>
                        <option value="<?php echo $p->id; ?>"><?php echo $p->gelar_depan; ?> <?php echo $p->nama; ?>,<?php echo $p->gelar_belakang; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis SPPD</label>
                    <select class="form-control" required name="jenis">
                        <option value="" disabled selected>Pilih Jenis SPPD</option>
                        <option value="1">SPPD Dalam Daerah</option>
                        <option value="2">SPPD Luar Daerah</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pagu Anggaran</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="pagu" autocomplete="off" placeholder="Masukan Jumlah Pagu Anggaran" required>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
              <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Daftar Rincian DPA SPPD</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered"  style="width:100%">
                  <thead>                  
                      <tr>
                          <th style="width: 15%">Uraian belanja</th>
                          <th style="width: 30%">Program</th>
                          <th style="width: 30%">Kegiatan</th>
                          <th style="width: 15%;text-align:center;">Pagu Anggaran</th>
                          <th style="width: 20%;text-align:center;">Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($uraian as $row): ?>
                    <tr>
                      <td style="width: 15%"><?php if ($row->jenis_uraian == '1'){
                        echo "<span class='badge bg-maroon'> SPPD Dalam Daerah</span>";
                      }else{
                        echo "<span class='badge bg-indigo'> SPPD Luar Daerah</span>";
                      }?> </td>
                      <td style="width: 30%"><?php echo getprogram($row->program_id); ?></td>
                      <td style="width: 30%"><?php echo getkeg($row->kegiatan_id); ?></td>
                      <td style="width: 15%;text-align:right;"><b><?php echo rupiah($row->pagu_anggaran); ?></b></td>
                      <td style="width: 20%">
                        <center>
                          <a href="<?php echo site_url('progkeg/hapusuraian/'.$row->id); ?>" 
                          class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                          <a href="<?php echo site_url('progkeg/edituraian/'.$row->id); ?>" 
                          class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        </center>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                </div>
            </div>
            </div>
          </div>
          <!-- /. End Tab 1 -->
          <div class="tab-pane" id="tab_2">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Program</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo site_url('Progkeg/addprogram'); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Program</label>
                    <input type="text" class="form-control" placeholder="Masukan Kode Program" autocomplete="off" name="kode" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Program</label>
                    <input type="text" class="form-control" placeholder="Masukan Nama Program" autocomplete="off" name="nama" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Daftar Program Perjalanan Dinas</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered"  style="width:100%">
                  <thead>                  
                      <tr>
                          <th style="width: 10%;">No.</th>
                          <th style="width: 20%;">Kode Program</th>
                          <th style="width: 55%;text-align:center;">Nama Program</th>
                          <th style="width: 15%;text-align:center;">Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($prog as $row): $no++?>
                      <tr>
                        <td style="width: 10%"><?php echo $no; ?></td>
                        <td style="width: 20%"><?php echo $row->kode; ?></td>
                        <td style="width: 55%"><?php echo $row->nama; ?></td>
                        <td style="width: 15%">
                          <center>
                          <a href="<?php echo site_url('progkeg/hapusprogram/'.$row->id); ?>" 
                          class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                          <a href="<?php echo site_url('progkeg/editprog/'.$row->id); ?>" 
                          class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          </center>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                </div>
            </div>
            </div>
          </div>
          <!-- /. End Tab 2 -->
          <div class="tab-pane" id="tab_3">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Kegiatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo site_url('Progkeg/addkegiatan'); ?>" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Nama Program</label>
                    <select class="form-control select2" name="prog_kode" style="width: 100%;" data-placeholder="Pilih Nama Program" required>
                        <option></option>
                        <?php foreach($prog as $p):; ?>
                        <option value="<?php echo $p->kode; ?>"><?php echo $p->kode; ?>-<?php echo $p->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Kegiatan</label>
                    <input type="text" class="form-control" name="kode" placeholder="Masukan Kode Kegiatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Kegiatan</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Kegiatan">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Daftar Kegiatan Perjalanan Dinas</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered"  style="width:100%">
                  <thead>                  
                      <tr>
                          <th style="width: 10%">No.</th>
                          <th style="width: 15%">Kode Program</th>
                          <th style="width: 15%">Kode Kegiatan</th>
                          <th style="width: 45%">Nama Kegiatan</th>
                          <th style="width: 15%;text-align:center;">Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no=0; foreach($keg as $row): $no++?>
                    <tr>
                      <td style="width: 10%"><?php echo $no; ?></td>
                      <td style="width: 15%"><?php echo $row->program_kode; ?></td>
                      <td style="width: 15%"><?php echo $row->kode_kegiatan; ?></td>
                      <td style="width: 45%"><?php echo $row->nama_kegiatan; ?></td>
                      <td style="width: 15%">
                        <center>
                          <a href="<?php echo site_url('progkeg/hapuskegiatan/'.$row->id_kegiatan); ?>" 
                          class="btn btn-danger btn-sm tombolhapus"><i class="fas fa-trash"></i></a>
                          <a href="<?php echo site_url('progkeg/editkeg/'.$row->id_kegiatan); ?>" 
                          class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        </center>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                </div>
            </div>
            </div>
          </div>
          <!-- /. End Tab  -->
        </div>
      </div>
    </div>
  </div>
</section>
</div>