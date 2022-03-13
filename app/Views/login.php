<form id="formDataLogin" name="formDataLogin" action="javascript:void(0)" data-url="<?php echo base_url('login/plogin')?>">
	<div class="row" style="padding-top: 40px; padding-bottom: 40px;">
		<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<h3><strong>Masuk</strong></h3>
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">Email</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<input type="email" name="email" class="form-control">
						</div>
					</div>
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
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"></div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<a href="<?php echo base_url('lupa-password') ?>">Lupa password ?</a>
						</div>
					</div>
					<div class="row padtop-20">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"></div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<button class="btn btn-primary" type="submit">Masuk</button>&nbsp;
							<button class="btn btn-cancel btn-danger" type="reset">Reset</button>
						</div>
					</div>
					<div class="row" style="padding-top: 30px;">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"></div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<div class="box" onclick="google('<?php echo base_url() ?>/login/gmail')">
								<img src="<?php echo base_url('assets/image/google.png')?>" style="width:17px; height: auto;">
								&nbsp;Masuk dengan Google
							</div>

							<div class="g-signin2" data-onsuccess="onSignIn"></div>
						</div>
						<!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 padtop-10">
							<div class="box" onclick="facebook('<?php echo base_url() ?>/login/facebook')">
								<img src="<?php echo base_url('assets/image/fb.png')?>" style="width:17px; height: auto;">
								&nbsp;Masuk dengan Facebook
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<style type="text/css">
	.box{
		border: 1px solid #ddd;
		border-radius: 15px;
		padding: 15px;
		text-align: center;
		cursor: pointer;
	}
</style>

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