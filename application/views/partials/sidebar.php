<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<!-- Brand Logo -->

	<a href="index3.html" class="brand-link">

	<img src="<?php echo base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

		style="opacity: .8">

	<span class="brand-text font-weight-light"> <b>AREP LUNGE</b></span>

	</a>



	<!-- Sidebar -->

	<div class="sidebar">

	<!-- Sidebar user panel (optional) -->

	<div class="user-panel mt-3 pb-3 mb-3 d-flex">

		<div class="image">

        <img src="<?php echo base_url('assets/uploads/logo_kominfo.png'); ?>" 

        class="img-circle elevation-2" alt="User Image">

		</div>

		<div class="info">

		<a href="#" class="d-block"><?php echo $this->session->userdata('user'); ?></a>

		</div>

		<br>

	</div>

	

	<!-- Sidebar Menu -->

	<nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" 

		role="menu" data-accordion="false">

		<?php if ($this->session->userdata('level')!=1){

        	echo '';

    		}else{

            echo '<li class="nav-item">

				<a href="'.site_url('dashboard').'" 

				class="'.menuaktif('dashboard',$aktif).'">

				<i class="fas fa-tachometer-alt nav-icon"></i>

				<p>Dashboard</p>

				</a>

			</li>';

			}?>

			<li class="nav-item">

				<a href="<?php echo site_url('calendar'); ?>" 

				class="<?php echo menuaktif('kalender',$aktif); ?>">

				<i class="far fa-calendar-alt nav-icon"></i>

				<p>Kalender SPPD</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="<?php echo site_url('jarak'); ?>" 

				class="<?php echo menuaktif('jarak',$aktif); ?>">

				<i class="fas fa-map-marked-alt nav-icon"></i>

				<p>Jarak Kota Tujuan</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="<?php echo site_url('regulasi'); ?>" 

				class="<?php echo menuaktif('regulasi',$aktif); ?>">

				<i class="fas fa-book nav-icon"></i>

				<p>SSH SPPD</p>

				</a>

			</li>

			

		<?php if ($this->session->userdata('level')!=1){

        	echo '';

    		}else{
			$id_skpd = $this->session->userdata('skpd');
			$dalem=	$this->db->query("SELECT * FROM `sppd` WHERE skpd_id = '$id_skpd' AND jenis_sppd = '1' AND status <= '5' ORDER BY tanggal_pergi DESC")->num_rows();
			$luar=	$this->db->query("SELECT * FROM `sppd` WHERE skpd_id = '$id_skpd' AND jenis_sppd = '2' AND status <= '5' ORDER BY tanggal_pergi DESC")->num_rows();
			echo '

			<li class="nav-header">Validasi SPPD</li>

			<li class="nav-item">

				<a href="'.site_url('validasi_dalam').'" 

				class="'.menuaktif('validasidalam',$aktif).'">

				<i class="fas fa-clipboard-check nav-icon"></i>

				<p>SPPD Dalam Daerah <span class="badge bg-maroon right"> '.$dalem.' </span></p>

				</a>

			</li>

			<li class="nav-item">

				<a href="'.site_url('validasi_luar').'" 

				class="'.menuaktif('validasiluar',$aktif).'">

				<i class="fas fa-clipboard-check nav-icon"></i>

				<p>SPPD Luar Daerah <span class="badge bg-maroon right">'.$luar.'</span></p>

				</a>

			</li>

			<li class="nav-header">DATA MASTER</li>

			<li class="nav-item">

				<a href="'.site_url('pegawai').'" 

				class="'.menuaktif('pegawai',$aktif).'">

				<i class="fas fa-users nav-icon"></i>

				<p>Pegawai</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="'.site_url('progkeg').'" 

				class="'.menuaktif('progkeg',$aktif).'">

				<i class="fas fa-folder-open nav-icon"></i>

				<p>DPA SPPD</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="'.site_url('users').'" 

				class="'.menuaktif('user',$aktif).'">

				<i class="fas fa-user-cog nav-icon"></i>

				<p>User Pengguna</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="'.site_url('setting').'" 

				class="'.menuaktif('setting',$aktif).'">

				<i class="fas fa-cogs nav-icon"></i>

				<p>Setting Aplikasi</p>

				</a>

			</li>';

			}?>



			<?php if ($this->session->userdata('level')!=2){

				echo '';

				}else{
				$username = $this->session->userdata('user');
				$dalem1=$this->db->query("SELECT * FROM `sppd` WHERE username = '$username' AND jenis_sppd = '1' AND status <= '5' ORDER BY tanggal_pergi DESC")->num_rows();
				$luar1=$this->db->query("SELECT * FROM `sppd` WHERE username = '$username' AND jenis_sppd = '2' AND status <= '5' ORDER BY tanggal_pergi DESC")->num_rows();

				echo '

				<li class="nav-header">KEGIATAN SPDD</li>

				<li class="nav-item">

					<a href="'.site_url('sppd_dalam').'" 

					class="'.menuaktif('sppddalam',$aktif).'">

					<i class="fas fa-copy nav-icon"></i>

					<p>SPPD Dalam Daerah <span class="badge bg-maroon right">'.$dalem1.'</span></p>

					</a>

				</li>

				<li class="nav-item">

					<a href="'.site_url('sppd_luar').'" 

					class="'.menuaktif('sppdluar',$aktif).'">

					<i class="fas fa-copy nav-icon"></i>

					<p>SPPD Luar Daerah <span class="badge bg-maroon right">'.$luar1.'</span></p>

					</a>

				</li>';

			}?>

			<li class="nav-header">REKAPITULASI SPPD</li>

			<li class="nav-item">

				<a href="<?php echo site_url('rekap'); ?>" 

				class="<?php echo menuaktif('rekap',$aktif); ?>">

				<i class="fas fa-file-import nav-icon"></i>

				<p>SPPD Dalam Daerah</p>

				</a>

			</li>

			<li class="nav-item">

				<a href="<?php echo site_url('rekap_luar'); ?>" 

				class="<?php echo menuaktif('rekapluar',$aktif); ?>">

				<i class="fas fa-file-export nav-icon"></i>

				<p>SPPD Luar Daerah</p>

				</a>

			</li>

		</ul>

	</nav>

	<!-- /.sidebar-menu -->

	</div>

	<!-- /.sidebar -->

</aside>