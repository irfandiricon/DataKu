<?php namespace App\Controllers;
use App\Models\Contactus_model;
use Config\Custom;
use App\Libraries\Service;

class Contactus extends BaseController
{
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

        $param = array();
        $param['cssName'] = "Css/public.css:Css/home.css";
        $param['jsName'] = "JavaScript/public.js";
        $param['content'] = "contactus";
        $param['SESSION_LOGIN'] = $SESSION_LOGIN;

		return view('template', $param);
	}

	public function send()
	{
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        $CREATED_BY = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"SYSTEM";

		$ContactusModel = New Contactus_model();
		$Service = New Service();

        $VALID_EMAIL = "/^([\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/";
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";

		$TICKET_ID = $Service->generateTicet();

		$NAME = isset($_POST['name']) ? $_POST['name']:"";
		$NO_HP = isset($_POST['no_hp']) ? $_POST['no_hp']:"";
		$EMAIL = isset($_POST['email']) ? $_POST['email']:"";
		$TITLE = isset($_POST['title']) ? $_POST['title']:"";
		$MESSAGE = isset($_POST['message']) ? $_POST['message']:"";

		if(empty($NAME)){
			$JSON['ERROR_CODE'] = "EC:001A";
			$JSON['ERROR_MESSAGE'] = "Nama lengkap wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($NO_HP)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "No HP wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $NO_HP)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "No HP tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($EMAIL)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Email wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_EMAIL, $EMAIL)){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Email tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($TITLE)){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "Judul wajib diisi!";
            die(json_encode($JSON));
        }elseif(empty($MESSAGE)){
            $JSON['ERROR_CODE'] = "EC:007A";
            $JSON['ERROR_MESSAGE'] = "Pesan wajib diisi!";
            die(json_encode($JSON));
        }

		$paraminsert['TICKET_NUMBER'] = $TICKET_ID;
		$paraminsert['NAME'] = $NAME;
		$paraminsert['NO_HP'] = $NO_HP;
		$paraminsert['EMAIL'] = $EMAIL;
		$paraminsert['TITLE'] = $TITLE;
		$paraminsert['MESSAGE'] = $MESSAGE;
        $paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
		$paraminsert['CREATED_BY'] = $CREATED_BY;

        $Retrieve =  $ContactusModel->insert($paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data!";
            $ERROR_CODE = "EC:008A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Pesan anda berhasil terkirim, silahkan cek email dan pesan anda secara berkala apabila tim kami telah mengabari.";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YED");
        die(json_encode($JSON));
	}
}
