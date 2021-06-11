<!DOCTYPE html> <html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Copyright" content="Pemerintah Kota Serang"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online Pemerintah KOTA SERANG" />
	<meta name="keywords" content="Pemerintah Kota Serang, pemkot serang, SPPD, kota serang, DISKOMINFO KOTA SERANG" />
	<title><?php echo $title; ?> || PEMKOT SERANG</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/uploads/logo_kominfo.png'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php 
		$data=$this->session->flashdata('sukses');
		if($data!=""){ ?>
		<div class="flash-data2" data-flashdata2="<?=$data;?>"></div>
		<?php } ?>
		<?php 
		$data2=$this->session->flashdata('error');
		if($data2!=""){ ?>
		<div class="flash-data" data-flashdata="<?=$data2;?>"></div>
		<?php } ?>
	<!-- header-->
	<?php include "partials/header.php"; ?>
	<!-- Sidebar-->
	<?php include "partials/sidebar.php"; ?>
	<!-- Breadcrumb-->
	<?php include "partials/breadcrumb.php"; ?>
	<!-- Content -->
	<?php include $content; ?>
	<!-- footer -->
	<?php include "partials/footer.php"; ?>
	</div>
<!-- REQUIRED SCRIPTS -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script>
	const flashData = $('.flash-data').data('flashdata');
	if (flashData){
		Swal.fire({
			title: 'Berhasil',
			text: flashData,
			type: 'success'
		})
	}
	const flashData2 = $('.flash-data2').data('flashdata2');
	if (flashData2){
		Swal.fire({
			title: 'Gagal',
			text: flashData2,
			type: 'error'
		})
	}
</script>
</body>
</html>