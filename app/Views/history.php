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
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h3><strong>Riwayat Transaksi</strong></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
				<input type="name" name="start" class="form-control">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
				<input type="name" name="end" class="form-control">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
				<button class="btn btn-primary btn-block">
					<i class="fa fa-search" style="padding-right: 3px;"></i> Cari Data
				</button>
			</div>
		</div>
	</div>
</div>