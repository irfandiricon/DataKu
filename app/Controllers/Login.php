<?php namespace App\Controllers;
use App\Models\Auth_model;
use Config\Custom;
use App\Libraries\Service;
use CodeIgniter\Cookie\Cookie;
use DateTime;
class Login extends BaseController
{
	protected $session;

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }

	public function index()
	{ 
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(!empty($SESSION_LOGIN)){
            return redirect()->to(base_url());
        }

        $param = array();
		$param['cssName'] = "Css/public.css:Css/home.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "login";
        $param['SESSION_LOGIN'] = $SESSION_LOGIN;

		return view('template', $param);
	}

    public function plogin()
    {
        $AuthModel = new Auth_model();
        $Service = new Service();
        $CustomConfig = new Custom();
        $Apps = $CustomConfig->apps;

        $VALID_EMAIL = "/^([\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/";
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";
        $VALID_PASSWORD = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";

        $EMAIL = isset($_POST['email']) ? $_POST['email']:"";
        $PASSWORD = isset($_POST['password']) ? $_POST['password']:"";
        $CBOX = isset($_POST['cbox']) ? $_POST['cbox']:"";

        if(empty($EMAIL)){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "Email wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_EMAIL, $EMAIL)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "Email tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "Password wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Password tidak valid!";
            die(json_encode($JSON));
        }

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $EMAIL);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu";
            die(json_encode($JSON));
        }

        $Password = isset($CheckUser->PASSWORD) ? $CheckUser->PASSWORD:"";
        $REFERRAL_ID = isset($CheckUser->REFERRAL_ID) ? $CheckUser->REFERRAL_ID:"";
        $STATUS = isset($CheckUser->STATUS) ? $CheckUser->STATUS:"";

        if(md5($REFERRAL_ID.$PASSWORD) != $Password){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "Password anda salah, silahkan coba kembali atau hubungi administrator";
            die(json_encode($JSON));
        }

        if($STATUS == "INACTIVE"){
            $JSON['ERROR_CODE'] = "EC:007A";
            $JSON['ERROR_MESSAGE'] = "Akun anda sudah tidak aktif, silahkan hubungi administrator";
            die(json_encode($JSON));
        }

        $uCookies = $CustomConfig->uCookies;
        $pCookies = $CustomConfig->pCookies;
        $Token = md5($uCookies.$pCookies);

        if($CBOX == "on"){
            $cookie = new Cookie(
                'remember_token',$Token,
                [
                    'expires'  => new DateTime('+2 hours'),
                    'prefix'   => '__Secure-',
                    'path'     => '/',
                    'domain'   => '',
                    'secure'   => true,
                    'httponly' => true,
                    'raw'      => false,
                    'samesite' => Cookie::SAMESITE_LAX,
                ]
            );
        }

        $param['ID'] = isset($CheckUser->ID) ? $CheckUser->ID:"";
        $param['NAME'] = isset($CheckUser->NAME) ? $CheckUser->NAME:"";
        $param['EMAIL'] = isset($CheckUser->EMAIL) ? $CheckUser->EMAIL:"";
        $param['NO_HP'] = isset($CheckUser->NO_HP) ? $CheckUser->NO_HP:"";
        $param['IS_AGEN'] = isset($CheckUser->IS_AGEN) ? $CheckUser->IS_AGEN:"";
        $param['REFERRAL_ID'] = $REFERRAL_ID;
        $param['STATUS'] = $STATUS;

        $_SESSION['SESSION_LOGIN'][$Apps] = $param;

        $JSON['ERROR_CODE'] = "EC:0000";
        $JSON['ERROR_MESSAGE'] = "Sukses";
        $JSON['UrlPage'] = isset($_SESSION['_ci_previous_url']) ? $_SESSION['_ci_previous_url']: base_url();
        die(json_encode($JSON));
    }

    public function logout()
    {
        $CustomConfig = new Custom();
        session()->remove("SESSION_LOGIN");
        return redirect()->to(base_url());
    }
}