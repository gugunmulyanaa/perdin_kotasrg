<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="row">
		<div class="col-lg-3 col-6">
            <!-- small box -->
			<div class="small-box bg-warning">
			<div class="inner">
				<h3 style="color:white"><?php echo $dalampending; ?></h3>
				<p style="color:white"><b>SPPD Dalam Pending</b></p>
			</div>
			<div class="icon">
				<i class="fas fa-shipping-fast"></i>
			</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-success">
			<div class="inner">
				<h3><?php echo $dalamselesai; ?></h3>
				<p><b>SPPD Dalam Selesai</b></p>
			</div>
			<div class="icon">
				<i class="fas fa-check"></i>
			</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-pink">
			<div class="inner">
				<h3><?php echo $luarpending; ?></h3>
				<p><b>SPPD Luar Pending</b></p>
			</div>
			<div class="icon">
				<i class="fas fa-shipping-fast"></i>
			</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
			<!-- small box -->
			<div class="small-box bg-indigo">
			<div class="inner">
				<h3><?php echo $luarselesai; ?></h3>
				<p><b>SPPD Luar Selesai</b></p>
			</div>
			<div class="icon">
				<i class="fas fa-check"></i>
			</div>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card card-danger card-outline">
			<div class="card-header">
				<h5 class="card-title">Monitoring Anggaran Perjalanan Dinas</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h4 class="text-center"><b>Realisasi Anggaran Kegiatan SPPD / Pagu Anggaran Kegiatan SPPD</b></h4>
						<center><span class="badge badge-primary"> Dalam Daerah</span> <span class="badge badge-danger"> Luar Daerah</span></center>
						<?php foreach($uraian as $row):;?>
						<!-- /start progress-group -->
						<div class="progress-group">
						<?= getdepan($row->pejabat_id);?> <?= getpegawai($row->pejabat_id);?>, <?= getbelakang($row->pejabat_id);?> 
						<span class="float-right"><b><?= rupiah(realisasi($row->kegiatan_id,$row->jenis_uraian ));?> / <?= rupiah($row->pagu_anggaran);?></b></span>
						<?php if($row->jenis_uraian == 1){
							$realisasi = realisasi($row->kegiatan_id, $row->jenis_uraian);
							$persentase = $realisasi / $row->pagu_anggaran * 100;
							echo '<div class="progress progress-sm">
							<div class="progress-bar bg-primary" style="width: '.$persentase.'%"></div>
						</div>';
						}else{
							$realisasi = realisasi($row->kegiatan_id,$row->jenis_uraian);
							$persentase = $realisasi / $row->pagu_anggaran * 100;
							echo '<div class="progress progress-sm">
							<div class="progress-bar bg-danger" style="width: '.$persentase.'%"></div>
						</div>';
						}?>						
						</div>
						<!-- /.END progress-group -->
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<!-- /.card body-->
			<div class="card-footer">
				<div class="row">
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
					<h3><?php echo rupiah($total_realisasi_dalam); ?></h3>
					<span class="description-text">TOTAL REALISASI DALAM DAERAH</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
					<h3><?php echo rupiah($total_pagu_dalam); ?></h3>
					<span class="description-text">TOTAL PAGU DALAM DAERAH</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block border-right">
					<h3><?php echo rupiah($total_realisasi_luar); ?></h3>
					<span class="description-text">TOTAL REALISASI LUAR DAERAH</span>
					</div>
					<!-- /.description-block -->
				</div>
				<!-- /.col -->
				<div class="col-sm-3 col-6">
					<div class="description-block">
					<h3><?php echo rupiah($total_pagu_luar); ?></h3>
					<span class="description-text">TOTAL PAGU LUAR DAERAH</span>
					</div>
					<!-- /.description-block -->
				</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.card-footer -->
            </div>
			<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>