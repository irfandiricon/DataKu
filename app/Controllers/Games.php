<?php namespace App\Controllers;
use App\Models\Auth_model;
use App\Models\Transaksi_model;
use App\Models\Logtransaksi_model;
use App\Models\Games_model;
use Config\Custom;
use App\Libraries\Service;

class Games extends BaseController
{
	function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }

	public function mobile_legends()
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url('masuk'));
        }

		$param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "games/mobile_legends";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "VOUCHER GAME"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "mobile-legends";
		return view('template', $param);
	}

	public function pubg()
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url('masuk'));
        }

		$param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "games/pubg";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "VOUCHER GAME"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "pubg";
		return view('template', $param);
	}

	public function view_price($TYPE = '')
	{
		$GamesModel = New Games_model();

		$USER_ID = isset($_POST['userid']) ? $_POST['userid']:"";
		$SERVER_ID = isset($_POST['serverid']) ? $_POST['serverid']:"";
		$Row = $GamesModel->view_price($TYPE);

		$POST = array();
		foreach($Row as $Result)
		{
			$param['CODE'] = isset($Result->CODE) ? $Result->CODE:"";
			$param['NAME'] = isset($Result->NAME) ? $Result->NAME:"";
			$param['DESCRIPTION'] = isset($Result->DESCRIPTION) ? $Result->DESCRIPTION:"";
			$param['HARGA_MODAL'] = isset($Result->HARGA_MODAL) ? $Result->HARGA_MODAL:"";
			$param['HARGA_JUAL'] = isset($Result->HARGA_JUAL) ? $Result->HARGA_JUAL:"";
			$POST[] = $param;
		}

		if(!empty($SERVER_ID)){
			$SERVER_ID = "|".$SERVER_ID;
		}

		$param['Data']['pricelist'] = $POST;
		$param['Data']['idpelanggan'] = $USER_ID.$SERVER_ID;
 
		return view('games/pricelist', $param);
	}

	public function proses()
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        $CREATED_BY = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"SYSTEM";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";
        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

		$Service = new Service();
		$GamesModel = New Games_model();
		$TransaksiModel = New Transaksi_model();
		$LogTransaksiModel = New Logtransaksi_model();
		$AuthModel = New Auth_model();

		$NUMBER = isset($_POST['number']) ? $_POST['number']:"";
		$CODE = isset($_POST['code']) ? $_POST['code']:"";

		$PIN1 = isset($_POST['pin1']) ? $_POST['pin1']:"";
		$PIN2 = isset($_POST['pin2']) ? $_POST['pin2']:"";
		$PIN3 = isset($_POST['pin3']) ? $_POST['pin3']:"";
		$PIN4 = isset($_POST['pin4']) ? $_POST['pin4']:"";

		$CheckUser = $AuthModel->CheckRow("CUSTOMER", "ID", $ID);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:000A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu!";
            die(json_encode($JSON));
        }

        $PIN_MERGER = $PIN1.$PIN2.$PIN3.$PIN4;
        $PIN_SESSION = isset($CheckUser->PIN) ? $CheckUser->PIN:"";
        $REFERRAL_SESSION = isset($CheckUser->REFERRAL_ID) ? $CheckUser->REFERRAL_ID:"";
        $PIN = md5($REFERRAL_SESSION.$PIN_MERGER);

        if($PIN != $PIN_SESSION){
        	$JSON['ERROR_CODE'] = "EC:000B";
            $JSON['ERROR_MESSAGE'] = "PIN anda tidak sesuai!";
            die(json_encode($JSON));
        }
        
		if(empty($CODE)){
            $ERROR_MESSAGE = "Silahkan pilih produk!";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        // $UrlProduk = base_url('api/produk')."/".$CODE;
        // $RetrieveProduk = json_decode(file_get_contents($UrlProduk));
        $RetrieveProduk = $GamesModel->view_produk($CODE);
        $HargaModalProduk = isset($RetrieveProduk->HARGA_MODAL) ? $RetrieveProduk->HARGA_MODAL:0; 
        $HargaJual = isset($RetrieveProduk->HARGA_JUAL) ? $RetrieveProduk->HARGA_JUAL:0; 
        $ID = isset($RetrieveProduk->ID) ? $RetrieveProduk->ID:0;

        $UrlBalance = base_url('pricelist/getprice/all');
        $RetrieveBalance = json_decode(file_get_contents($UrlBalance));
        $GetData = "";

        foreach($RetrieveBalance as $row){
        	$pulsa_code = isset($row->pulsa_code) ? $row->pulsa_code:"";
        	if($pulsa_code == $CODE){
        		$GetData = $row;
        	}
        }

        if(empty($GetData)){
        	$paramupdate['STATUS'] = "INACTIVE";
        	$paramupdate['UPDATED_DATE'] = date('Y-m-d H:i:s');
	        $paramupdate['UPDATED_BY'] = "SYSTEM";

	        $Retrieve = $GamesModel->update($ID, $paramupdate);
	        if($Retrieve){
	        	$ERROR_MESSAGE = "Produk ini sedang tidak tersedia!";
	            $ERROR_CODE = "EC:003A";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }
        }
        
	    $RefId = $Service->generateReffId();

	    $UrlRequest = base_url('api/request/')."/".$RefId."/".$NUMBER."/".$CODE;

	    $json = file_get_contents($UrlRequest);
        $array = array(json_decode(strip_tags($json)));
        $DataRequest = $array[0]->data;

        $Rc = isset($DataRequest->rc) ? $DataRequest->rc:"";
        $Message = isset($DataRequest->message) ? $DataRequest->message:"";
        $Status = isset($DataRequest->status) ? $DataRequest->status:0;
        if($Status == "2"){
	        if($Rc == "20"){
	        	$paramupdate['STATUS'] = "INACTIVE";
	        	$paramupdate['UPDATED_DATE'] = date('Y-m-d H:i:s');
		        $paramupdate['UPDATED_BY'] = "SYSTEM";

		        $Retrieve = $GamesModel->update($ID, $paramupdate);
		        if($Retrieve){
		        	$ERROR_MESSAGE = "Produk ini sedang tidak tersedia!";
		            $ERROR_CODE = "EC:003A";
		            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
		            die(json_encode($JSON));
		        }
	        }else{
	        	$ERROR_MESSAGE = $Message;
	            $ERROR_CODE = "EC:004A";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }
	    }

        $paraminsert['ID_REFFERENCE'] = $RefId;
        $paraminsert['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
        $paraminsert['KODE_PRODUK'] = $CODE;
        $paraminsert['NO_PELANGGAN'] = $NUMBER;
        $paraminsert['JUMLAH_BAYAR'] = isset($DataRequest->price) ? $DataRequest->price:0;
        $paraminsert['STATUS_TRANSAKSI'] = $Status;
        $paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
        $paraminsert['CREATED_BY'] = $CREATED_BY;

        $RetrieveInsert = $TransaksiModel->insert($paraminsert);
        if(!$RetrieveInsert){
        	$ERROR_MESSAGE = "Gagal menyimpan data transaksi!";
            $ERROR_CODE = "EC:004A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }
        
        $paramlog['TIPE'] = "REQUEST";
		$paramlog['ID_REFFERENCE'] = $RefId;
		$paramlog['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";;
		$paramlog['DESCRIPTION'] = json_encode($DataRequest);
		$paramlog['CREATED_DATE'] = date('Y-m-d H:i:s');
		$paramlog['CREATED_BY'] = $CREATED_BY;

		$RetrieveLog =  $LogTransaksiModel->insert($paramlog);
        if(!$RetrieveLog){
        	$ERROR_MESSAGE = "Gagal menyimpan data log transaksi!";
            $ERROR_CODE = "EC:005A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Terimakasih, permintaan anda sedang diproses";
        $ERROR_CODE = "EC:0000";
        $URL = base_url('riwayat');
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "URL"=>$URL);

		die(json_encode($JSON));
	}
}