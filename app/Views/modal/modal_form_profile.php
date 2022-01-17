<?php 
$NAME = isset($rows['NAME']) ? $rows['NAME']:"";
$NO_HP = isset($rows['NO_HP']) ? $rows['NO_HP']:"";
$EMAIL = isset($rows['EMAIL']) ? $rows['EMAIL']:"";
?>
<div class="row padtop-20">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Nama Lengkap</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input name="name" class="form-control" value="<?php echo $NAME ?>">
	</div>
</div>
<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">No Handphone</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input name="no_hp" class="form-control" value="<?php echo $NO_HP ?>">
	</div>
</div>
<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<span class="f-size-20">Alamat Email</span>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<input type="email" name="email" class="form-control" value="<?php echo $EMAIL ?>">
	</div>
</div>