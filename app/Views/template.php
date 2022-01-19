<?php 
$HOST = $_SERVER['HTTP_HOST'];
$PAGE = $_SERVER['REQUEST_URI'];
$PROTOCOL = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
?>
<!DOCTYPE html>
<html>
<head>
	<title>DataKu</title>
	<meta charset="utf-8">
    <meta name="author" content="SoapTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/image/logo.png" type="image/png">
	<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/jquery-ui/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/OwlCarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/OwlCarousel2/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/OwlCarousel2/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/Josefin_Sans/static/style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap-fileinput/css/fileinput-rtl.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap-fileinput/css/fileinput.css">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap-fileinput/css/fileinput.min.css">
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
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/jquery/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap/dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/JavaScript/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/fontawesome/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/OwlCarousel2/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/sweetalert.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap-fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap-fileinput/js/fileinput.min.js"></script>
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
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/JavaScript/md5.min.js"></script>
</head>
<?php
if($PROTOCOL == "https://"){
	$URL = "http://".$HOST.$PAGE;
?>
	<script type="text/javascript" src="<?php echo base_url('assets'); ?>/jquery/jquery-3.4.0.min.js"></script>
	<script type="text/javascript">
		$(function(){
			var Url = "<?php echo $URL ?>";
			window.location.href = Url;
		});
	</script>
<?php
	die();
}
?>
<body>
	<div class="preloader" style="display: none;background:black;text-align: center;padding-top: 200px;">
        <div class="loading">
            <div class="spinner-border text-info" role="status" style="width: 100px; height: 100px;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
	<div class="container" style="background-color: white; padding-left: 0; padding-right: 0;">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
				<?php 
					$param['SESSION_LOGIN'] = isset($SESSION_LOGIN) ? $SESSION_LOGIN: array();
					echo view('header', $param);
				?>
			</div>
		</div>

		<div class="row bg-container">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
				<?php 
				if(isset($IsBanner) == "Yes"){
					echo view('banner');
				}
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
				<?php 
				echo view($content);
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
				<?php 
				echo view('footer', $param);
				?>
			</div>
		</div>
	</div>

	<div class="modal" id="modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true"></div>
</body>
</html>

<!--Start of Tawk.to Script-->
<!--
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f8fbf75fd4ff5477ea79de5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
-->
<!--End of Tawk.to Script-->

<style type="text/css">
	body{
		font-family: 'JosefinSans-Regular';
		background-color: #1B1E23;
	}
</style>