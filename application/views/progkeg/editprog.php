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
                  <h3 class="card-title">Form Edit Program</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Progkeg/editprogact/'.$prog['id']); ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Program</label>
                      <input type="text" class="form-control" placeholder="Masukan Kode Program" autocomplete="off" value="<?php echo $prog['kode']; ?>" name="kode" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Program</label>
                      <input type="text" class="form-control" placeholder="Masukan Nama Program" autocomplete="off" value="<?php echo $prog['nama']; ?>" name="nama" required>
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