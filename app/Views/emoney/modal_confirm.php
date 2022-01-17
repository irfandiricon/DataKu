<?php 	
$CODE = isset($rows['CODE']) ? $rows['CODE']:"";
$ID_PELANGGAN = isset($rows['ID_PELANGGAN']) ? $rows['ID_PELANGGAN']:"";
$NAME = isset($rows['NAME']) ? $rows['NAME']:"";
$DESCRIPTION = isset($rows['DESCRIPTION']) ? $rows['DESCRIPTION']:"";
$HARGA_JUAL = isset($rows['HARGA_JUAL']) ? $rows['HARGA_JUAL']:"";
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<input type="hidden" name="code" value="<?php echo $CODE ?>">
		<input type="hidden" name="phone_number" value="<?php echo $ID_PELANGGAN ?>">
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label>Nomor</label>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label><?php echo $ID_PELANGGAN ?></label>
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label>Nama Produk</label>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label><?php echo $NAME ?></label>
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label>Deskripsi</label>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label><?php echo $DESCRIPTION ?></label>
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label>Harga</label>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
		<label><?php echo number_format($HARGA_JUAL) ?></label>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('button#submit').html('Konfirmasi');
	});
</script>