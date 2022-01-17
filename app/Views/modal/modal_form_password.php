<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Password Lama</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<div class="input-group mb-3">
			<input type="password" class="form-control" id="old-password" name="old_password" style="border-right: none;">
			<div class="input-group-append">
				<span class="input-group-text" id="show-pw-old" style="background-color: white;cursor: pointer;">
					<i class="fa fa-eye" id="icon-old-password"></i>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Password Baru</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<div class="input-group mb-3">
			<input type="password" class="form-control" id="new-password" name="new_password" style="border-right: none;">
			<div class="input-group-append">
				<span class="input-group-text" id="show-pw-new" style="background-color: white;cursor: pointer;">
					<i class="fa fa-eye" id="icon-new-password"></i>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Konfirmasi Password</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<div class="input-group mb-3">
			<input type="password" class="form-control" id="cpassword" name="cpassword" style="border-right: none;">
			<div class="input-group-append">
				<span class="input-group-text" id="show-cpw" style="background-color: white;cursor: pointer;">
					<i class="fa fa-eye" id="icon-cpassword"></i>
				</span>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
	    $('#show-pw-old').click(function(){
	        var getshow = $(this).find('i.fa-eye');
	        var gethide = $(this).find('i.fa-eye-slash');
	        if(getshow.length > 0){
	            $('#old-password').attr({'type':'text'});
	            $('#icon-old-password').removeClass().addClass('fa fa-eye-slash');
	        }

	        if(gethide.length > 0){
	            $('#old-password').attr({'type':'password'});
	            $('#icon-old-password').removeClass().addClass('fa fa-eye');
	        }
	    });

	    $('#show-pw-new').click(function(){
	        var getshow = $(this).find('i.fa-eye');
	        var gethide = $(this).find('i.fa-eye-slash');
	        if(getshow.length > 0){
	            $('#new-password').attr({'type':'text'});
	            $('#icon-new-password').removeClass().addClass('fa fa-eye-slash');
	        }

	        if(gethide.length > 0){
	            $('#old-password').attr({'type':'password'});
	            $('#icon-new-password').removeClass().addClass('fa fa-eye');
	        }
	    });

	    $('#show-cpw').click(function(){
	        var getshow = $(this).find('i.fa-eye');
	        var gethide = $(this).find('i.fa-eye-slash');
	        if(getshow.length > 0){
	            $('#cpassword').attr({'type':'text'});
	            $('#icon-cpassword').removeClass().addClass('fa fa-eye-slash');
	        }

	        if(gethide.length > 0){
	            $('#cpassword').attr({'type':'password'});
	            $('#icon-cpassword').removeClass().addClass('fa fa-eye');
	        }
	    });
	});
</script>