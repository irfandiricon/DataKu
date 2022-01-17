<?php 
$ID = isset($Data['ID']) ? $Data['ID']:"";
$NAME = isset($Data['NAME']) ? $Data['NAME']:"";
$DESCRIPTION = isset($Data['DESCRIPTION']) ? $Data['DESCRIPTION']:"";
?>
<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Nama Kategori</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<input type="hidden" name="id" value="<?php echo $ID ?>" readonly>
		<input type="text" name="name" class="form-control form-input" placeholder="Masukan Nama Kategori" value="<?php echo $NAME ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 row-input">
		<h6>Deskripsi</h6>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 row-input">
		<textarea name="description" class="form-input" placeholder="Masukan Deskripsi Kategori" value="<?php echo $DESCRIPTION ?>" id="description"></textarea>
	</div>
</div>

<style type="text/css">
	#description{
		width: 100%;
		padding: .375rem .75rem;
	}
</style>