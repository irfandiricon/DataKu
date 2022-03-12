<?php 	
$TrId = isset($rows['TrId']) ? $rows['TrId']:"";
$IdPelanggan = isset($rows['IdPelanggan']) ? $rows['IdPelanggan']:"";
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<input type="hidden" name="tr_id" value="<?php echo $TrId ?>">
		<input type="hidden" name="id_pelanggan" value="<?php echo $IdPelanggan ?>">
	</div>
</div>

<div class="row padtop-10">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
		<input type="number" class="pin" id="pin1" name="pin1" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
		<input type="number" class="pin" id="pin2" name="pin2" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
		<input type="number" class="pin" id="pin3" name="pin3" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
		<input type="number" class="pin" id="pin4" name="pin4" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return hanyaAngka(this.value)">
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('button#submit').html('Bayar Sekarang');
		$('button#submit').attr('onclick','submitformtransaksi()');

		document.getElementById('pin1').focus();
		$('#pin1').on('keyup', function(){
			$('#pin2').val('');
			$('#pin3').val('');
			$('#pin4').val('');
			document.getElementById('pin2').focus();
		});

		$('#pin2').on('keyup', function(){
			$('#pin3').val('');
			$('#pin4').val('');
			document.getElementById('pin3').focus();
		});

		$('#pin3').on('keyup', function(){
			$('#pin4').val('');
			document.getElementById('pin4').focus();
		});
	});
</script>

<style type="text/css">
	input.pin{
		text-align: center;
		font-weight: bold;
		font-size: 35px !important;
		border: none;
		border-bottom: 2px solid #ddd;
		width: 100%
	}

	input.pin::focus{
		border: 1px solid darkblue;
	}
</style>