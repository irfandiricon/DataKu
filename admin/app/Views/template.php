<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>/assets/image/login.png">
		<title>Panel</title>
		<link href="<?php echo base_url(); ?>/assets/Admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/helper.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/lib/dropzone/dropzone.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/lib/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/lib/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/Admin/css/lib/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/OwlCarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet">
    	<link href="<?php echo base_url(); ?>/assets/OwlCarousel2/dist/assets/owl.theme.green.min.css" rel="stylesheet">
    	<link href="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.css" rel="stylesheet">
		<?php
    	if(!empty($cssName)){ 
		    $AddtionalCss = explode(":",$cssName);
		    for($i=0;$i<sizeof($AddtionalCss);$i++){
		    ?>
		    	<link rel="stylesheet" href="<?php echo base_url('assets'); ?><?php echo "/".$AddtionalCss[$i] ?>">
		    <?php
		    }
		}
	   	?>
	    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/bootstrap/js/popper.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/sidebarmenu.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/dropzone/dropzone.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/sweetalert.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>/assets/OwlCarousel2/dist/owl.carousel.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>/assets/jquery-ui/jquery-ui.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/Admin/js/lib/datatables/datatables-init.js"></script>
		<?php
	    if(!empty($jsName)){
		    $AddtionalJs = explode(":",$jsName);
		    for($i=0;$i<sizeof($AddtionalJs);$i++){
		    ?>
		    	<script type="text/javascript" src="<?php echo base_url('assets'); ?><?php echo "/".$AddtionalJs[$i] ?>"></script>
		    <?php
		    }
		}
	   	?>
	   	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>/assets/jquery/vue-2.5.16.js"></script> -->
	</head>
	<body>
		<style type="text/css">
			body{
				font-size: 14px !important;
			}	
		</style>

		<div class="preloader">
            <div class="loading">
               <img src="<?php echo base_url()?>/assets/image/loading.gif">
            </div>
        </div>

	    <?php
	        echo view("menu");
	    ?>
		<div class="fix-header fix-sidebar" style="overflow:hidden">
		    <div id="main-wrapper" >
		        <?php
		        	echo view("head");
		        ?>
		        <div class="page-wrapper" >
		            <div class="row page-titles" style="margin-bottom: 0px;">
		                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-self-center">
		                    <h5 class="text-primary" id="_title" style="font-weight: bold;">
		                    	<?php echo $title; ?>
		                    </h5>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		                   	<div class="card" style="margin-top: 0px;border-radius: 0px;">
		                   		<div class="card-body" style="border-radius: 0px;">
		                   			<?php
	                   					$params['Data'] = isset($Data) ? $Data:array();
							        	echo view($content, $params);
							        ?>
		                   		</div>
		                   	</div>
		                </div>
		            </div>
		            <div class="panel panel-default panel-heading" id="panel-content" style="padding-left:10px;padding-right:10px;"></div>
		            <footer class="footer" style="position: fixed !important; margin-bottom: 0; padding: 0; padding-left: 20px; padding-right: 20px; text-align: center; width: auto;">2021 &copy; All Reserved | IrCn</footer>
		        </div>
		    </div>
		</div>

		<div class="modal" id="modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true"></div>
	</body>
</html>
