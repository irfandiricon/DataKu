<?php 
$NAME = isset($SESSION_LOGIN['NAME']) ? $SESSION_LOGIN['NAME']:"";
$EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";
$NO_HP = isset($SESSION_LOGIN['NO_HP']) ? $SESSION_LOGIN['NO_HP']:"";

function input_readonly($param)
{
    if(!empty($param)){
        $Msg = "readonly";
    }else{
       $Msg = ""; 
    }
    return $Msg;
}
?>
<form id="formData" name="formData" action="javascript:void(0)" data-url="<?php echo base_url('contactus/send')?>">
	<div class="row" style="padding-top: 40px; padding-bottom: 40px;">
		<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12"></div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<h3><strong>Hubungi Kami</strong></h3>
						</div>
					</div>
					<div class="row padtop-20">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">Nama Lengkap</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<input name="name" class="form-control" value="<?php echo $NAME ?>" <?php echo input_readonly($NAME) ?>>
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">No HP</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<input name="no_hp" class="form-control" value="<?php echo $NO_HP ?>" <?php echo input_readonly($NO_HP) ?>>
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">Email</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<input type="email" name="email" class="form-control" value="<?php echo $EMAIL ?>" <?php echo input_readonly($EMAIL) ?>>
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">Judul</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<input name="title" class="form-control" maxlength="100">
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
							<span class="f-size-20">Pesan</span>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<textarea name="message" class="form-control" rows="4"></textarea>
						</div>
					</div>
					<div class="row padtop-10">
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"></div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
							<button type="button" class="btn btn-primary" onclick="submitform()">Kirim Pesan</button>
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>