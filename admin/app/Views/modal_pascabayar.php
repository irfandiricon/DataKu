<?php 
$ID = isset($Data['ID']) ? $Data['ID']:"";
$TYPE = isset($Data['TYPE']) ? $Data['TYPE']:"";
$CODE = isset($Data['CODE']) ? $Data['CODE']:"";
$DESCRIPTION = isset($Data['DESCRIPTION']) ? $Data['DESCRIPTION']:"";

$TIPE = array("PDAM","TELEPON","MULTIFINANCE","E-SAMSAT","TV","PBB","INTERNET","GAS");
?>
<input type="hidden" name="id" value="<?php echo $ID ?>" readonly>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Tipe</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<select class="form-control form-input" name="type">
			<option value="TYPE">-- PILIH TIPE --</option>
			<?php 
			foreach($TIPE as $Row){
				if($Row == $TYPE){
					$Selected = "selected";
				}else{
					$Selected = "";
				}
			?>
				<option value="<?php echo $Row ?>" <?php echo $Selected ?>><?php echo $Row ?></option>
			<?php
			}
			?>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Kode</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="code" class="form-control form-input" placeholder="Masukan Kode" value="<?php echo $CODE ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Deskripsi</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="description" class="form-control form-input" placeholder="Masukan Deskripsi" value="<?php echo $DESCRIPTION ?>">
	</div>
</div>