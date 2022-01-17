<?php 
$paramadd = array();
$SendAdd = base64_encode(json_encode($paramadd));

$DataUser = $Data['users'];
?>
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<button class="btn btn-info" onclick="modal('modal-md', 'Tambah Data Pengguna', 'modal_user', '<?php echo $SendAdd; ?>', 'users/add')">
			<i class="fa fa-plus"></i> Tambah
		</button>
	</div>
</div>
<div class="row" style="padding-top: 10px;">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="table-responsive">
			<table class="table table-bordered table-users">
				<thead>
					<tr>
						<th width="200">USERNAME</th>
						<th>NAMA LENGKAP</th>
						<!-- <th>No. HP</th>
						<th>EMAIL</th> -->
						<th width="100">STATUS</th>
						<th width="200">TANGGAL BUAT</th>
						<th width="150"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($DataUser as $data){
						$paramupdate['Data'] = $data;
						$SendEdit = base64_encode(json_encode($paramupdate));

						$paramupdatepass['UPDATEPASSWORD'] = "YES";
						$paramupdatepass['Data'] = $data;
						$SendEditPassword = base64_encode(json_encode($paramupdatepass));

						$status = $data->STATUS;
						if($status == 0){
							$STATUS = "NON AKTIF";
							$color = "style='color:red; font-weight:bold;'";
						}elseif($status == 1){
							$STATUS = "AKTIF";
							$color = "";
						}elseif($status == 3){
							$STATUS = "BLOKIR";
							$color = $color = "style='background-color:#ffa700;color:black;'";
						}

						$paramdelete['username'] = $data->USERNAME;
						$paramdelete['url'] = base_url('users/deleterow');
						$SendDelete = base64_encode(json_encode($paramdelete));
					?>
						<tr>
							<td><?php echo $data->USERNAME; ?></td>
							<td><?php echo $data->NAME; ?></td>
							<!-- <td><?php echo $data->NOHP; ?></td>
							<td><?php echo $data->EMAIL; ?></td> -->
							<td align="center" <?php echo $color; ?>><?php echo $STATUS; ?></td>
							<td><?php echo date('d M Y H:i:s', strtotime($data->CREATED_DATE)); ?></td>
							<td style="text-align: center;">
								<a href="javascript:void(0)" title="Update Info" style="text-decoration: none;">
									<button class="btn btn-primary" onclick="modal('modal-md', 'Edit Data Pengguna', 'modal_user', '<?php echo $SendEdit; ?>', 'users/updateinfo')">
										<i class="fa fa-edit"></i>
									</button>
								</a>
								<a href="javascript:void(0)" title="Update Password" style="text-decoration: none;">
									<button class="btn btn-dark" onclick="modal('modal-md', 'Update Password', 'modal_user', '<?php echo $SendEditPassword; ?>', 'users/updatepassword')">
										<i class="fa fa-eye-slash"></i>
									</button>
								</a>
								<a href="javascript:void(0)" title="Delete" style="text-decoration: none;">
									<button class="btn btn-danger" onclick="deleterow('<?php echo $SendDelete ?>')">
										<i class="fa fa-trash"></i>
									</button>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>