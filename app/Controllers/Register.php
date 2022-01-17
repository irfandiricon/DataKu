<?php namespace App\Controllers;
use App\Models\Auth_model;
use Config\Custom;
use App\Libraries\Service;

class Register extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $param = array();
		$param['cssName'] = "Css/public.css:Css/home.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "register";

		return view('template', $param);
    }

    public function pregister()
	{
		$AuthModel = new Auth_model();
		$Service = new Service();

		$VALID_EMAIL = "/^([\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/";
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";
        $VALID_PASSWORD = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";

		$ReferralId = $Service->generateReferral();

		$NAME = isset($_POST['name']) ? $_POST['name']:"";
		$NO_HP = isset($_POST['no_hp']) ? $_POST['no_hp']:"";
		$EMAIL = isset($_POST['email']) ? $_POST['email']:"";
		$PASSWORD = isset($_POST['password']) ? $_POST['password']:"";
		$CPASSWORD = isset($_POST['cpassword']) ? $_POST['cpassword']:"";

		if(empty($NAME)){
			$JSON['ERROR_CODE'] = "EC:001A";
			$JSON['ERROR_MESSAGE'] = "Nama lengkap wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($NO_HP)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "No handphone wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $NO_HP)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "No handphone tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($EMAIL)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Email wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_EMAIL, $EMAIL)){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Email tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "Password wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:007A";
            $JSON['ERROR_MESSAGE'] = "Password tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($CPASSWORD)){
            $JSON['ERROR_CODE'] = "EC:008A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi password wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $CPASSWORD)){
            $JSON['ERROR_CODE'] = "EC:009A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi password tidak valid!";
            die(json_encode($JSON));
        }elseif($PASSWORD != $CPASSWORD){
        	$JSON['ERROR_CODE'] = "EC:010A";
            $JSON['ERROR_MESSAGE'] = "Password tidak sama!";
            die(json_encode($JSON));
        }

        $CheckEmail = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $EMAIL);
        if(!empty($CheckEmail)){
        	$JSON['ERROR_CODE'] = "EC:011A";
            $JSON['ERROR_MESSAGE'] = "Email sudah terdaftar!";
            die(json_encode($JSON));
        }

        $CheckPhone = $AuthModel->CheckRow("CUSTOMER", "NO_HP", $NO_HP);
        if(!empty($CheckPhone)){
        	$JSON['ERROR_CODE'] = "EC:012A";
            $JSON['ERROR_MESSAGE'] = "No handphone sudah terdaftar!";
            die(json_encode($JSON));
        }

		$paraminsert['NAME'] = $NAME;
		$paraminsert['EMAIL'] = $EMAIL;
		$paraminsert['PASSWORD'] = md5($ReferralId.$PASSWORD);
		$paraminsert['NO_HP'] = $NO_HP;
		$paraminsert['REFERRAL_ID'] = $ReferralId;
		$paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');

        $Retrieve =  $AuthModel->insert($paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data!";
            $ERROR_CODE = "EC:011A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Registrasi anda berhasil. Silahkan klik link konfirmasi yang telah kami kirimkan ke email anda.";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YED");
        die(json_encode($JSON));
	}
}