<?php 
$Inquiry = isset($Data['inquiry']) ? $Data['inquiry']:array();
$Rc = isset($Inquiry->response_code) ? $Inquiry->response_code:"";
$Message = isset($Inquiry->message) ? $Inquiry->message:"";
$TrId = isset($Inquiry->tr_id) ? $Inquiry->tr_id:"";
$ID = isset($Inquiry->hp) ? $Inquiry->hp:"";
$TrName = isset($Inquiry->tr_name) ? $Inquiry->tr_name:"";
$Period = isset($Inquiry->period) ? $Inquiry->period:"";
$ReffId = isset($Inquiry->ref_id) ? $Inquiry->ref_id:"";

$Period = isset($Inquiry->period) ? $Inquiry->period:"";
$NilaiTagihan = isset($Inquiry->nominal) ? $Inquiry->nominal:0;
$Admin = isset($Inquiry->admin) ? $Inquiry->admin:0;
$Total = isset($Inquiry->price) ? $Inquiry->price:0;

$Desc = isset($Inquiry->desc) ? $Inquiry->desc: array();
$NamaItem = isset($Desc->item_name) ? $Desc->item_name:"";
$Tenor = isset($Desc->tenor) ? $Desc->tenor:"";
$PembayaranTerakhir = isset($Desc->last_paid_due_date) ? $Desc->last_paid_due_date:"";

$parampin['TrId'] = $TrId;
$parampin['IdPelanggan'] = $ID;
$SendPin = base64_encode(json_encode($parampin));

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
		modal('modal-md', 'PIN Transaksi', 'pascabayar/modal_pin', '<?php echo $SendPin ?>', 'pascabayar/proses/tvkabel', '<?php echo base_url() ?>');
	}	
</script>

<style type="text/css">
	.card-body.active{
		border:  3px solid #17a2b8;
		border-radius: 1rem;
	}
</style>