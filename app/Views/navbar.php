<?php 
use App\Models\Auth_model;
use Config\Custom;

$CustomConfig = new \Config\Custom();
$Apps = $CustomConfig->apps;
$AuthModel = new Auth_model();

$EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";
$CheckUser = $AuthModel->CheckRow("V_CUSTOMER", "EMAIL", $EMAIL);

$SALDO = isset($CheckUser->SALDO) ? $CheckUser->SALDO:0; 
?>
<?php 
if(!empty($CheckUser)){
?>
	<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 t-center" style="border-right: 1px solid #ddd; display: table-cell; vertical-align: middle;">
		<p style="font-weight: bold; margin-top: 5px;" class="marbot-0">
			<i class="fa fa-coins" style="color: #d16417;"></i>&nbsp; Rp. <?php echo str_replace(",",".",number_format($SALDO)); ?>
		</p>
		<p class="f-size-12" style="margin-bottom: 5px;">
			<i class="fa fa-plus-circle"></i>&nbsp; Tambah Saldo
		</p>
	</div>
	<div class="col-xl-10 col-lg-10 col-md-6 col-sm-6 col-6" style="color: red; font-weight: bold; display: table-cell; vertical-align: middle;">
		<marquee>
		<span>Website ini masih dalam tahap pengembangan. Hadir dalam : </span><span class="countdown" id="countdown"></span>
		</marquee>
	</div>
<?php 
} else {
?>
	<div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-6 padtop-10" style="color: red; font-weight: bold; display: table-cell; vertical-align: middle;">
		<marquee>
		<span>Website ini masih dalam tahap pengembangan. Hadir dalam : </span><span class="countdown" id="countdown"></span>
		</marquee>
	</div>
<?php	
}
?>