<!DOCTYPE html> <html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Copyright" content="Pemerintah Kota Serang"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online Pemerintah Kota Serang" />
	<meta name="keywords" content="Pemerintah Kota Serang, pemkot serang, SPPD, kota serang, DISKOMINFO KOTA SERANG" />
	<title><?php echo $title; ?> ||PEMKOT SERANG</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/uploads/logo_kominfo.png'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/gijgo/css/gijgo.min.css'); ?>"/>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
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
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/gijgo/js/gijgo.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/password.min.js'); ?>"></script>
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
	$('.tombolhapus').click(function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Yakin Data Akan Dihapus?',
			text: "Data akan terhapus secara permanen!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus aja!'
				}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
		})
	});
	$('.tombolvalid').click(function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Yakin Akan Divalidasi?',
			text: "Apakah bendahara sudah mencatat dibuku bendahara?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Validasi aja!'
				}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
		})
	});
	$(document).ready(function(){
		// Format mata uang.
		$( '.uang' ).mask('0.000.000.000', {reverse: true});
	})
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	$(function () {
		$('.select2').select2();
		$('.textarea').summernote({
			height: '300',
			toolbar: [
				[ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
				[ 'fontname', [ 'Times New Roman' ] ],
				[ 'fontsize', [ 'fontsize' ] ],
				[ 'color', [ 'color' ] ],
				[ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
				[ 'table', [ 'table' ] ]
			]
		});
		$("#example").DataTable({
		});
		$("#example2").DataTable({
			"autoWidth": true,
		});
		$( "#datepicker" ).datepicker({
			header: true, modal: true, footer: false, format: 'yyyy-mm-dd' 
		});
		$( "#datepicker2" ).datepicker({
			header: true, modal: true, footer: false, format: 'yyyy-mm-dd' 
		});
		$('.tanggal').each(function(){
			$(this).datepicker({
				format: 'yyyy-mm-dd'
			})
		});
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	});
</script>
</body>
</html>