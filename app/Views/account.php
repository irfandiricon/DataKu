<?php 
$NAME = isset($Profile->NAME) ? $Profile->NAME:"";
$EMAIL = isset($Profile->EMAIL) ? $Profile->EMAIL:"";
$NO_HP = isset($Profile->NO_HP) ? $Profile->NO_HP:"";
$REFERRAL_ID = isset($Profile->REFERRAL_ID) ? $Profile->REFERRAL_ID:"";
$IS_AGEN = isset($Profile->IS_AGEN) ? $Profile->IS_AGEN:"";
$PIN = isset($Profile->PIN) ? $Profile->PIN:"";
$FILE_PROFILE = isset($Profile->FILE_PROFILE) ? $Profile->FILE_PROFILE:"";

$PIN_DESCRIPTION = $PIN == "" ? "Buat PIN" : "Ubah PIN";

$paramprofile = base64_encode(json_encode($Profile));
?>
<div class="row" style="padding-top: 40px; padding-bottom: 40px;">
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="card-body t-center">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<img src="<?php echo base_url().'/'.$FILE_PROFILE; ?>" class="img img-fluid img-rounded" style="height: 130px; width: auto;">
						<div class="box-picture" onclick="modal('modal-lg', 'Photo Profil', 'modal/modal_form_photo_profile', '<?php echo $paramprofile ?>', 'account/update_photo_profile', '<?php echo base_url() ?>')">
							<i class="fa fa-camera" style="font-size: 24px; padding-top: 4px; color: darkred;"></i>
						</div>
					</div>
				</div>
				<div class="row padtop-20">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<button class="btn btn-primary btn-block" onclick="modal('modal-lg', 'Ubah Profil', 'modal/modal_form_profile', '<?php echo $paramprofile ?>', 'account/update_profile', '<?php echo base_url() ?>')">
							Ubah Profile
						</button>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<button class="btn btn-warning btn-block" onclick="modal('modal-lg', 'Ubah Password', 'modal/modal_form_password', '<?php echo $paramprofile ?>', 'account/update_password', '<?php echo base_url() ?>')">
							Ubah Password
						</button>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<button class="btn btn-info btn-block" onclick="modal('modal-lg', '<?php echo $PIN_DESCRIPTION ?>', 'modal/modal_form_pin', '<?php echo $paramprofile ?>', 'account/update_pin', '<?php echo base_url() ?>')">
							<?php echo $PIN_DESCRIPTION ?>
						</button>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<button class="btn btn-danger btn-block" onclick="modal('modal-lg', 'Nonaktifkan Akun', 'modal/modal_form_inactive', '<?php echo $paramprofile ?>', 'account/inactive', '<?php echo base_url() ?>')">
							Nonaktifkan Akun
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="card-body">
				<div class="row padtop-10">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<span class="f-size-20">Nama Lengkap</span>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						<span class="f-size-20"><?php echo $NAME; ?></span>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<span class="f-size-20">Email</span>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						<span class="f-size-20"><?php echo $EMAIL; ?></span>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<span class="f-size-20">No HP</span>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						<span class="f-size-20"><?php echo $NO_HP; ?></span>
					</div>
				</div>
				<div class="row padtop-10">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<span class="f-size-20">Kode Referral</span>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						<span class="f-size-20"><?php echo $REFERRAL_ID; ?></span>
					</div>
				</div>
				<?php
				if($IS_AGEN == "NO"){
				?>
				<div class="row padtop-10">
					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						<span class="f-size-20">Agen DataKu</span>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						<button class="btn btn-success padtop-0 padbottom-0" style="height: auto !important;">Daftar Agen</button>
						<p class="padtop-10">
							<a href="javascript:void(0)" onclick="modal('modal-lg', 'Syarat dan Ketentuan Agen DataKu', 'modal/modal_sk_agen', '<?php echo $paramprofile ?>', '', '<?php echo base_url() ?>')">Baca Syarat & Ketentuan</a>
						</p>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.box-picture{
		border-radius: 10px;
		width: 25px;
		text-align: center;
		height: 25px;
		display: table;
		position: absolute;
		/*left: 60%;*/
		right: 15px;
		bottom: 0;
		padding: 10px;
		background-color: #ddd;
		cursor: pointer;
	}
</style>