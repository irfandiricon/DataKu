<nav class="navbar navbar-expand-lg navbar-dark bg-blue">
	<a class="navbar-brand" href="<?php echo base_url()?>">
		<div style="border-radius: 75px; background-color: white;">
			<img src="<?php echo base_url('assets')?>/image/logo.png" style="width: 60px; height: 60px;">
		</div>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav ml-md-auto ">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>">Beranda</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('hubungi-kami')?>">Hubungi Kami</a>
			</li>
			<?php 
			if(empty(sizeof($SESSION_LOGIN))){
			?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('pendaftaran')?>">Pendaftaran</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('masuk')?>">Masuk</a>
				</li>
			<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('riwayat-transaksi')?>">Riwayat Transaksi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('akun')?>">Akun</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('keluar')?>">Keluar</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>