<?php
$UPDATEPASSWORD = isset($UPDATEPASSWORD) ? $UPDATEPASSWORD:"NO";
$USERNAME = isset($Data['USERNAME']) ? $Data['USERNAME']:"";
$NAME = isset($Data['NAME']) ? $Data['NAME']:"";
$NOHP = isset($Data['NOHP']) ? $Data['NOHP']:"";
$EMAIL = isset($Data['EMAIL']) ? $Data['EMAIL']:"";
$STATUS_USER = isset($Data['STATUS']) ? $Data['STATUS']:"";
$readonly = "";
if(!empty($USERNAME)){
	$readonly = "readonly";
}
?>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Username</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="username" id="username" class="form-control form-input" placeholder="Masukan Username" value="<?php echo $USERNAME ?>" <?php echo $readonly; ?>>
	</div>
</div>
<!-- START NEW -->
<?php 
if(empty($USERNAME)){
?>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Password</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="password" name="password" id="password" class="form-control form-input" placeholder="Masukan Password">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Re-password</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="password" name="repassword" id="repassword" class="form-control form-input" placeholder="Masukan Ulang Password">
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input"></div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="checkbox" name="chk_pass" id="chk_pass" onclick="checkpass()">
			<label id="show_hide_pass" style="font-size: 13px;">Show Password</label>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Nama Lengkap</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="text" name="name" id="name" class="form-control form-input" placeholder="Masukan Nama Lengkap" value="<?php echo $NAME ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>No Handphone</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="text" name="nohp" id="nohp" class="form-control form-input" placeholder="Masukan No Handphone" value="<?php echo $NOHP ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Email</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="email" name="email" id="email" class="form-control form-input" placeholder="Masukan Email" value="<?php echo $EMAIL ?>">
		</div>
	</div>
<?php	
}
?>
<!-- END NEW -->

<!-- START UPDATE -->
<?php 
if(!empty($USERNAME) && $UPDATEPASSWORD == "YES"){
?>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Password</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="password" name="password" id="password" class="form-control form-input" placeholder="Masukan Password">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Re-password</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="password" name="repassword" id="repassword" class="form-control form-input" placeholder="Masukan Ulang Password">
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input"></div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="checkbox" name="chk_pass" id="chk_pass" onclick="checkpass()">
			<label id="show_hide_pass" style="font-size: 13px;">Show Password</label>
		</div>
	</div>
<?php } ?>

<?php 
if(!empty($USERNAME) && $UPDATEPASSWORD == "NO"){
	$STATUS = array("AKTIF", "NON AKTIF", "BLOKIR");
	$VALUE = array("1", "0", "3");
?>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Nama Lengkap</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="text" name="name" id="name" class="form-control form-input" placeholder="Masukan Nama Lengkap" value="<?php echo $NAME ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>No Handphone</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="text" name="nohp" id="nohp" class="form-control form-input" placeholder="Masukan No Handphone" value="<?php echo $NOHP ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Email</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<input type="email" name="email" id="email" class="form-control form-input" placeholder="Masukan Email" value="<?php echo $EMAIL ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
			<h6>Status</h6>
		</div>
		<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
			<select name="status" class="form-control form-input">
				<?php
				for($i=0; $i<sizeof($STATUS); $i++){
					if($VALUE[$i] == $STATUS_USER){
						$selected = "selected";
					}else{
						$selected = "";
					}
				?>
					<option value="<?php echo $VALUE[$i]; ?>" <?php echo $selected; ?>>
						<?php echo $STATUS[$i]; ?>
					</option>
				<?php		
				}
				?>
			</select>
		</div>
	</div>
<?php } ?>
<!-- END UPDATE -->