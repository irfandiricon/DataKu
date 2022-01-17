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
		<div class="row" style="padding-top: 30px;">
		    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		        <h5>Nomor Handphone</h5>
		    </div>
		    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		        <div class="input-group mb-3">
		            <input type="text" name="phone_number" placeholder="Masukan nomor handphone" class="form-control" style="border-right: 0;">
		            <div class="input-group-append">
		                <span class="input-group-text" id="image-provider" style="background-color: white; border-left: 0;"></span>
		            </div>
		        </div>
		    </div>
		    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		        <button class="btn btn-info">Lanjutkan</button>
		    </div>
		</div>
	</div>
</div>