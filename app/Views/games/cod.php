<?php 
$Kategori = isset($Data['kategori'][0]) ? $Data['kategori'][0]:array();
$param['kategori'] = $Kategori;
$param['Url'] = $Data['Url'];
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
			    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 padtop-10 padleft-0 padright-0">
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				        <h5>USER ID</h5>
				    </div>
				    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				        <input type="text" name="userid" id="userid" placeholder="Masukan User ID" class="form-control" onkeypress="return hanyaAngka(event)">
				    </div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padtop-10 padleft-0 padright-0" style="display: table;">
					<div style="display: table-cell; vertical-align: bottom; padding-left: 15px; padding-right: 15px;">
						<button class="btn btn-info btn-block" type="button" onclick="viewprice()">
							Lanjutkan
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

<script type="text/javascript">
	function viewprice()
	{
		var form = $('#formData');
		var url = form.data('proses');
		var data = form.serialize();
		$.ajax({
			url : url+'/games/view_price/cod',
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