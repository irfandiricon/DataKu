<?php namespace App\Controllers;
use App\Models\Auth_model;
use App\Models\Transaksi_model;
use App\Models\Logtransaksi_model;
use App\Models\Pascabayar_model;
use Config\Custom;
use App\Libraries\Service;

class Pascabayar extends BaseController
{
	function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    
	public function index()
	{
		$this->pln_pascabayar();	
	}

	public function pln_pascabayar()
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
		$param['content'] = "pascabayar/pln_pascabayar";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "pln-pascabayar";
		return view('template', $param);
	}

	public function bpjs()
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
		$param['content'] = "pascabayar/bpjs";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$Service = new Service();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "bpjs";
		$param['Data']['Month'] = $Service->month();
		return view('template', $param);
	}

	public function pdam()
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
		$param['content'] = "pascabayar/pdam";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "PDAM";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "pdam";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function telepon_pascabayar()
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
		$param['content'] = "pascabayar/telepon_pascabayar";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "TELEPON";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "telepon-pascabayar";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function multifinance()
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
		$param['content'] = "pascabayar/multifinance";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "MULTIFINANCE";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "multifinance";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function esamsat()
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
		$param['content'] = "pascabayar/esamsat";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "E-SAMSAT";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "e-samsat";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function tvkabel()
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
		$param['content'] = "pascabayar/tvkabel";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "TV";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "tv-kabel";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function pbb()
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
		$param['content'] = "pascabayar/pbb";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "PBB";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "pbb";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function internet()
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
		$param['content'] = "pascabayar/internet";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "INTERNET";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "internet";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function gas()
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
		$param['content'] = "pascabayar/gas";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$PascabayarModel = new Pascabayar_model();

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "PASCABAYAR"){
				$DataKategori[] = $row;
			}
		}

		$TYPE = "GAS";
		$RetrieveProduk = $PascabayarModel->view_ms_pascabayar($TYPE);

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "gas";
		$param['Data']['Produk'] = $RetrieveProduk;
		return view('template', $param);
	}

	public function view_price($TYPE = '')
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        $CREATED_BY = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"SYSTEM";

		$TransaksiModel = New Transaksi_model();
		$LogTransaksiModel = New Logtransaksi_model();
		$Service = new Service();
		$ID = isset($_POST['id_pelanggan']) ? $_POST['id_pelanggan']:"";
		$PROVIDER = isset($_POST['provider']) ? $_POST['provider']:"";
		$NOMOR_IDENTITAS = isset($_POST['nomor_identitas']) ? $_POST['nomor_identitas']:"";
		$MONTH = isset($_POST['month']) ? $_POST['month']:"";

		$REF_ID = $Service->generateReffId();

		if($TYPE == "pln"){
			$PROVIDER = "PLNPOSTPAID";
		}elseif($TYPE == "bpjs"){
			$PROVIDER = "BPJS";
		}else{
			$PROVIDER = $PROVIDER;
		}

		if($TYPE == "esamsat"){
			$UrlRequest = base_url('api/inquirypostpaid')."/".$TYPE."/".$ID."/".$REF_ID."/".$PROVIDER."/".$NOMOR_IDENTITAS;
		}elseif($TYPE == "bpjs"){
			$UrlRequest = base_url('api/inquirypostpaid')."/".$TYPE."/".$ID."/".$REF_ID."/".$PROVIDER."/".$MONTH;
		}else{
			$UrlRequest = base_url('api/inquirypostpaid')."/".$TYPE."/".$ID."/".$REF_ID."/".$PROVIDER;
		}

	    $json = file_get_contents($UrlRequest);
        $array = array(json_decode(strip_tags($json)));
        $DataRequest = isset($array[0]->data) ? $array[0]->data:array();

        $Rc = isset($DataRequest->response_code) ? $DataRequest->response_code:"";
        $Message = isset($DataRequest->message) ? $DataRequest->message:"";
        if($Rc == "00"){
        	$paraminsert['ID_REFFERENCE'] = isset($DataRequest->ref_id) ? $DataRequest->ref_id:"";
	        $paraminsert['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
	        $paraminsert['KODE_PRODUK'] = isset($DataRequest->code) ? $DataRequest->code:"";
	        $paraminsert['NO_PELANGGAN'] = isset($DataRequest->hp) ? $DataRequest->hp:"";
	        $paraminsert['JUMLAH_BAYAR'] = isset($DataRequest->price) ? $DataRequest->price:0;
	        $paraminsert['STATUS_TRANSAKSI'] = isset($DataRequest->response_code) ? $DataRequest->response_code:0;
	        $paraminsert['PESAN'] = isset($DataRequest->message) ? $DataRequest->message:"";
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
			$paramlog['ID_REFFERENCE'] = isset($DataRequest->ref_id) ? $DataRequest->ref_id:"";
			$paramlog['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
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
        }

		$param['Data']['inquiry'] = $DataRequest;
 
		return view('pascabayar/pricelist_'.strtolower($TYPE), $param);
	}

	public function proses($type = '')
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        $CREATED_BY = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"SYSTEM";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";
        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

		$db = \Config\Database::connect();
		$TransaksiModel = New Transaksi_model();
		$LogTransaksiModel = New Logtransaksi_model();
		$AuthModel = New Auth_model();

		$IdPelanggan = isset($_POST['id_pelanggan']) ? $_POST['id_pelanggan']:"";
		$TrId = isset($_POST['tr_id']) ? $_POST['tr_id']:"";

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

		if(in_array($type, array("pln","bpjs","pdam","multifinance","telepon","esamsat","tvkabel","pbb","internet","gas"))){
			$UrlRequest = base_url('api/paymentpostpaid')."/".$TrId;
		}else{
			$ERROR_MESSAGE = "Produk tidak terdaftar!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
		}

	    $json = file_get_contents($UrlRequest);
        $array = array(json_decode(strip_tags($json)));
        $DataRequest = $array[0]->data;

        $Rc = isset($DataRequest->response_code) ? $DataRequest->response_code:"";
        $Message = isset($DataRequest->message) ? $DataRequest->message:"";

        if($Rc == "00"){
        	$paraminsert['ID_REFFERENCE'] = isset($DataRequest->ref_id) ? $DataRequest->ref_id:"";
	        $paraminsert['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
	        $paraminsert['KODE_PRODUK'] = isset($DataRequest->code) ? $DataRequest->code:"";
	        $paraminsert['NO_PELANGGAN'] = isset($DataRequest->hp) ? $DataRequest->hp:"";
	        $paraminsert['JUMLAH_BAYAR'] = isset($DataRequest->price) ? $DataRequest->price:0;
	        $paraminsert['STATUS_TRANSAKSI'] = isset($DataRequest->response_code) ? $DataRequest->response_code:0;
	        $paraminsert['PESAN'] = isset($DataRequest->message) ? $DataRequest->message:"";
	        $paraminsert['CREATED_DATE'] = date('Y-m-d H:i:s');
	        $paraminsert['CREATED_BY'] = $CREATED_BY;

	        $RetrieveInsert = $TransaksiModel->insert($paraminsert);
	        if(!$RetrieveInsert){
	        	$ERROR_MESSAGE = "Gagal menyimpan data transaksi!";
	            $ERROR_CODE = "EC:001B";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }
	        
	        $paramlog['TIPE'] = "RESPONSE";
			$paramlog['ID_REFFERENCE'] = isset($DataRequest->ref_id) ? $DataRequest->ref_id:"";
			$paramlog['ID_TRANSAKSI'] = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
			$paramlog['DESCRIPTION'] = json_encode($DataRequest);
			$paramlog['CREATED_DATE'] = date('Y-m-d H:i:s');
			$paramlog['CREATED_BY'] = $CREATED_BY;

			$RetrieveLog =  $LogTransaksiModel->insert($paramlog);
	        if(!$RetrieveLog){
	        	$ERROR_MESSAGE = "Gagal menyimpan data log transaksi!";
	            $ERROR_CODE = "EC:001C";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }

	        $ERROR_MESSAGE = "Terimakasih, permintaan anda sedang diproses";
	        $ERROR_CODE = "EC:0000";
	        $URL = base_url('riwayat');
	        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "URL"=>$URL);
			die(json_encode($JSON));
        }else{
        	$wheretr['ID_TRANSAKSI'] = $TrId;
        	$wheretr['NO_PELANGGAN'] = $IdPelanggan;
        	$paramupdatetr['STATUS_TRANSAKSI'] = $Rc;
        	$paramupdatetr['PESAN'] = $Message;

        	$builderTransaksi = $db->table('TRANSAKSI');
        	$builderTransaksi->set($paramupdatetr);
			$builderTransaksi->where($wheretr);
			$builderTransaksi->update();
        	if(!$builderTransaksi){
	        	$ERROR_MESSAGE = "Gagal merubah data transaksi!";
	            $ERROR_CODE = "EC:004A";
	            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }

	        $paramlog['TIPE'] = "RESPONSE";
			$paramlog['ID_TRANSAKSI'] = $TrId;
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
        }

        $JSON = array("ERROR_CODE" => "EC:00".$Rc, "ERROR_MESSAGE" => $Message);
		die(json_encode($JSON));
	}
}