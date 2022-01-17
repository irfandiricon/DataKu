<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Password</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<div class="input-group mb-3">
			<input type="password" class="form-control" id="password" name="password" style="border-right: none;">
			<div class="input-group-append">
				<span class="input-group-text" id="show-pw" style="background-color: white;cursor: pointer;">
					<i class="fa fa-eye" id="icon-password"></i>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">PIN Transaksi</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input type="number" class="form-control" id="pin" name="pin" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
</div>

<div class="row padtop-10">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<p style="color: red; font-weight: bold;">Penting :</p>
		<ol type="1" style="margin-bottom: 0px !important;">
			<li>Anda tidak dapat melakukan transaksi apabila akun anda telah dinonaktifkan.</li>
			<li>Anda tidak dapat melakukan pendaftaran pengguna baru dengan menggunakan nomor handphone atau email yang telah dinonaktifkan.</li>
			<li>Silahkan hubungi customer kami apabila ada pertanyaan lebih lanjut mengenai menonatifkan akun pada halaman <a href="<?php echo base_url('hubungi-kami')?>">Hubungi Kami</a>.</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<input type="checkbox" name="confirm" id="confirm" style="padding-right: 5px">
		<span style="display: ruby-text; margin-left: 10px">Saya telah menyetujui Syarat dan Ketentuan yang berlaku.</span>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('#show-pw').click(function(){
	        var getshow = $(this).find('i.fa-eye');
	        var gethide = $(this).find('i.fa-eye-slash');
	        if(getshow.length > 0){
	            $('#password').attr({'type':'text'});
	            $('#icon-password').removeClass().addClass('fa fa-eye-slash');
	        }

	        if(gethide.length > 0){
	            $('#password').attr({'type':'password'});
	            $('#icon-password').removeClass().addClass('fa fa-eye');
	        }
	    });
	});
</script>