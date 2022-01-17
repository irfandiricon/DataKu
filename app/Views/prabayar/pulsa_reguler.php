<?php 
$Kategori = isset($Data['kategori'][0]) ? $Data['kategori'][0]:array();
$param['kategori'] = $Kategori;
$param['Url'] = $Data['Url'];
?>
<div class="card">
    <div class="card-body">
		<div class="row" >
		    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
		    	<?php echo view('prabayar/tab', $param)?>
		    </div>
		</div>
		<form action="javascript:void(0)" method="post" data-url="<?php echo base_url('prabayar/proses_request') ?>" id="formData" data-proses="<?php echo base_url() ?>">
			<input type="hidden" name="type" readonly value="PULSA">
			<div class="row" style="padding-top: 30px;">
			    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			        <h5>Nomor Handphone</h5>
			    </div>
			    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			        <div class="input-group mb-3">
			            <input type="number" name="phone_number" id="phone_number" placeholder="Masukan nomor handphone" class="form-control" style="border-right: 0;" onkeypress="return hanyaAngka(event)">
			            <div class="input-group-append">
			                <img class="input-group-text" src="<?php echo base_url('assets/image/search.png')?>" id="image-provider" style="border-left: 0; background-color: white;" height="50" width="auto" onclick="checknumber()"></img>
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
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('#phone_number').change(function(){
			var number = $(this).val();
			if(number.length >= 4)
			{
				checknumber();
			}else{
				$('#code').val("");
				$('#price-list').css({'display':'none'});
			}
		});
	});

	function checknumber()
	{
		var url = "<?php echo base_url('prabayar/checknumber') ?>";
		var number = $('#phone_number').val();
		var num = number.substring(0,4);
		$.ajax({
			url : url,
			cache : false,
			data : {number : num},
			dataType : 'json',
			type : 'post',
			beforeSend : function(){
				$('img#image-provider').attr({'src': ''});
				$('#price-list').css({'display':'none'});
			},
			success : function(res){
				var URL_IMAGE = res.URL_IMAGE;
				$('img#image-provider').attr({'src': URL_IMAGE});
				viewprice();
			}
		});
	}

	function viewprice()
	{
		var form = $('#formData');
		var url = form.data('proses');
		var data = form.serialize();
		$.ajax({
			url : url+'/prabayar/view_price_pulsa',
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