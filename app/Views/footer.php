<footer class="footer" >
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-12">
				2021 &copy; All Reserved | IrCn Projects
				<hr width="100%" style="border-bottom:1px solid white;">
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-12">
				<span class="footer-menu">
					<a href="<?php echo base_url('hubungi-kami')?>">Hubungi Kami</a>
				</span>
				<?php 
				if(empty(sizeof($SESSION_LOGIN))){
				?>
				<span class="footer-menu">
					<a href="<?php echo base_url('pendaftaran')?>">Pendaftaran</a>
				</span>
				<span class="footer-menu">
					<a href="<?php echo base_url('masuk')?>">Masuk</a>
				</span>
				<?php } else { ?>
					<span class="footer-menu">
						<a href="<?php echo base_url('akun')?>">Akun</a>
					</span>
					<span class="footer-menu">
						<a href="<?php echo base_url('keluar')?>">Keluar</a>
					</span>
				<?php } ?>
			</div>
		</div>
	</div>
</footer>