<div class="content">
    <div class="card card-maroon card-outline">
        <div class="card-header d-flex p-0">
            <ul class="nav nav-pills p-2">
                <li class="nav-item"><a class="nav-link active" href="<?php echo base_url('pegawai');?>" style="margin-left:5px;border:1px solid rgba(0,0,0,.125)"><i class="fas fa-arrow-left"></i> Kembali</a></li>
            </ul>
        </div><!-- /. End card-header -->  
        <div class="card-body pb-0">
        <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Pegawai Sopir</h3>
                </div>
                <!-- form start -->
                <form role="form" action="<?php echo site_url('Pegawai/editsopiract/'.$getsopir['id']); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap Sopir</label>
                            <input type="text" class="form-control" name="nama" autocomplete="off" required value="<?php echo $getsopir['nama']; ?>" placeholder="Input Nama Lengkap Pegawai Sopir">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-warning">Edit</button>
                    </div>
                </form><!-- form end -->
            </div>
            </div>
            <!-- End Col -->
        </div>
        </div>
        <!-- /. End tab 1 -->        
        </div>
        </div>
    </div>
</div>
</div>