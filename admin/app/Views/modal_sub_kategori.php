<?php 
$ID = isset($Data['ID']) ? $Data['ID']:"";
$ID_KATEGORI_CHECK = isset($Data['ID_KATEGORI']) ? $Data['ID_KATEGORI']:"";
$NAME = isset($Data['NAME']) ? $Data['NAME']:"";
$DESCRIPTION = isset($Data['DESCRIPTION']) ? $Data['DESCRIPTION']:"";
$LABEL = isset($Data['LABEL']) ? $Data['LABEL']:"";
$TITLE = isset($Data['TITLE_LABEL']) ? $Data['TITLE_LABEL']:"";
$TITLE_LABEL = array("ICON","IMAGE");
$URL = isset($Data['URL']) ? $Data['URL']:"";

?>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Kategori</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="hidden" name="id" value="<?php echo $ID ?>" readonly>
		<select name="kategori" class="form-control form-input">
			<option value="">Pilih Kategori</option>
			<?php
			foreach($kategori as $row)
			{	
				$ID_KATEGORI = isset($row['ID']) ? $row['ID']:"";
				$NAME_KATEGORI = isset($row['NAME']) ? $row['NAME']:"";

				if($ID_KATEGORI == $ID_KATEGORI_CHECK){
					$selected = "selected";
				}else{
					$selected = "";
				}
			?>
				<option value="<?php echo $ID_KATEGORI ?>" <?php echo $selected ?>><?php echo $NAME_KATEGORI ?></option>
			<?php
			}
			?>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Nama</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="name" class="form-control form-input" placeholder="Masukan Nama Sub Kategori" value="<?php echo $NAME ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Deskripsi</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<textarea name="description" class="form-input" placeholder="Masukan Deskripsi Sub Kategori" id="description"><?php echo $DESCRIPTION ?></textarea>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Title Label</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<select name="title_label" class="form-control form-input">
			<?php
			foreach($TITLE_LABEL as $row)
			{	
				$NAME = isset($row) ? $row:"";

				if($NAME == $TITLE){
					$selected = "selected";
				}else{
					$selected = "";
				}
			?>
				<option value="<?php echo $NAME ?>" <?php echo $selected ?>><?php echo $NAME ?></option>
			<?php
			}
			?>
		</select>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Label</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="label" class="form-control form-input" placeholder="Nama Icon / Image" value="<?php echo $LABEL ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>URL</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="text" name="url" class="form-control form-input" placeholder="Masukan URL" value="<?php echo $URL ?>">
	</div>
</div>

<style type="text/css">
	#description{
		width: 100%;
		padding: .375rem .75rem;
	}
</style>