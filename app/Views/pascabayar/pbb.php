<?php 
$Kategori = isset($Data['kategori'][0]) ? $Data['kategori'][0]:array();
$param['kategori'] = $Kategori;
$param['Url'] = $Data['Url'];
$Produk = isset($Data['Produk']) ? $Data['Produk']:array();
?>
<div class="card">
    <div class="card-body">
		<div class="row" >
		    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
		    	<?php echo view('tab', $param)?>
		    </div>
		</div>
		<form action="javascript:void(0)" method="post" id="formData" data-proses="<?php echo base_url() ?>">
			<div class="row padbottom-20" style="padding-top: 30px;">
			    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 padtop-10 padleft-0 padright-0">
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				        <h5>Provider</h5>
				    </div>
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				        <select class="form-control" name="provider" id="provider">
				        	<option value="">-- Pilih Provider --</option>
				        	<?php 
				        	foreach($Produk AS $row){
				        		$CODE = isset($row->CODE) ? $row->CODE:"";
				        		$DESCRIPTION = isset($row->CODE) ? $row->DESCRIPTION:"";
				        		echo "<option value='".$CODE."'>".$DESCRIPTION."</option>";
				        	}
				        	?>
				        </select>
				    </div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 padtop-10 padleft-0 padright-0">
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				        <h5>Nomor Pelanggan</h5>
				    </div>
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				    	 <input type="number" name="id_pelanggan" id="id_pelanggan" placeholder="Masukan Nomor Pelanggan" class="form-control" onkeypress="return hanyaAngka(event)">
				    </div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10 padleft-0 padright-0" style="display: table;">
					<div style="display: table-cell; vertical-align: bottom; padding-left: 15px; padding-right: 15px;">
						<button class="btn btn-info btn-block" type="button" onclick="viewprice()">
							Cek Tagihan
						</button>
					</div>
				</div>
			</div>
			<div class="row preloader-form" style="display: none;background:transparent;text-align: center;padding-top: 15px;padding-bottom: 15px;">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 loading-form">
		            <div class="spinner-border text-info" role="status" style="width: 20px; height: 20px;">
		                <span class="sr-only">Loading...</span>
		            </div>
				</div>
			</div>
			<div class="row" id="price-list" style="padding-top: 0px; display: none;"></div>
		</form>
	</div>
</div>

<style type="text/css">
	div.box-submit{
		background-color: #17a2b8;
		width: 70px;
		height: 70px;
		border-radius: 75px;
		display: none;
		position: fixed;
		bottom: 50px;
		left: 50%;
		transform: translate(-50%, -50%);
		border: 3px solid white;
		z-index: 1;
		cursor: pointer;
	}

	div.box-submit i{
		color: white;
		font-size: 42px;
		padding-top: 10px;
		padding-left: 5px;
	}

	.select2-container{
		width: 100%;
	}

	.select2-container--default .select2-selection--single{
		height: 50px;
		padding: .375rem .75rem;
		padding-top: 12px;
	}
</style>

<script type="text/javascript">
	$(function(){
		$('#provider').select2();
	});

	function viewprice()
	{
		var form = $('#formData');
		var url = form.data('proses');
		var data = form.serialize();
		$.ajax({
			url : url+'/pascabayar/view_price/pbb',
			data : data,
			cache : false,
			type : 'post',
			beforeSend : function(){
				$('.preloader-form').fadeIn();
				$('#price-list').css({'display':'none'});
			},
			success : function(res){
				$('#price-list').fadeIn();
				$('.preloader-form').fadeOut();
				$('#price-list').html(res);
				$('.box-submit').fadeOut();
			}
		})
	}
</script>