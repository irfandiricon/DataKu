<!-- Modal -->
<?php 
$TITLE = isset($_POST['title']) ? $_POST['title']:"";
$FILE = isset($_POST['file']) ? $_POST['file']:"";
$DATA = isset($_POST['rows']) ? $_POST['rows']:array();
$MODAL = isset($_POST['modal']) ? $_POST['modal']:"";
$ACTION = isset($_POST['action']) ? $_POST['action']:"";
$actionform = base_url($ACTION);
?>
<div class="modal-dialog <?php echo $MODAL?>" role="document">
	<div class="modal-content">
		<form method="post" action="javascript:void(0)" data-url="<?php echo $actionform ?>" id="formData" name="formData">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; ">
					<?php echo $TITLE;?>
				</h5>
				<div align="center" id="circle-close-modal" class="btn btn-secondary" data-dismiss="modal" style="border: none;">
					<i class="fa fa-times-circle" style="font-size: 26px;"></i>
				</div>
			</div>
			<div class="modal-body" style="overflow-y: scroll;max-height: 400px;">
				<?php echo view("$FILE", $DATA);?>
			</div>
			<div class="modal-footer">
				<?php 
				if(!empty($ACTION)){
				?>
					<button type="button" class="btn btn-info" id="submit" onclick="submitform()">Save</button>
				<?php } ?>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</form>
	</div>
</div>