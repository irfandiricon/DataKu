<?php 
$Balance = isset($Data['balance']) ? $Data['balance']:"";
$Transaksi = isset($Data['transaksi']) ? $Data['transaksi']:"";
$Search = isset($Data['search']) ? $Data['search']:"";
$StartDate = date('d M Y', strtotime($Search['start']));
$EndDate = date('d M Y', strtotime($Search['end']));

$Prepaid = isset($Transaksi['Prepaid']) ? $Transaksi['Prepaid']:"";
$Postpaid = isset($Transaksi['Postpaid']) ? $Transaksi['Postpaid']:"";
$Pending = isset($Transaksi['Pending']) ? $Transaksi['Pending']:"";

$PrepaidSuccess = array();
$PrepaidFailed = array();
$PRICE_PREPAID_SUCCESS = 0;
$PRICE_PREPAID_FAILED = 0;
foreach($Prepaid as $RowPrepaid){
	$STATUS_TRANSAKSI_PREPAID = isset($RowPrepaid->STATUS_TRANSAKSI) ? $RowPrepaid->STATUS_TRANSAKSI:0;
	if($STATUS_TRANSAKSI_PREPAID == "1"){
		$PrepaidSuccess[] = $RowPrepaid;
		$PRICE_PREPAID_SUCCESS += isset($RowPrepaid->JUMLAH_BAYAR) ? $RowPrepaid->JUMLAH_BAYAR:0;
	}

	if($STATUS_TRANSAKSI_PREPAID == "2"){
		$PrepaidFailed[] = $RowPrepaid;
		$PRICE_PREPAID_FAILED += isset($RowPrepaid->JUMLAH_BAYAR) ? $RowPrepaid->JUMLAH_BAYAR:0;
	}
}

$PRICE_POSTPAID = 0;
foreach($Postpaid as $RowPostpaid){
	$STATUS_TRANSAKSI_POSTPAID = isset($RowPostpaid->STATUS_TRANSAKSI) ? $RowPostpaid->STATUS_TRANSAKSI:0;
	if($STATUS_TRANSAKSI_POSTPAID == "00"){
		$PRICE_POSTPAID += isset($RowPostpaid->JUMLAH_BAYAR) ? $RowPostpaid->JUMLAH_BAYAR:0;
	}
}

$TotalPrepaidSuccess = sizeof($PrepaidSuccess);
$TotalPrepaidFailed = sizeof($PrepaidFailed);
$TotalPrepaid = sizeof($Prepaid);
$TotalPostpaid = sizeof($Postpaid);
$TotalPending = sizeof($Pending);

$SendPrepaid = base64_encode(json_encode($Prepaid));
$SendPostpaid = base64_encode(json_encode($Postpaid));
$SendPending = base64_encode(json_encode($Pending));
?>
<div id="app">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<form name="formData" id="fornData" action="<?php echo base_url('dashboard') ?>" method="post">
						<label style="font-weight: 600;">Tanggal</label>
						<input type="text" name="start" id="StartDate" class="form-control" style="margin-bottom: 10px;" placeholder="Start" value="<?php echo $StartDate ?>">
						<input type="text" name="end" id="EndDate" class="form-control" style="margin-bottom: 10px;" placeholder="End" value="<?php echo $EndDate ?>">
						<button class="btn btn-info" type="submit">
							Submit
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<h3>Deposit</h3>
					<h1 style="padding-top: 20px;"><b>Rp. <?php echo str_replace(",",".",number_format($Balance)); ?></b></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card">
				<div class="card-body" style="text-align: center; cursor: pointer;" onclick="modal('modal-xl','Transaksi Prepaid','modal_transaksi','<?php echo $SendPrepaid ?>','')">
					<h3>Total Prepaid</h3>
					<h1><b><?php echo $TotalPrepaid ?></b></h1>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card">
				<div class="card-body" style="text-align: center; cursor: pointer;" onclick="modal('modal-xl','Transaksi Postpaid','modal_transaksi','<?php echo $SendPostpaid ?>','')">
					<h3>Total Postpaid</h3>
					<h1><b><?php echo $TotalPostpaid ?></b></h1>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card">
				<div class="card-body" style="text-align: center; cursor: pointer;" onclick="modal('modal-xl','Transaksi Process','modal_transaksi','<?php echo $SendPending ?>','')">
					<h3>Total Pending</h3>
					<h1><b><?php echo $TotalPending ?></b></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="card">
				<div class="card-body" style="text-align: right;">
					<h3>Total Penjualan Prepaid</h3>
					<h1><b>Rp. <?php echo str_replace(",",".",number_format($PRICE_PREPAID_SUCCESS)); ?></b></h1>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
			<div class="card">
				<div class="card-body" style="text-align: right;">
					<h3>Total Penjualan Postpaid</h3>
					<h1><b>Rp. <?php echo str_replace(",",".",number_format($PRICE_POSTPAID)); ?></b></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('#StartDate').datepicker({
			changeYear : true,
	        changeMonth : true,
	        dateFormat: 'd M yy',
	        maxDate : 'today',
	        onSelect: function(date){
	            var selectedDate = new Date(date);
	            var msecsInADay = 86400000;
	            var endDate = new Date(selectedDate.getTime()-1 + msecsInADay);
	            $("#EndDate").datepicker( "option", "minDate", endDate );
	        }
		});

		$('#EndDate').datepicker({
	        changeYear : true,
	        changeMonth : true,
	        dateFormat: 'd M yy',
	    });
	});
</script>