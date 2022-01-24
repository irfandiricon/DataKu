<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h3><strong>Riwayat Transaksi</strong></h3>
			</div>
		</div>
		
		<form id="formSearch" name="formSearch" data-url="<?php echo base_url('account/searchhistory')?>" method="post" action="javascript:void(0)">
			<div class="row padbottom-20">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
					<input type="name" name="start_date" id="start_date" class="form-control" value="<?php echo date('01 M Y')?>">
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
					<input type="name" name="end_date" id="end_date" class="form-control" value="<?php echo date('t M Y')?>">
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 padtop-10">
					<button class="btn btn-primary btn-block" type="submit">
						<i class="fa fa-search" style="padding-right: 3px;"></i> Cari Data
					</button>
				</div>
			</div>
		</form>

		<div id="table-result">
			<?php 
			$paramhistory['History'] = $History;
			echo view('history_transaksi', $paramhistory);
			?>
		</div>
	</div>
</div>


<style type="text/css">
	.ui-datepicker .ui-datepicker-title select{
		font-size: 1em !important;
		height: auto !important;
	}
</style>

<script type="text/javascript">
	$(function(){
		$('#formSearch').submit(function(e){
			e.preventDefault();
			var data = $(this).serialize();
			var url = $(this).data('url');
			$.ajax({
				url : url,
				data : data,
				cache : false,
				type : 'post',
				beforeSend : function(){
					$('.preloader').fadeIn();
				},
				success : function(res){
					$('.preloader').fadeOut();
					$('#table-result').html(res);
				}
			});
		});
	});

	$('#start_date').datepicker({
        changeYear : true,
        changeMonth : true,
        dateFormat: 'd M yy',
        maxDate : 'today',
        onSelect: function(date){
            var selectedDate = new Date(date);
            var msecsInADay = 86400000;
            var endDate = new Date(selectedDate.getTime()-1 + msecsInADay);
            $("#end_date").datepicker( "option", "minDate", endDate );
        }
    });
    
    $('#end_date').datepicker({
        changeYear : true,
        changeMonth : true,
        dateFormat: 'd M yy',
        maxDate : 'today',
    });
</script>