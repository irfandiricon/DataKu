<?php 
$Kategori = isset($Data['kategori'][0]) ? $Data['kategori'][0]:array();
$param['kategori'] = $Kategori;
$param['Url'] = $Data['Url'];
?>
<div class="row" >
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
    	<?php echo view('tab', $param)?>
    </div>
</div>
<form action="javascript:void(0)" method="post" id="formData" data-proses="<?php echo base_url() ?>">
	<input type="hidden" name="type" readonly value="PLN">
	<div class="row" style="padding-top: 30px;">
	    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	        <h5>Nomor Pelanggan</h5>
	    </div>
	    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	        <div class="input-group mb-3">
	            <input type="number" name="id_pelanggan" id="id_pelanggan" placeholder="Masukan Nomor Pelanggan" class="form-control" style="border-right: 0;" onkeypress="return hanyaAngka(event)">
	            <div class="input-group-append" style="cursor: pointer;">
	                <img class="input-group-text" src="<?php echo base_url('assets/image/search.png')?>" id="image-provider" style="border-left: 0; background-color: white;" height="50" width="auto" onclick="viewprice()"></img>
	            </div>
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

<script type="text/javascript">
	function viewprice()
	{
		var form = $('#formData');
		var url = form.data('proses');
		var data = form.serialize();
		$.ajax({
			url : url+'/prabayar/view_price_pln',
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