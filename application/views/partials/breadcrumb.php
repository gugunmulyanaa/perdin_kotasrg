<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		<div class="col-sm-6" style="margin-bottom:10px">
			<h1 class="m-0 text-dark"><?php echo $title; ?></h1>
		</div><!-- /.col -->
		<div class="col-sm-6">
            <?php echo $this->breadcrumb->output(); ?>
		</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
	</section>
	<!-- /.content-header -->
<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="flash-data" data-flashdata="<?=$data;?>"></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="flash-data2" data-flashdata2="<?=$data2;?>"></div>
<?php } ?>