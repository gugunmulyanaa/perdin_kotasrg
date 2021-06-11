<section class="content">
  <div class="container-fluid">
    <div class="card card-navy card-outline">
      <div class="card-header d-flex p-0">
        <ul class="nav nav-pills p-2">
            <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('progkeg');?>" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)"><i class="fas fa-arrow-left"></i> Kembali</a></li>
        </ul>
      </div><!-- /. End card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Form Edit Rincian DPA SPPD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Progkeg/edituraiact/'.$urai['id']); ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Program</label>
                      <select class="form-control select2" name="prog" style="width: 100%;" data-placeholder="Pilih Nama Program" required>
                          <option></option>
                          <?php foreach($prog as $p):; ?>
                          <option value="<?php echo $p->id; ?>" <?php if($urai['program_id'] == $p->id){echo "selected";} ?>><?php echo $p->kode; ?>-<?php echo $p->nama; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <select class="form-control select2" name="keg" style="width: 100%;" data-placeholder="Pilih Nama Kegiatan" required>
                          <option></option>
                          <?php foreach($keg as $k):; ?>
                          <option value="<?php echo $k->id_kegiatan; ?>" <?php if($urai['kegiatan_id'] == $k->id_kegiatan){echo "selected";} ?>><?php echo $k->kode_kegiatan; ?>-<?php echo $k->nama_kegiatan; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pegawai PPTK</label>
                      <select class="form-control select2" name="pptk" style="width: 100%;" data-placeholder="Pilih Nama Pegawai PPTK" required>
                          <option></option>
                          <?php foreach($pptk as $p):; ?>
                          <option value="<?php echo $p->id; ?>" <?php if($urai['pejabat_id'] == $p->id){echo "selected";} ?>><?php echo $p->gelar_depan; ?> <?php echo $p->nama; ?>, <?php echo $p->gelar_belakang; ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jenis SPPD</label>
                      <select class="form-control" required name="jenis">
                        <option value="" disabled selected>Pilih Jenis SPPD</option>
                        <option value="1" <?php if($urai['jenis_uraian']=='1'){echo "selected";} ?>>SPPD Dalam Daerah</option>
                        <option value="2" <?php if($urai['jenis_uraian']=='2'){echo "selected";} ?>>SPPD Luar Daerah</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Pagu Anggaran</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">RP</span>
                        </div>
                        <input type="text" class="form-control uang" name="pagu" autocomplete="off" placeholder="Masukan Jumlah Pagu Anggaran" value="<?php echo $urai['pagu_anggaran']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-warning">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
            </div>
          </div>
          <!-- /. End Tab 1 -->
        </div>
      </div>
    </div>
  </div>
</section>
</div>