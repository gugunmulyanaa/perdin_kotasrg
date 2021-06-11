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
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fullcalendar/core/main.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fullcalendar/daygrid/main.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
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
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/fullcalendar/core/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/fullcalendar/interaction/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/fullcalendar/daygrid/main.js'); ?>"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      eventLimit: true, // allow "more" link when too many events
      events: "<?php echo base_url(); ?>Calendar/load_data",
    });

    calendar.render();
  });

</script>
</body>
</html>