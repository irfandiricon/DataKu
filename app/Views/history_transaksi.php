<div class="row padtop-10">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<div class="nav nav-tab" id="nav-tab" role="tablist" style="flex-direction: column;">
			<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;" id="tab-all" onclick="showhistory('all')">
					Semua Transaksi
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;" id="tab-proses" onclick="showhistory('proses')">
					Transaksi Proses
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;" id="tab-sukses" onclick="showhistory('sukses')">
					Transaksi Sukses
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;" id="tab-gagal" onclick="showhistory('gagal')">
					Transaksi Gagal
				</li>
			</ul>
		</div>
	</div>
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<div class="row-history">
			<?php 
			$i=1;
			foreach($History as $Row){
				$CREATED_DATE = isset($Row->CREATED_DATE) ? $Row->CREATED_DATE:"";
				$CREATED = date("d M Y H:i", strtotime($CREATED_DATE));
				$NO_PELANGGAN = isset($Row->NO_PELANGGAN) ? $Row->NO_PELANGGAN:"";
				$ID_REFFERENCE = isset($Row->ID_REFFERENCE) ? $Row->ID_REFFERENCE:"";
				$KODE_PRODUK = isset($Row->KODE_PRODUK) ? $Row->KODE_PRODUK:"";
				$ERROR_MESSAGE = isset($Row->ERROR_MESSAGE) ? $Row->ERROR_MESSAGE:"";
				$JUMLAH_BAYAR = isset($Row->JUMLAH_BAYAR) ? $Row->JUMLAH_BAYAR:0;
				$ERROR_CODE = isset($Row->ERROR_CODE) ? $Row->ERROR_CODE:0;
				if($ERROR_CODE == 1){
					$color = "style = 'color: green; font-size: 16px; font-weight: bold'";
					$Status = "sukses";
				}elseif($ERROR_CODE == 2){
					$color = "style = 'color: red; font-size: 16px; font-weight: bold'";
					$Status = "gagal";
				}else{
					$color = "style = 'color: orange; font-size: 16px; font-weight: bold'";
					$Status = "proses";
				}
			?>
				<div class="card martop-10 card-history" data-attr="<?php echo $Status ?>" id="data-<?php echo $Status ?>-<?php echo $i ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
								<p class="marbottom-0">Tanggal Transaksi</p>
								<label style="font-weight: bold;"><?php echo $CREATED ?></label>

								<p class="marbottom-0">ID Pelanggan</p>
								<label style="font-weight: bold;"><?php echo $NO_PELANGGAN ?></label>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
								<p class="marbottom-0">ID Transaksi</p>
								<label style="font-weight: bold;"><?php echo $ID_REFFERENCE ?></label>

								<p class="marbottom-0">Produk</p>
								<label style="font-weight: bold;"><?php echo $KODE_PRODUK ?></label>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12"> 
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-6">
										<p <?php echo $color ?>>
											<?php echo $ERROR_MESSAGE ?>
										</p> 
									</div>
									<div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-6"> 
										<p style="font-size: 24px; font-weight: bold;">
											<?php echo "Rp. ".number_format($JUMLAH_BAYAR) ?>
										</p>
									</div>
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
	</div>
</div>

<script type="text/javascript">
	$(function(){
    	$('#tab-all').trigger('click');
    });

	function showhistory(i){
	    var list = $('ul.list-group').find('.list-group-item');
	   	$.each(list, function(index, value){
	      	var id = $(this).attr('id');
	      	$('#'+id).removeClass().addClass('list-group-item d-flex justify-content-between align-items-center');
	      	$('#'+id).css({'background-color':'transparent', 'color':'black'});
	    });
	   
	   	$('#tab-'+i).removeClass().addClass('list-group-item d-flex justify-content-between align-items-center');
	   	$('#tab-'+i).css({'background-color':'#007bff', 'color':'white'});
	   	var row = $('.row-history').find('.card');

	   	if(i == "all"){
	   		$.each(row, function(index, value){
			  	$(this).removeClass().addClass('card martop-10 card-history');
			});
	   	}else{
	   		$.each(row, function(index, value){
			  	$(this).removeClass().addClass('card martop-10 card-history d-none');
			  	var attr = $(this).data('attr');
			  	if(attr == i){
			  		$(this).removeClass().addClass('card martop-10 card-history');
			  	}
			});
	   	}
		
	 }
</script>