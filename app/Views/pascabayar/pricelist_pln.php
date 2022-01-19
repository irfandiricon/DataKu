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
$Tarif = isset($Desc->tarif) ? $Desc->tarif:"";
$Daya = isset($Desc->daya) ? $Desc->daya:"";
$Tagihan = isset($Desc->tagihan) ? $Desc->tagihan:"";
$Detail = isset($Tagihan->detail) ? $Tagihan->detail:"";

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
	<div class="row padtop-20">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<?php 
							foreach($Detail as $Row) {
								$NilaiTagihan = isset($Row->nilai_tagihan) ? $Row->nilai_tagihan:0;
								$Admin = isset($Row->admin) ? $Row->admin:0;
								$Periode = isset($Row->periode) ? $Row->periode:"";
								$Denda = isset($Row->denda) ? $Row->denda:0;
								$Total = isset($Row->total) ? $Row->total:0;
							?>
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
										Periode
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo date('M Y', strtotime($Periode)); ?>
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
										Denda (Rp.)
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
										<?php echo number_format($Denda) ?>
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
							<?php } ?>
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
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Tarif
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $Tarif ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Daya
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $Daya ?>
								</div>
							</div>
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
<?php } ?>

<script type="text/javascript">
	function submitpin()
	{
		modal('modal-md', 'PIN Transaksi', 'pascabayar/modal_pin', '<?php echo $SendPin ?>', 'pascabayar/proses/pln', '<?php echo base_url() ?>');
	}	
</script>

<style type="text/css">
	.card-body.active{
		border:  3px solid #17a2b8;
		border-radius: 1rem;
	}
</style>