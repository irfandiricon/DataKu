<?php 
$HOST = $_SERVER['HTTP_HOST'];
$PAGE = $_SERVER['REQUEST_URI'];
$PROTOCOL = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$param['SESSION_LOGIN'] = isset($SESSION_LOGIN) ? $SESSION_LOGIN: array();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DataKu</title>
	<meta charset="utf-8">
    <meta name="author" content="SoapTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="469965144772-im7bs20t1bghdf0f1pmrg0boervs8cg6.apps.googleusercontent.com">
    
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
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap-fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets'); ?>/bootstrap-fileinput/js/fileinput.min.js"></script>

    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
   <!--  <script type="text/javascript" src="https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/firebasejs/9.6.8/firebase-analytics.js"></script> -->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/firebasejs/9.6.8/firebase-auth.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/firebasejs/9.6.8/firebase-firestore.js"></script> -->

    <!-- <script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.11.0/firebase-firestore.js"></script -->

	<script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
	<script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-analytics.js"></script>
	<script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>
	<script defer src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>
	<!-- <script defer src="./init-firebase.js"></script> -->

 	
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
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
			<?php 
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

	<div class="container-fluid" style="padding-right: 0; padding-left: 0;">
		<div class="row" style="padding-top: 80px; background-color: white; position: fixed; width: 100%; z-index: 1; border: 1px solid #ddd;">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
				<p style="color: red; font-weight: bold;">Website ini masih dalam tahap pengembangan</p>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" align="right" style="color: red; font-weight: bold;">
				<span>Hadir dalam : </span><span class="countdown" id="countdown"></span>
			</div>
		</div>
		<div class="row" style="margin-bottom: 100px; padding-top: 110px;">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0; padding-top: 30px;">
				<?php 
				echo view($content);
				?>
			</div>
		</div>
	</div>

	<?php 
	if(isset($IsFooter) == "Yes"){
	?>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-left: 0; padding-right: 0;">
				<?php 
				echo view('footer', $param);
				?>
			</div>
		</div>
	<?php } ?>

	<?php 
	if(!empty($param['SESSION_LOGIN'])){
	?>
	<div class="row footer-mobile t-center fixed-bottom" style="background-color: #ddd;">
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 padtop-10 btn btn-info open-preloader" style="border-radius: 0; border: 1px solid #ddd;" onclick="window.location.href = '<?php echo base_url() ?>/home'">
			<i class="fa fa-home"></i><br>
			<span style="font-size: 14px;">Beranda</span>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 padtop-10 btn btn-info open-preloader" style="border-radius: 0; border: 1px solid #ddd;" onclick="window.location.href = '<?php echo base_url() ?>/riwayat-transaksi'">
			<i class="fa fa-sync"></i><br>
			<span style="font-size: 14px;">Riwayat</span>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 padtop-10 btn btn-info open-preloader" style="border-radius: 0; border: 1px solid #ddd;" onclick="window.location.href = '<?php echo base_url() ?>/notifikasi'">
			<i class="fa fa-bell"></i><br>
			<span style="font-size: 14px;">Notifikasi</span>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 padtop-10 btn btn-info open-preloader" style="border-radius: 0; border: 1px solid #ddd;" onclick="window.location.href = '<?php echo base_url() ?>/akun'">
			<i class="fa fa-user"></i><br>
			<span style="font-size: 14px;">Akun</span>
		</div>
	</div>
	<?php } ?>

	<div class="modal" id="modal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true"></div>

	<script type="text/javascript">
		$(function(){
			$('.open-preloader').click(function(){
				$('.preloader').fadeIn();
			});
		});
	</script>

	<script type="text/javascript">
		var countDownDate = new Date("Apr 01, 2022 00:00:00").getTime();
		var x = setInterval(function() {
		var now = new Date().getTime();
		var distance = countDownDate - now;

		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		document.getElementById("countdown").innerHTML = days + " Hari, " + addzero(hours) + " : "+ addzero(minutes) + " : " + addzero(seconds);

		if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdown").innerHTML = "EXPIRED";
		}
		}, 1000);

		function addzero(x){
			y=(x>9)?x:'0'+x;
			return y;
		}
	</script>
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
		/*background-color: #1B1E23;*/
	}
</style>