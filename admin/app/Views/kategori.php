<?php 
$DataTable = $Data['table'];

$paramadd = array();
$paramadd['kategori'] = $DataTable;
$SendAdd = base64_encode(json_encode($paramadd));
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<button class="btn btn-info" onclick="modal('modal-md', 'Tambah Kategori', 'modal_kategori', '<?php echo $SendAdd; ?>', 'kategori/add')">
			<i class="fa fa-plus"></i> Tambah Kategori
		</button>&nbsp;
		<button class="btn btn-info" onclick="modal('modal-md', 'Tambah Sub Kategori', 'modal_sub_kategori', '<?php echo $SendAdd; ?>', 'kategori/addsub')">
			<i class="fa fa-plus"></i> Tambah Sub Kategori
		</button>
	</div>
</div>
<div class="row" style="padding-top: 10px;">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="table-responsive">
			<table class="table table-bordered table-kategori">
				<thead>
					<tr>
						<td width="50"></td>
						<td width="50" align="center">NO</td>
						<td width="200">NAMA KATEGORI</td>
						<td>DESKRIPSI</td>
						<td width="100" align="center">STATUS</td>
						<td width="200">TANGGAL BUAT</td>
						<td width="150"></td>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 0;
					$no = 1;
					foreach($DataTable as $data){
						$paramupdate['Data'] = $data;
						$SendEdit = base64_encode(json_encode($paramupdate));

						$STATUS = $data['STATUS'];
						if($STATUS == "INACTIVE"){
							$color = "style='color:red; font-weight:bold;'";
						}elseif($STATUS == "ACTIVE"){
							$color = "";
						}

						$paramdelete['id'] = $data['ID'];
						$paramdelete['url'] = base_url('kategori/deleterow');
						$SendDelete = base64_encode(json_encode($paramdelete));

						$paramstatus['id'] = $data['ID'];
						$paramstatus['status'] = $STATUS;
						$paramstatus['url'] = base_url('kategori/statusrow');
						$SendStatus = base64_encode(json_encode($paramstatus));

						$Sub = isset($data['SUB']) ? $data['SUB'] : array();
					?>
						<tr>
							<td align="center" valign="middle">
								<i class="fa fa-plus-circle" data="inactive" id="icon-sub-<?php echo $i ?>" style="color: #1976d2; font-size: 18px; cursor: pointer;" onclick="showhidesub('<?php echo $i ?>')"></i>
							</td>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $data['NAME']; ?></td>
							<td><?php echo $data['DESCRIPTION']; ?></td>
							<td align="center" <?php echo $color; ?>><?php echo $STATUS; ?></td>
							<td><?php echo date('d M Y H:i:s', strtotime($data['CREATED_DATE'])); ?></td>
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
									<button class="btn btn-primary" onclick="modal('modal-md', 'Edit Data Kategori', 'modal_kategori', '<?php echo $SendEdit; ?>', 'kategori/updaterow')">
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
						<tr class="sub-kategori inactive" id="sub-kategori-<?php echo $i ?>">
							<td colspan="7">
								<table class="table table-bordered table-sub-kategori">
									<thead>
										<tr align="left">
											<td width="50" aign="center">NO</td>
											<td>NAMA SUB KATEGORI</td>
											<td width="200">LABEL</td>
											<td width="100" align="center">STATUS</td>
											<td width="200">TANGGAL BUAT</td>
											<td width="150"></td>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no2 = 1;
										foreach($Sub as $data2)
										{
											$paramupdate2['Data'] = $data2;
											$paramupdate2['kategori'] = $DataTable;
											$SendEdit2 = base64_encode(json_encode($paramupdate2));

											$STATUS_SUB = $data2['STATUS'];
											if($STATUS_SUB == "INACTIVE"){
												$color = "style='color:red; font-weight:bold;'";
											}elseif($STATUS_SUB == "ACTIVE"){
												$color = "";
											}

											$paramdelete2['id'] = $data2['ID'];
											$paramdelete2['url'] = base_url('kategori/deleterowsub');
											$SendDelete2 = base64_encode(json_encode($paramdelete2));

											$paramstatus2['id'] = $data2['ID'];
											$paramstatus2['status'] = $STATUS_SUB;
											$paramstatus2['url'] = base_url('kategori/statusrowsub');
											$SendStatus2 = base64_encode(json_encode($paramstatus2));
											
										?>
											<tr align="left">
												<td align="center"><?php echo $no2 ?></td>
												<td><?php echo $data2['NAME'] ?></td>
												<td><?php echo $data2['LABEL'] ?></td>
												<td align="center"><?php echo $STATUS_SUB ?></td>
												<td><?php echo $data2['CREATED_DATE'] ?></td>
												<td>
													<?php 
													if($STATUS_SUB == "ACTIVE"){
														$ICON = "fa fa-toggle-off";
														$BTN = "btn-info";
													}else{
														$ICON = "fa fa-toggle-on";
														$BTN = "btn-warning";
													}
													?>
													<a href="javascript:void(0)" title="Status" style="text-decoration: none;">
														<button class="btn <?php echo $BTN ?>" onclick="statusrow('<?php echo $SendStatus2 ?>', '<?php echo $STATUS_SUB ?>')">
															<i class="<?php echo $ICON ?>"></i>
														</button>
													</a>
													<a href="javascript:void(0)" title="Update Info" style="text-decoration: none;">
														<button class="btn btn-primary" onclick="modal('modal-md', 'Edit Data Sub Kategori', 'modal_sub_kategori', '<?php echo $SendEdit2; ?>', 'kategori/updaterowsub')">
															<i class="fa fa-edit"></i>
														</button>
													</a>
													<a href="javascript:void(0)" title="Delete" style="text-decoration: none;">
														<button class="btn btn-danger" onclick="deleterow('<?php echo $SendDelete2 ?>')">
															<i class="fa fa-trash"></i>
														</button>
													</a>
												</td>
											</tr>
										<?php
											$no2++;
										}
										?>
									</tbody>
								</table>
							</td>
						</tr>
					<?php 
						$i++;
						$no++;
					} 
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<style type="text/css">
	table.table-kategori thead tr td{
		font-weight: bold;
	}

	table.table-kategori tbody tr.sub-kategori.inactive{
		display: none;
	}

	table.table-kategori tbody tr.sub-kategori.active{
		display: table-row;
	} 
</style>

<script type="text/javascript">
	function showhidesub(i)
	{
		var table = $('table.table-kategori tbody').find('tr.sub-kategori');
		$.each(table, function(index, row){
		  	$('tr#sub-kategori-'+index).removeClass().addClass('sub-kategori inactive');
		  	$('#icon-sub-'+index).removeClass().addClass('fa fa-plus-circle');
		});

		var iconsub = $('#icon-sub-'+i);
		var data = iconsub.attr('data');
		if(data == "inactive"){
			$('tr#sub-kategori-'+i).removeClass().addClass('sub-kategori active');
			iconsub.removeClass().addClass('fa fa-minus-circle');
			iconsub.attr({'data':'active'});
		}else{
			$('tr#sub-kategori-'+i).removeClass().addClass('sub-kategori inactive');
			iconsub.removeClass().addClass('fa fa-plus-circle');
			iconsub.attr({'data':'inactive'});
		}
	}
</script>