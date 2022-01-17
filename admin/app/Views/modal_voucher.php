<?php 
$ID = isset($Data['ID']) ? $Data['ID']:"";
$TYPE = isset($Data['TYPE']) ? $Data['TYPE']:"";
$CODE = isset($Data['CODE']) ? $Data['CODE']:"";
$NAME = isset($Data['NAME']) ? $Data['NAME']:"";
$DESCRIPTION = isset($Data['DESCRIPTION']) ? $Data['DESCRIPTION']:"";
$HARGA_MODAL = isset($Data['HARGA_MODAL']) ? $Data['HARGA_MODAL']:0;
$HARGA_JUAL = isset($Data['HARGA_JUAL']) ? $Data['HARGA_JUAL']:0;

$TIPE = array("ALFAMART","TRANSMART","INDOMARET","TOKOPEDIA");
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

<style type="text/css">
	#description{
		width: 100%;
		padding: .375rem .75rem;
	}
</style>