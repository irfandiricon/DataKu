<?php namespace App\Controllers;
use App\Models\Transaksi_model;
use App\Models\Logtransaksi_model;
use App\Models\Emoney_model;
use Config\Custom;
use App\Libraries\Service;

class Emoney extends BaseController
{
	function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }

	public function ovo()
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
		$param['content'] = "emoney/ovo";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "E-MONEY"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "ovo";
		return view('template', $param);
	}

	public function gopay()
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
		$param['content'] = "emoney/gopay";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "E-MONEY"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "gopay";
		return view('template', $param);
	}

	public function dana()
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
		$param['content'] = "emoney/dana";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "E-MONEY"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "dana";
		return view('template', $param);
	}

	public function linkaja()
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
		$param['content'] = "emoney/linkaja";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "E-MONEY"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "linkaja";
		return view('template', $param);
	}

	public function shopeepay()
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
		$param['content'] = "emoney/shopeepay";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;

		$DataKategori = array();

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		foreach($RetrieveKategori as $row){
			$NAME = isset($row->NAME) ? $row->NAME:"";
			if($NAME == "E-MONEY"){
				$DataKategori[] = $row;
			}
		}

		$param['Data']['kategori'] = $DataKategori;
		$param['Data']['Url'] = "shopeepay";
		return view('template', $param);
	}

	public function view_price($TYPE = '')
	{
		$EmoneyModel = New Emoney_model();

		$PHONE_NUMBER = isset($_POST['phone_number']) ? $_POST['phone_number']:"";
		$Row = $EmoneyModel->view_price($TYPE);

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

		$param['Data']['pricelist'] = $POST;
		$param['Data']['idpelanggan'] = $PHONE_NUMBER;
 
		return view('emoney/pricelist', $param);
	}

	public function proses()
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        $CREATED_BY = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"SYSTEM";

		$Service = new Service();
		$EmoneyModel = New Emoney_model();
		$TransaksiModel = New Transaksi_model();
		$LogTransaksiModel = New Logtransaksi_model();

		$NUMBER = isset($_POST['phone_number']) ? $_POST['phone_number']:"";
		$CODE = isset($_POST['code']) ? $_POST['code']:"";

		if(empty($CODE)){
            $ERROR_MESSAGE = "Silahkan pilih produk!";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $RetrieveProduk = $EmoneyModel->view_produk($CODE);
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

	        $Retrieve = $EmoneyModel->update($ID, $paramupdate);
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

		        $Retrieve = $EmoneyModel->update($ID, $paramupdate);
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