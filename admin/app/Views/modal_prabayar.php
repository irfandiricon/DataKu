<?php 
$ID = isset($Data['ID']) ? $Data['ID']:"";
$ID_PROVIDER = isset($Data['ID_PROVIDER']) ? $Data['ID_PROVIDER']:"";
$TYPE = isset($Data['TYPE']) ? $Data['TYPE']:"";
$CODE = isset($Data['CODE']) ? $Data['CODE']:"";
$NAME = isset($Data['NAME']) ? $Data['NAME']:"";
$DESCRIPTION = isset($Data['DESCRIPTION']) ? $Data['DESCRIPTION']:"";
$HARGA_MODAL = isset($Data['HARGA_MODAL']) ? $Data['HARGA_MODAL']:0;
$HARGA_JUAL = isset($Data['HARGA_JUAL']) ? $Data['HARGA_JUAL']:0;
$MASA_AKTIF = isset($Data['MASA_AKTIF']) ? $Data['MASA_AKTIF']:"";

$PROVIDER = isset($provider) ? $provider :array();

$TIPE = array("PULSA", "PAKET NELPON", "PAKET SMS", "DATA", "PLN");
?>
<input type="hidden" name="id" value="<?php echo $ID ?>" readonly>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Tipe</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<select name="type" class="form-control form-input">
			<?php 
			foreach($TIPE as $row){
				$TYPE_NAME = isset($row) ? $row:"";
				if($TYPE == $TYPE_NAME){
					$selected = "selected";
				}else{
					$selected = "";
				}
			?>
				<option value="<?php echo $TYPE_NAME ?>" <?php echo $selected ?>><?php echo $TYPE_NAME ?></option>
			<?php	
			}
			?>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Provider</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<select name="provider" class="form-control form-input">
			<?php 
			foreach($PROVIDER as $row){
				$ID = isset($row['ID']) ? $row['ID']:"";
				$NAME_PROVIDER = isset($row['NAME']) ? $row['NAME']:"";
				if($ID == $ID_PROVIDER){
					$selected = "selected";
				}else{
					$selected = "";
				}
			?>
				<option value="<?php echo $ID ?>" <?php echo $selected ?>><?php echo $NAME_PROVIDER ?></option>
			<?php	
			}
			?>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Kode Produk</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="code" class="form-control form-input" placeholder="Masukan Kode Produk" value="<?php echo $CODE ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Nama Produk</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="name" class="form-control form-input" placeholder="Masukan Nama Produk" value="<?php echo $NAME ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Harga Modal</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="harga_modal" class="form-control form-input" placeholder="Masukan Harga Modal" value="<?php echo $HARGA_MODAL ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Harga Jual</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="harga_jual" class="form-control form-input" placeholder="Masukan Harga Jual" value="<?php echo $HARGA_JUAL ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Deskripsi</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<textarea name="description" class="form-input" placeholder="Masukan Deskripsi Produk" id="description"><?php echo $DESCRIPTION ?></textarea>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Masa Aktif</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="masa_aktif" class="form-control form-input" placeholder="Masukan Masa Aktif" value="<?php echo $MASA_AKTIF ?>">
	</div>
</div>


<style type="text/css">
	#description{
		width: 100%;
		padding: .375rem .75rem;
	}
</style>