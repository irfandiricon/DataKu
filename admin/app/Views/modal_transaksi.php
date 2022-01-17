<?php 
$Rows = isset($rows) ? $rows:array();
?>
<div class="table-responsive">
	<table class="table table-transaksi table-bordered">
		<thead>
			<tr>
				<td width="50" style="text-align: center;">NO</td>
				<td width="180" style="text-align: center;">TANGGAL</td>
				<td width="150" style="text-align: center;">ID TRANSAKSI</td>
				<td width="200">ID PELANGGAN</td>
				<td width="200">SERIAL NUMBER (SN)</td>
				<td>STATUS</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			foreach($Rows as $data){
				if(in_array($data['STATUS_TRANSAKSI'], array("1","00"))){
					$style = "style='color:green;text-align: left; font-weight: 600;'";
				}else{
					$style = "style='color:red; font-weight:600;text-align: left;'";
				}
			?>
				<tr>
					<td style="text-align: center;"><?php echo $i ?></td>
					<td style="text-align: center;"><?php echo date('d-m-Y H:i:s', strtotime($data['CREATED_DATE'])) ?></td>
					<td style="text-align: center;"><?php echo $data['ID_TRANSAKSI'] ?></td>
					<td><?php echo $data['NO_PELANGGAN'] ?></td>
					<td><?php echo $data['SN']; ?></td>
					<td <?php echo $style ?>><?php echo $data['PESAN'] ?></td>
				</tr>
			<?php
			$i++;
			}
			?>
		</tbody>
	</table>	
</div>

<script type="text/javascript">
	$(function(){
		$('.table-transaksi').DataTable();
	});
</script>