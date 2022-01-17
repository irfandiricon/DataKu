<?php namespace App\Controllers;

use App\Models\Prabayar_model;

class Prabayar extends BaseController
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

        $PrabayarModel = New Prabayar_model();

        $param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['title'] = "Data Produk Prabayar";
		$param['content'] = "prabayar";

		$RetrieveProvider = $PrabayarModel->viewprovider();
		$param['Data']['provider'] = $RetrieveProvider;

		$RetrieveProduk = $PrabayarModel->viewproduk();
		$param['Data']['produk'] = $RetrieveProduk;

		return view('template', $param);
	}

	public function provider()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
        }

        $PrabayarModel = New Prabayar_model();

        $JSON = array();

		$RetrieveProvider = $PrabayarModel->viewprovider();
		foreach($RetrieveProvider as $row){
			$POST['ID'] = isset($row->ID) ? $row->ID:"";
			$POST['NAME'] = isset($row->NAME) ? $row->NAME:"";
			$POST['DESCRIPTION'] = isset($row->DESCRIPTION) ? $row->DESCRIPTION:"";
			$POST['STATUS'] = isset($row->STATUS) ? $row->STATUS:"";
			$JSON[] = $POST;
		}
		die(json_encode($JSON));
	}

	public function add()
	{
		$db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;
        $PrabayarModel = New Prabayar_model();

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

		$TYPE = isset($_POST['type']) ? $_POST['type']:array();
		$ID_PROVIDER = isset($_POST['provider']) ? $_POST['provider']:array();
		$CODE = isset($_POST['kode']) ? $_POST['kode']:array();
		$NAME = isset($_POST['nama']) ? $_POST['nama']:array();
		$HARGA_MODAL = isset($_POST['harga_modal']) ? $_POST['harga_modal']:array();
		$HARGA_JUAL = isset($_POST['harga_jual']) ? $_POST['harga_jual']:array();
		$DESCRIPTION = isset($_POST['deskripsi']) ? $_POST['deskripsi']:array();
		$CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

		$no = 1;
		for($i=0; $i<sizeof($ID_PROVIDER); $i++)
		{
			$param['ID'] = isset($ID_PROVIDER[$i]) ? $ID_PROVIDER[$i]:"";
			$param['CODE'] = isset($CODE[$i]) ? $CODE[$i]:"";
			$param['NAME'] = isset($NAME[$i]) ? $NAME[$i]:"";
			$param['HARGA_MODAL'] = isset($HARGA_MODAL[$i]) ? $HARGA_MODAL[$i]:"";
			$param['HARGA_JUAL'] = isset($HARGA_JUAL[$i]) ? $HARGA_JUAL[$i]:"";
			$param['DESCRIPTION'] = isset($DESCRIPTION[$i]) ? $DESCRIPTION[$i]:"";

			if(empty($param['CODE'])){
				$JSON['ERROR_CODE'] = "EC:001A";
				$JSON['ERROR_MESSAGE'] = "Kode produk pada baris ".$no." wajib diisi!";
				die(json_encode($JSON));
			}elseif(empty($param['NAME'])){
				$JSON['ERROR_CODE'] = "EC:002A";
				$JSON['ERROR_MESSAGE'] = "Nama produk pada baris ".$no." wajib diisi!";
				die(json_encode($JSON));
			}elseif(empty($param['HARGA_MODAL'])){
				$JSON['ERROR_CODE'] = "EC:003A";
				$JSON['ERROR_MESSAGE'] = "Harga modal pada baris ".$no." wajib diisi!";
				die(json_encode($JSON));
			}elseif(empty($param['HARGA_JUAL'])){
				$JSON['ERROR_CODE'] = "EC:004A";
				$JSON['ERROR_MESSAGE'] = "Harga jual pada baris ".$no." wajib diisi!";
				die(json_encode($JSON));
			}elseif(empty($param['DESCRIPTION'])){
				$JSON['ERROR_CODE'] = "EC:005A";
				$JSON['ERROR_MESSAGE'] = "Deskripsi produk pada baris ".$no." wajib diisi!";
				die(json_encode($JSON));
			}

			$RetrieveProduk = $PrabayarModel->viewproduk($param['CODE']);
			$CODE_PRODUK = isset($RetrieveProduk->CODE) ? $RetrieveProduk->CODE:"";
			if($CODE_PRODUK == $param['CODE']){
				$JSON['ERROR_CODE'] = "EC:006A";
				$JSON['ERROR_MESSAGE'] = "Kode produk pada baris ".$no." sudah tersedia, silahkan gunakan kode lain!";
				die(json_encode($JSON));
			}
			$no++;
		}

		for($i=0; $i<sizeof($ID_PROVIDER); $i++)
		{
			$paraminsert['TYPE'] = isset($TYPE[$i]) ? $TYPE[$i]:"";
			$paraminsert['ID_PROVIDER'] = isset($ID_PROVIDER[$i]) ? $ID_PROVIDER[$i]:"";
			$paraminsert['CODE'] = isset($CODE[$i]) ? $CODE[$i]:"";
			$paraminsert['NAME'] = isset($NAME[$i]) ? $NAME[$i]:"";
			$paraminsert['HARGA_MODAL'] = str_replace(".","", isset($HARGA_MODAL[$i]) ? $HARGA_MODAL[$i]:"");
			$paraminsert['HARGA_JUAL'] = str_replace(".","", isset($HARGA_JUAL[$i]) ? $HARGA_JUAL[$i]:"");
			$paraminsert['DESCRIPTION'] = isset($DESCRIPTION[$i]) ? $DESCRIPTION[$i]:"";
			$paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
        	$paraminsert['CREATED_BY'] = $CREATED_BY;

			$Retrieve = $db->table('MS_PRODUK_PRABAYAR')->insert($paraminsert);

	        if(!$Retrieve){
	            $ERROR_MESSAGE = "Gagal menyimpan data !";
	            $ERROR_CODE = "EC:002A";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }
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

        $PrabayarModel = New Prabayar_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $param['ID_PROVIDER'] = isset($_POST['provider']) ? $_POST['provider']:"";
		$IN_CODE = isset($_POST['code']) ? $_POST['code']:"";
		$param['NAME'] = isset($_POST['name']) ? $_POST['name']:"";
		$param['HARGA_MODAL'] = str_replace(".","", isset($_POST['harga_modal']) ? $_POST['harga_modal']:"");
		$param['HARGA_JUAL'] = str_replace(".","", isset($_POST['harga_jual']) ? $_POST['harga_jual']:"");
		$param['DESCRIPTION'] = isset($_POST['description']) ? $_POST['description']:"";
		$CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($IN_CODE)){
			$JSON['ERROR_CODE'] = "EC:001A";
			$JSON['ERROR_MESSAGE'] = "Kode produk wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['NAME'])){
			$JSON['ERROR_CODE'] = "EC:002A";
			$JSON['ERROR_MESSAGE'] = "Nama produk wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['HARGA_MODAL'])){
			$JSON['ERROR_CODE'] = "EC:003A";
			$JSON['ERROR_MESSAGE'] = "Harga modal wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['HARGA_JUAL'])){
			$JSON['ERROR_CODE'] = "EC:004A";
			$JSON['ERROR_MESSAGE'] = "Harga jual wajib diisi!";
			die(json_encode($JSON));
		}elseif(empty($param['DESCRIPTION'])){
			$JSON['ERROR_CODE'] = "EC:005A";
			$JSON['ERROR_MESSAGE'] = "Deskripsi produk wajib diisi!";
			die(json_encode($JSON));
		}

		$RetrieveProduk = $PrabayarModel->viewproduk($IN_CODE);
		$CODE = isset($RetrieveProduk->CODE) ? $RetrieveProduk->CODE:"";
		if($CODE != $IN_CODE){
			$param['CODE'] = $IN_CODE;
		}

        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $PrabayarModel->update($ID ,$param);

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

        $PrabayarModel = New Prabayar_model();
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

        $Retrieve = $PrabayarModel->update($ID ,$param);

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

        $PrabayarModel = New Prabayar_model();

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

        $Retrieve = $PrabayarModel->update($ID ,$param);

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