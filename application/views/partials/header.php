<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	<li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
	</li>
	<li class="nav-item d-none d-sm-inline-block">
		<a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
		<span class="badge bg-info">Selamat Datang, <?php echo getnama(($this->session->userdata('user'))); ?></span>
		<span class="badge bg-danger">SKPD : <?php echo getnamaskpd(($this->session->userdata('user'))); ?></span></a>
	</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	<li class="nav-item">
		<a class="nav-link btn bg-red" href="<?php echo site_url('Logout'); ?>">
		Keluar <i class="fas fa-sign-out-alt"></i></a>
	</li>
	</ul>
</nav>
<!-- /.navbar -->