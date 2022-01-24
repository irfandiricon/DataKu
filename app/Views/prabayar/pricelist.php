<?php 
$Pricelist = isset($Data['pricelist']) ? $Data['pricelist']:array();
$IdPelanggan = isset($Data['idpelanggan']) ? $Data['idpelanggan']:"";
?>
<div class="row" style="width: 100%;">
	<?php 
	if(empty(sizeof($Pricelist))){
	?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;" align="center">
			<label style="font-weight: bold;">Data tidak ditemukan</label>
		</div>
	<?php
	}
	?>
</div>
<div class="row">
	<?php 
	$i = 1;
	foreach($Pricelist as $Row){
		$param['ID_PROVIDER'] = isset($Row['ID_PROVIDER']) ? $Row['ID_PROVIDER']:"";
		$param['CODE'] = isset($Row['CODE']) ? $Row['CODE']:"";
		$param['NAME'] = isset($Row['NAME']) ? $Row['NAME']:"";
		$param['DESCRIPTION'] = isset($Row['DESCRIPTION']) ? $Row['DESCRIPTION']:"";
		$param['HARGA_MODAL'] = ($Row['HARGA_MODAL']) ? $Row['HARGA_MODAL']:"";
		$param['HARGA_JUAL'] = isset($Row['HARGA_JUAL']) ? $Row['HARGA_JUAL']:"";
		$param['ID_PELANGGAN'] = $IdPelanggan;
		$CODE = $param['CODE'];
		$DESCRIPTION = $param['DESCRIPTION'];

		$SendConfirm = base64_encode(json_encode($param));
	?>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6" style="text-align: center; padding-top: 10px; padding-bottom: 10px;">
    		<div class="card card-price" style="cursor: pointer; border-radius: 1rem;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $DESCRIPTION ?>">
				<div class="card-body box-card-price" id="card-price-<?php echo $i ?>" onclick="modal('modal-md', 'Konfirmasi Pesanan', 'prabayar/modal_confirm', '<?php echo $SendConfirm; ?>', 'prabayar/proses_request', '<?php echo base_url() ?>')">
    				<div class="row">
    					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0;">
    						<label style="color: black;"><?php echo $param['NAME']; ?></label>
		    				<p style="color: red;">
		    					Rp. <?php echo number_format($param['HARGA_JUAL']); ?>
		    				</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
	<?php
	$i++;
	}
	?>
</div>

<style type="text/css">
	.card-body.active{
		border:  3px solid #17a2b8;
		border-radius: 1rem;
	}
</style>

<script type="text/javascript">
	$(function(){
		$('.box-card-price').click(function(){
			var $this = $(this);
			var getid = $this.attr('id');
			var card = $('div.card-price').find('.card-body');
			$.each(card, function(index, value){
				var id = $(this).attr('id');	
				$('#'+id).attr('class', 'card-body box-card-price');
			});
			$('#'+getid).attr('class', 'card-body active box-card-price');
		});
	});
</script>

