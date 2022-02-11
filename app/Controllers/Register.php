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
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
        die(json_encode($JSON));
	}

    public function gmail(){
        $AuthModel = new Auth_model();
        $Service = new Service();

        $ReferralId = $Service->generateReferral();

        $email = isset($_POST['email']) ? $_POST['email']:"";
        $fullname = isset($_POST['fullname']) ? $_POST['fullname']:"";
        $photoURL = isset($_POST['photoURL']) ? $_POST['photoURL']:"";
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber']:"";
        $emailVerified = isset($_POST['emailVerified']) ? $_POST['emailVerified']:"";

        if(empty($email)){
            $JSON = array("ERROR_CODE"=>"EC:001A", "ERROR_MESSAGE"=>$this->lang->line('req_email'));
            die(json_encode($JSON));
        }

        $CheckEmail = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $email);
        if(!empty($CheckEmail)){
            $JSON['ERROR_CODE'] = "EC:011A";
            $JSON['ERROR_MESSAGE'] = "Email sudah terdaftar!";
            die(json_encode($JSON));
        }

        $paraminsert['NAME'] = $fullname;
        $paraminsert['EMAIL'] = $email;
        $paraminsert['NO_HP'] = $phoneNumber;
        $paraminsert['REFERRAL_ID'] = $ReferralId;
        $paraminsert['REGISTERED_BY'] = "GMAIL";
        $paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
       
        $Retrieve =  $AuthModel->insert($paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data!";
            $ERROR_CODE = "EC:011A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Registrasi anda berhasil";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
        die(json_encode($JSON));
    }

    public function facebook(){
        $email = isset($_POST['email']) ? $_POST['email']:"";
        $fullname = isset($_POST['fullname']) ? $_POST['fullname']:"";
        $photoURL = isset($_POST['photoURL']) ? $_POST['photoURL']:"";
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber']:"";
        $emailVerified = isset($_POST['emailVerified']) ? $_POST['emailVerified']:"";

        if(empty($email)){
            $JSON = array("ERROR_CODE"=>"EC:001A", "ERROR_MESSAGE"=>"Email is required!");
            die(json_encode($JSON));
        }

        $paramCheckin['EMAIL'] = $email;
        $paramCheckin['PHONE_NUMBER'] = $phoneNumber;

        $countName = str_word_count($fullname);
        if($countName == 1){
            $paramCheckin['FIRST_NAME'] = $fullname;
            $paramCheckin['LAST_NAME'] = "";
        }else{
            $explode = explode(" ", $fullname);
            $paramCheckin['FIRST_NAME'] = $explode[0];
            $LAST_NAME = '';
            for($i=1;$i<$countName;$i++){
                $LAST_NAME .= $explode[$i]." ";
            }

            $paramCheckin['LAST_NAME'] = $LAST_NAME;
        }

        $CheckMember = $this->Login_model->checkMemberFacebook($paramCheckin);
        $ERROR_CODE = $CheckMember['ERROR_CODE'];
        $ERROR_MESSAGE = $CheckMember['ERROR_MESSAGE'];

        if($ERROR_CODE != "EC:0000"){
            $JSON = array("ERROR_CODE"=>$ERROR_CODE, "ERROR_MESSAGE"=>$ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $DATA = $CheckMember['DATA'];
        $SESSION_LOGIN['SUFFIX'] = isset($DATA['SUFFIX']) ? $DATA['SUFFIX']:"";
        $SESSION_LOGIN['USERNAME'] = isset($DATA['USERNAME']) ? $DATA['USERNAME']:"";
        $SESSION_LOGIN['FIRST_NAME'] = isset($DATA['FIRST_NAME']) ? $DATA['FIRST_NAME']:"";
        $SESSION_LOGIN['LAST_NAME'] = isset($DATA['LAST_NAME']) ? $DATA['LAST_NAME']:"";
        $SESSION_LOGIN['BIRTH_DATE'] = isset($DATA['BIRTH_DATE']) ? $DATA['BIRTH_DATE']:"";
        $SESSION_LOGIN['NATIONALITY'] = isset($DATA['NATIONALITY']) ? $DATA['NATIONALITY']:"";
        $SESSION_LOGIN['CODE_PHONE'] = isset($DATA['CODE_PHONE']) ? $DATA['CODE_PHONE']:"";
        $SESSION_LOGIN['MOBILE_PHONE'] = isset($DATA['MOBILE_PHONE']) ? $DATA['MOBILE_PHONE']:"";
        $SESSION_LOGIN['EMAIL'] = isset($DATA['EMAIL']) ? $DATA['EMAIL']:"";
        $SESSION_LOGIN['REGISTERED_BY'] = isset($DATA['REGISTERED_BY']) ? $DATA['REGISTERED_BY']:"";
        $SESSION_LOGIN['VERIFICATION'] = isset($DATA['VERIFICATION']) ? $DATA['VERIFICATION']:"";
        $SESSION_LOGIN['CREATED_DATE'] = isset($DATA['CREATED_DATE']) ? $DATA['CREATED_DATE']:"";
        $SESSION_LOGIN['LAST_LOGIN'] = isset($DATA['LAST_LOGIN']) ? $DATA['LAST_LOGIN']:"";

        $_SESSION['SESSION_LOGIN'] = $SESSION_LOGIN;

        $JSON = array("ERROR_CODE"=>$ERROR_CODE, "ERROR_MESSAGE"=>$ERROR_MESSAGE);
        die(json_encode($JSON));
    }
}