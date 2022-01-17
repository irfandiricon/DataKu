<?php namespace App\Controllers;

use App\Models\Pascabayar_model;

class Pascabayar extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
        }

        $PascabayarModel = New Pascabayar_model();

        $param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['title'] = "Data Produk Pascabayar";
		$param['content'] = "pascabayar";

		$RetrieveProduk = $PascabayarModel->viewproduk();
		$param['Data']['produk'] = $RetrieveProduk;

		return view('template', $param);
	}

	public function add()
	{
		$db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;
        $PascabayarModel = New Pascabayar_model();

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

		$TYPE = isset($_POST['type']) ? $_POST['type']:array();
		$CODE = isset($_POST['code']) ? $_POST['code']:array();
		$DESCRIPTION = isset($_POST['description']) ? $_POST['description']:array();
		$CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

		$param['CODE'] = isset($CODE) ? $CODE:"";
		$param['DESCRIPTION'] = isset($DESCRIPTION) ? $DESCRIPTION:"";

		if(empty($param['CODE'])){
			$JSON['ERROR_CODE'] = "EC:001A";
			$JSON['ERROR_MESSAGE'] = "Kode produk wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['DESCRIPTION'])){
			$JSON['ERROR_CODE'] = "EC:002A";
			$JSON['ERROR_MESSAGE'] = "Deskripsi produk wajib diisi!";
			die(json_encode($JSON));
		}

		$RetrieveProduk = $PascabayarModel->viewproduk($param['CODE']);
		$CODE_PRODUK = isset($RetrieveProduk->CODE) ? $RetrieveProduk->CODE:"";
		if($CODE_PRODUK == $param['CODE']){
			$JSON['ERROR_CODE'] = "EC:006A";
			$JSON['ERROR_MESSAGE'] = "Kode produk sudah tersedia, silahkan gunakan kode lain!";
			die(json_encode($JSON));
		}

		$paraminsert['TYPE'] = isset($TYPE) ? $TYPE:"";
		$paraminsert['CODE'] = isset($CODE) ? $CODE:"";
		$paraminsert['DESCRIPTION'] = isset($DESCRIPTION) ? $DESCRIPTION:"";
		$paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
    	$paraminsert['CREATED_BY'] = $CREATED_BY;

		$Retrieve = $db->table('MS_PRODUK_PASCABAYAR')->insert($paraminsert);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

		$ERROR_MESSAGE = "Data berhasil disimpan";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
	}

	public function updaterow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $PascabayarModel = New Pascabayar_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $param['TYPE'] = isset($_POST['type']) ? $_POST['type']:"";
		$IN_CODE = isset($_POST['code']) ? $_POST['code']:"";
		$param['DESCRIPTION'] = isset($_POST['description']) ? $_POST['description']:"";
		$CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($param['TYPE'])){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "Tipe produk wajib diisi!";
            die(json_encode($JSON));
        }elseif(empty($IN_CODE)){
			$JSON['ERROR_CODE'] = "EC:002A";
			$JSON['ERROR_MESSAGE'] = "Kode produk wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['DESCRIPTION'])){
			$JSON['ERROR_CODE'] = "EC:003A";
			$JSON['ERROR_MESSAGE'] = "Deskripsi produk wajib diisi!";
			die(json_encode($JSON));
		}

		$RetrieveProduk = $PascabayarModel->viewproduk($IN_CODE);
		$CODE = isset($RetrieveProduk->CODE) ? $RetrieveProduk->CODE:"";
		if($CODE != $IN_CODE){
			$param['CODE'] = $IN_CODE;
		}

        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $PascabayarModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function statusrow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $PascabayarModel = New Pascabayar_model();
        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $STATUS = isset($_POST['status']) ? $_POST['status']:"";

        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        if($STATUS == "ACTIVE"){
            $NEW_STATUS = "INACTIVE";
        }else{
            $NEW_STATUS = "ACTIVE";
        }
        $param['STATUS'] = $NEW_STATUS;
        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $PascabayarModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function deleterow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $PascabayarModel = New Pascabayar_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['STATUS'] = "INACTIVE";
        $param['DELETED_DATE'] = date('Y-m-d H:i:s');
        $param['DELETED_BY'] = $CREATED_BY;

        $Retrieve = $PascabayarModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil dihapus";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }
}