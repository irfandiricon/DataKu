<?php 
$Inquiry = isset($Data['inquiry']) ? $Data['inquiry']:array();
$Rc = isset($Inquiry->response_code) ? $Inquiry->response_code:"";
$Message = isset($Inquiry->message) ? $Inquiry->message:"";
$TrId = isset($Inquiry->tr_id) ? $Inquiry->tr_id:"";
$ID = isset($Inquiry->hp) ? $Inquiry->hp:"";
$TrName = isset($Inquiry->tr_name) ? $Inquiry->tr_name:"";
$Period = isset($Inquiry->period) ? $Inquiry->period:"";
$ReffId = isset($Inquiry->ref_id) ? $Inquiry->ref_id:"";
$Desc = isset($Inquiry->desc) ? $Inquiry->desc: array();

$NamaPdam = isset($Desc->pdam_name) ? $Desc->pdam_name:"";
$AlamatPdam = isset($Desc->address) ? $Desc->address:"";
$KodeTarif = isset($Desc->kode_tarif) ? $Desc->kode_tarif:"";
$Bill = isset($Desc->bill) ? $Desc->bill:"";
$Detail = isset($Bill->detail) ? $Bill->detail:array();

$Period = isset($Inquiry->period) ? $Inquiry->period:"";
$NilaiTagihan = isset($Inquiry->nominal) ? $Inquiry->nominal:0;
$Admin = isset($Inquiry->admin) ? $Inquiry->admin:0;
$Total = isset($Inquiry->price) ? $Inquiry->price:0;

$parampin['TrId'] = $TrId;
$parampin['IdPelanggan'] = $ID;
$SendPin = base64_encode(json_encode($parampin));

$Exp = explode(",", $Period);
if($Rc <> '00'){
?>
	<div class="row" style="padding-top: 10px; width: 100%">
		<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-12"></div>
		<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12" align="center">
			<div class="alert alert-danger f-bold" role="alert">
			 	<?php echo $Message ?>
			</div>
		</div>
	</div>
<?php } ?>
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
									Periode
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php 
										for($i=0; $i<sizeof($Exp); $i++){
											
											if($i>0){
												echo " / ";
											}
											echo $Exp[$i]; 
										}
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Tagihan (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($NilaiTagihan) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Admin (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($Admin) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Total (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($Total) ?>
								</div>
							</div>
							<?php 
							foreach($Detail as $row){
								$Periode = isset($row->period) ? $row->period:"";
								$FirstMeter = isset($row->first_meter) ? $row->first_meter:"";
								$LastMeter = isset($row->last_meter) ? $row->last_meter:"";
								$Penalty = isset($row->penalty) ? $row->penalty:"";
								$BillAmount = isset($row->bill_amount) ? $row->bill_amount:"";
								$MiscAmount = isset($row->misc_amount) ? $row->misc_amount:"";
							?>
								<hr width="100%">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Periode
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo (int)$Periode; ?>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										First Meter
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo $FirstMeter ?>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Last Meter
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo $LastMeter ?>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Penalty
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo $Penalty ?>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Bill Amount
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo $BillAmount ?>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Misc Amount
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo $MiscAmount ?>
									</div>
								</div>
							<?php
							}
							?>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									ID Pelanggan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $ID ?>
									<input type="hidden" name="tr_id" value="<?php echo $TrId?>">
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									ID Refference
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $ReffId ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nama Pelanggan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $TrName ?>
								</div>
							</div>
							<hr width="100%">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nama PDAM
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $NamaPdam ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Alamat
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $AlamatPdam ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Kode Tarif
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $KodeTarif ?>
								</div>
							</div>
							<div class="row t-center padtop-20">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 t-bold">
									<button class="btn btn-info" type="button" onclick="submitpin()">
										Bayar
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<script type="text/javascript">
	function submitpin()
	{
		modal('modal-md', 'PIN Transaksi', 'pascabayar/modal_pin', '<?php echo $SendPin ?>', 'pascabayar/proses/pdam', '<?php echo base_url() ?>');
	}	
</script>

<style type="text/css">
	.card-body.active{
		border:  3px solid #17a2b8;
		border-radius: 1rem;
	}
</style>