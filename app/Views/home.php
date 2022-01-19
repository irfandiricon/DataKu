<?php 
$Kategori = isset($Data['kategori']) ? $Data['kategori']:array();
foreach($Kategori as $data)
{
	$NAME = isset($data->NAME) ? $data->NAME:"";
	$SUB = isset($data->SUB) ? $data->SUB:"";
?>
<div class="row bg-container" style="padding-top: 40px;">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="text-align: center;">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0; text-align: center;">
				<h5><strong><?php echo $NAME ?></strong></h5>
				<hr style="border-bottom: 3px solid #1461ae; width: 70px; margin-top: 0;">
			</div>
		</div>
		<div class="row" style="text-align:center;">
		<?php 
		foreach($SUB as $data2)
		{
			$NAME_SUB = isset($data2->NAME) ? $data2->NAME:"";	
			$ICON = isset($data2->ICON) ? $data2->ICON:"";	
			$TITLE_LABEL = isset($data2->TITLE_LABEL) ? $data2->TITLE_LABEL:"";	
			$LABEL = isset($data2->LABEL) ? $data2->LABEL:"";	
			$URL = isset($data2->URL) ? $data2->URL:"";

			if($TITLE_LABEL == "ICON"){
				$classbtn = "btn-info";
			}else{
				$classbtn = "btn-light";
			}
		?>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6" style="padding: 10px;">
				<button class="btn btn-menu <?php echo $classbtn ?> open-preloader" data="<?php echo $URL ?>">
					<?php 
					if($TITLE_LABEL == "ICON"){
					?>
						<i class="<?php echo $LABEL ?>"></i>
					<?php
					}else{
					?>
						<img src="<?php echo base_url('assets')."/".$LABEL ?>" style="width: 100%;">
					<?php
					}
					?>
				</button><br>
				<label style="padding-top: 10px;"><?php echo $NAME_SUB ?></label>
			</div>
		<?php
		}
		?>
		</div>
	</div>
</div>
<?php
}
?>

<style type="text/css">
	.bg-container{
		background-color: transparent;
	}

	.btn-menu{
		width: 70px  !important;
		height: 70px !important;
		padding: 0;
		border: none;
	}

	.btn-menu i{
		font-size: 30px;
	}

	.btn-light{
		background-color: transparent !important;
		border-color: none !important;
	}
</style>