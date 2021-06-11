<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Copyright" content="Pemerintah Kota Serang"/>
	<meta name="author" content="Riyan Nursyalim"/>
	<meta name="description" content="Aplikasi SPPD Online Pemerintah Kota Serang" />
	<meta name="keywords" content="Pemerintah Kota Serang, pemkot serang, SPPD, kota serang, DISKOMINFO KOTA SERANG"/>
    <title>Aplikasi SPPD Online Pemerintah Kota Serang</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/uploads/logo_kominfo.png'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
</head>

<body class="hold-transition login-page" style="background-image: url('<?= base_url();?>assets/uploads/bg2.jpeg');background-size:100% 100%;-webkit-background-size:100% 100%;-moz-background-size:100% 100%;-o-background-size:100% 100%;-ms-background-size:100% 100%;">
<div class="login-box">
</br></br><br><br><br><br><br><br>
    <div class="card">
        <div class="card-body">
        <p class="text-center">Silahkan Login</p>
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
        <form action="<?php echo site_url('Login/signin'); ?>" method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Input Username" autofocus autocomplete="on">
            <div class="input-group-append">
                <div class="input-group-text">
                <i class="fas fa-user"></i>
                </div>
            </div>
            </div>
            <div class="input-group mb-3" id="show_hide_password">
            <input type="password" class="form-control" name="password" placeholder="Input Password" autocomplete="on">
            <div class="input-group-append">
                <div class="input-group-text">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk Aplikasi</button>
        </form>
        </div>
    </div>
    </div>

    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/password.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData){
            Swal.fire({
                title: 'Gagal Log In',
                text: flashData,
                type: 'error'
            })
        }
        const flashData2 = $('.flash-data2').data('flashdata2');
        if (flashData2){
            Swal.fire({
                title: 'Sukses Log Out',
                text: flashData2,
                type: 'success'
            })
        }
    </script>
</body>
</html>
