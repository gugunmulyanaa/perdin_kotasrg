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
                  <h3 class="card-title">Form Edit Kegiatan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Progkeg/editkegact/'.$keg['id_kegiatan']); ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Nama Program</label>
                    <select class="form-control select2" name="prog_kode" style="width: 100%;" data-placeholder="Pilih Nama Program" required>
                        <option></option>
                        <?php foreach($prog as $p):; ?>
                        <option value="<?php echo $p->kode; ?>" <?php if($keg['program_kode'] == $p->kode){echo "selected";} ?>><?php echo $p->kode; ?>-<?php echo $p->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kode Kegiatan</label>
                      <input type="text" class="form-control" placeholder="Masukan Kode Kegiatan" autocomplete="off" value="<?php echo $keg['kode_kegiatan']; ?>" name="kode" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Kegiatan</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Kegiatan" autocomplete="off" value="<?php echo $keg['nama_kegiatan']; ?>" name="nama" required>
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