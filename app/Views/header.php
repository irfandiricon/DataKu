<nav class="navbar navbar-expand-lg navbar-dark bg-blue padtop-0 padbottom-0 fixed-top">
	<a class="navbar-brand" href="<?php echo base_url()?>">
		<div style="border-radius: 75px; ">
			<!-- <img src="<?php echo base_url('assets')?>/image/logo.png" style="width: 50px; height: 50px;"> -->
			<h3 style="margin-top: 10px; margin-bottom: 10px;">DataKu</h3>
		</div>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav ml-md-auto ">
			<li class="nav-item nav-desktop">
				<a class="nav-link open-preloader" href="<?php echo base_url()?>">
					<i class="fa fa-home"></i> Beranda
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link open-preloader" href="<?php echo base_url('hubungi-kami')?>">
					<i class="fa fa-phone-square"></i> Hubungi Kami
				</a>
			</li>
			<?php 
			if(empty(sizeof($SESSION_LOGIN))){
			?>
				<li class="nav-item">
					<a class="nav-link open-preloader" href="<?php echo base_url('pendaftaran')?>">
						<i class="fa fa-user"></i> Pendaftaran
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link open-preloader" href="<?php echo base_url('masuk')?>">
						<i class="fa fa-sign-in-alt"></i> Masuk
					</a>
				</li>
			<?php } else { ?>
				<li class="nav-item nav-desktop">
					<a class="nav-link open-preloader" href="<?php echo base_url('riwayat-transaksi')?>">
						<i class="fa fa-history"></i> Riwayat Transaksi
					</a>
				</li>
				<li class="nav-item nav-desktop">
					<a class="nav-link open-preloader" href="<?php echo base_url('riwayat-transaksi')?>">
						<i class="fa fa-bell"></i> Notifikasi
						<span class="badge badge-pill badge-danger" style="font-weight: normal; margin-left: 3px;">0</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-cog"></i> Pengaturan
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item open-preloader nav-desktop" href="<?php echo base_url('akun')?>">
							<i class="fa fa-user"></i> Akun
						</a>
						<a class="dropdown-item open-preloader" href="<?php echo base_url('keluar')?>">
							<i class="fa fa-sign-out-alt"></i> Keluar
						</a>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>