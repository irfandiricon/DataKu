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
$NomorIdentitas = isset($Desc->nomor_identitas) ? $Desc->nomor_identitas:"";
$NomorRangka = isset($Desc->nomor_rangka) ? $Desc->nomor_rangka:"";
$NomorMesin = isset($Desc->nomor_mesin) ? $Desc->nomor_mesin:"";
$NomorPolisi = isset($Desc->nomor_polisi) ? $Desc->nomor_polisi:"";
$Alamat = isset($Desc->alamat) ? $Desc->alamat:"";
$MerekKb = isset($Desc->merek_kb) ? $Desc->merek_kb:"";
$ModelKb = isset($Desc->model_kb) ? $Desc->model_kb:"";
$TahunBuatan = isset($Desc->tahun_buatan) ? $Desc->tahun_buatan:"";
$TipeKb = isset($Desc->tipe_kb) ? $Desc->tipe_kb:"";
$TglAkhirPajak = isset($Desc->tgl_akhir_pajak_baru) ? $Desc->tgl_akhir_pajak_baru:"";

$BiayaPokok = isset($Desc->biaya_pokok) ? $Desc->biaya_pokok:"";
$PokokBBN = isset($BiayaPokok->BBN) ? $BiayaPokok->BBN:"";
$PokokPKB  = isset($BiayaPokok->PKB) ? $BiayaPokok->PKB:"";
$PokokSWD = isset($BiayaPokok->SWD) ? $BiayaPokok->SWD:"";

$BiayaDenda = isset($Desc->biaya_denda) ? $Desc->biaya_denda:"";
$DendaBBN = isset($BiayaDenda->BBN) ? $BiayaDenda->BBN:"";
$DendaPKB  = isset($BiayaDenda->PKB) ? $BiayaDenda->PKB:"";
$DendaSWD = isset($BiayaDenda->SWD) ? $BiayaDenda->SWD:"";

$BiayaAdmin = isset($Desc->biaya_admin) ? $Desc->biaya_admin:"";
$AdminStnk = isset($BiayaAdmin->stnk) ? $BiayaAdmin->stnk:"";
$AdminTnkb = isset($BiayaAdmin->tnkb) ? $BiayaAdmin->tnkb:"";

$ParkirPokok = isset($Desc->biaya_parkir_pokok) ? $Desc->biaya_parkir_pokok:"";
$PajakProgresif = isset($Desc->biaya_pajak_progresif) ? $Desc->biaya_pajak_progresif:"";

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
						</div>
					</div>
					<hr width="100%">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row padtop-10">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 t-bold">
									<p class="marbot-0 f-weight-600"><u>Biaya Pokok</u></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									BBN (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($PokokBBN) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									PKB (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($PokokPKB) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									SWD (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($PokokSWD) ?>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row padtop-10">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 t-bold">
									<p class="marbot-0 f-weight-600"><u>Biaya Denda</u></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									BBN (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($DendaBBN) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									PKB (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($DendaPKB) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									SWD (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($DendaSWD) ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row padtop-20">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row padtop-10">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 t-bold">
									<p class="marbot-0 f-weight-600"><u>Biaya Admin</u></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									STNK (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($AdminStnk) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									TNKB (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($AdminTnkb) ?>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row padtop-10">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 t-bold">
									<p class="marbot-0 f-weight-600"><u>Biaya Lainnya</u></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Biaya Parkir Pokok (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($ParkirPokok) ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Biaya Pajak Progresif (Rp.)
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo number_format($PajakProgresif) ?>
								</div>
							</div>
						</div>
					</div>

					<hr width="100%">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nomor Identitas
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $NomorIdentitas ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nomor Rangka
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $NomorRangka ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nomor Mesin
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $NomorMesin ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Nomor Polisi
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $NomorPolisi ?>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 padleft-0 padright-0">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Tipe Kendaraan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $TipeKb ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Merek Kendaraan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $MerekKb ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Model Kendaraan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $ModelKb ?>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 t-bold">
									Tahun Pembuatan
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<?php echo $TahunBuatan ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
		modal('modal-md', 'PIN Transaksi', 'pascabayar/modal_pin', '<?php echo $SendPin ?>', 'pascabayar/proses/esamsat', '<?php echo base_url() ?>');
	}	
</script>

<style type="text/css">
	.card-body.active{
		border:  3px solid #17a2b8;
		border-radius: 1rem;
	}
</style>