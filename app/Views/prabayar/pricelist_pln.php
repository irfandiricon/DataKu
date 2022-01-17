<?php 
$Pricelist = isset($Data['pricelist']) ? $Data['pricelist']:array();
$IdPelanggan = isset($Data['idpelanggan']) ? $Data['idpelanggan']:"";

$Inquiry = isset($Data['inquiry']) ? $Data['inquiry']:array();
$Rc = isset($Inquiry->rc) ? $Inquiry->rc:"";
$Message = isset($Inquiry->message) ? $Inquiry->message:"";
$MeterNo = isset($Inquiry->meter_no) ? $Inquiry->meter_no:"";
$ID = isset($Inquiry->hp) ? $Inquiry->hp:"";
$Name = isset($Inquiry->name) ? $Inquiry->name:"";
?>

<?php 
if($Rc == '00'){
?>
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									ID Pelanggan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $ID ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Meter No
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $MeterNo ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nama Pelanggan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $Name ?>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 padleft-0 padright-0"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<div class="row" style="padding-top: 10px; width: 100%">
	<?php 
	if(empty(sizeof($Pricelist))){
	?>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;" align="center">
			<label style="font-weight: bold;">Data tidak ditemukan</label>
		</div>
	<?php
	}elseif($Rc <> '00'){
	?>
		<div class="row" style="padding-top: 10px; width: 100%">
			<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-12"></div>
			<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12" align="center">
				<div class="alert alert-danger f-bold" role="alert">
				 	<?php echo $Message ?>
				</div>
			</div>
		</div>
	<?php
	}
	
	if($Rc == '00'){
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
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6" style="text-align: center; padding-top: 10px; padding-bottom: 10px;">
	    		<div class="card card-price" style="cursor: pointer; border-radius: 1rem;" data-toggle="tooltip" data-placement="bottom" title="<?php echo $DESCRIPTION ?>">
	    			<div class="card-body box-card-price" id="card-price-<?php echo $i ?>" onclick="modal('modal-md', 'Konfirmasi Pesanan', 'prabayar/modal_confirm', '<?php echo $SendConfirm; ?>', 'prabayar/proses_request', '<?php echo base_url() ?>')">
	    				<div class="row">
	    					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0;">
	    						<label style="color: black;"><?php echo $param['NAME']; ?></label>
			    				<p style="color: red; margin-bottom: 0;">
			    					<?php echo number_format($param['HARGA_JUAL']); ?>
			    				</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
		<?php
		$i++;
		}
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

	function chooseprice(i, code)
	{
		var card = $('div.card-price').find('.card-body');
		$.each(card, function(index, value){
			var id = $(this).attr('id');	
			$('#'+id).attr('class', 'card-body');
		});
		$('#card-price-'+i).attr('class', 'card-body active');
		$('#code').val(code);
		$('.box-submit').fadeIn();
	}
</script>

