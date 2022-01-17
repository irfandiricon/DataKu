<?php 
$DataTable = isset($Data['produk']) ? $Data['produk']:array();

$paramadd = array();
$SendAdd = base64_encode(json_encode($paramadd));

$TIPE = array("DANA","GOPAY","INDOMARET","LINKAJA","MANDIRI ETOLL","OVO","SHOPEEPAY","TIX ID");
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<button class="btn btn-info" onclick="modal('modal-md', 'Tambah Produk', 'modal_emoney', '<?php echo $SendAdd; ?>', 'emoney/add')">
			<i class="fa fa-plus"></i> Tambah Produk
		</button>
		&nbsp;
		<button class="btn btn-success" style="background-color: green; border-color: green;" data-toggle="collapse" href="#formUpload" role="button" aria-expanded="false" aria-controls="formUpload">
			Upload Excel
		</button>
	</div>
</div>

<div class="collapse padtop-20" id="formUpload">
	<div class="row">
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
			<div class="card">
				<div class="card-body">
					<form id="formImport" name="formImport" action="<?php echo base_url('import/emoney') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<select class="form-control form-input" name="type">
								<option value="">-- PILIH TIPE --</option>
								<?php 
								foreach($TIPE as $Row){
								?>
									<option value="<?php echo $Row ?>"><?php echo $Row ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<input type="file" name="fileexcel" id="file" required accept=".xls, .xlsx" /></p>
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Upload</button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>

<div class="row" style="padding-top: 10px;">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="table-responsive">
			<table class="table table-bordered table-pulsa">
				<thead>
					<tr>
						<th width="50" align="center">NO</th>
						<th width="150">TYPE</th>
						<th width="150">KODE</th>
						<th>NAME</th>
						<th width="100" align="center">STATUS</th>
						<th width="200">TANGGAL BUAT</th>
						<th width="170"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach($DataTable as $row){
						$paramupdate['Data'] = $row;
						$SendEdit = base64_encode(json_encode($paramupdate));

						$STATUS = $row->STATUS;
						if($STATUS == "INACTIVE"){
							$color = "style='color:red; font-weight:bold;'";
						}elseif($STATUS == "ACTIVE"){
							$color = "";
						}

						$paramdelete['id'] = $row->ID;
						$paramdelete['url'] = base_url('emoney/deleterow');
						$SendDelete = base64_encode(json_encode($paramdelete));

						$paramstatus['id'] = $row->ID;
						$paramstatus['status'] = $STATUS;
						$paramstatus['url'] = base_url('emoney/statusrow');
						$SendStatus = base64_encode(json_encode($paramstatus));
					?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row->TYPE ?></td>
							<td><?php echo $row->CODE ?></td>
							<td><?php echo $row->NAME ?></td>
							<td align="center" <?php echo $color ?>><?php echo $row->STATUS ?></td>
							<td><?php echo date('d M Y H:i:s', strtotime($row->CREATED_DATE)) ?></td>
							<td style="text-align: center;">
								<?php 
								if($STATUS == "ACTIVE"){
									$ICON = "fa fa-toggle-off";
									$BTN = "btn-info";
								}else{
									$ICON = "fa fa-toggle-on";
									$BTN = "btn-warning";
								}
								?>
								<a href="javascript:void(0)" title="Status" style="text-decoration: none;">
									<button class="btn <?php echo $BTN ?>" onclick="statusrow('<?php echo $SendStatus ?>', '<?php echo $STATUS ?>')">
										<i class="<?php echo $ICON ?>"></i>
									</button>
								</a>
								<a href="javascript:void(0)" title="Update Info" style="text-decoration: none;">
									<button class="btn btn-primary" onclick="modal('modal-md', 'Edit Data Produk', 'modal_emoney', '<?php echo $SendEdit; ?>', 'emoney/updaterow')">
										<i class="fa fa-edit"></i>
									</button>
								</a>
								<a href="javascript:void(0)" title="Delete" style="text-decoration: none;">
									<button class="btn btn-danger" onclick="deleterow('<?php echo $SendDelete ?>')">
										<i class="fa fa-trash"></i>
									</button>
								</a>
							</td>
						</tr>
					<?php 
					$no++;
					} 
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<style type="text/css">
	table tr td a button{
		margin-top: 5px;
	}
</style>

<script type="text/javascript">
	$(function(){
		$('.table-pulsa').DataTable();
	});
</script>