<?php namespace App\Controllers;
use App\Models\Logtransaksi_model;
use App\Models\Transaksi_model;
use Config\Custom;

class Autorun extends BaseController
{
    function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function duplicate_log_transaksi()
    {
        $LogTransaksiModel = New Logtransaksi_model;
    	$TransaksiModel = New Transaksi_model;
    	$Config = new Custom;
        $UrlLogTransaksi = $Config->UrlLogTransaksi;
        $UrlUpdateLogTransaksi = $Config->UrlUpdateLogTransaksi;
        $Username = $Config->User;
        $Password = $Config->Password;

    	$json['Username'] = $Username;
        $json['Password'] = $Password;

        $Retrieve = $this->Service($UrlLogTransaksi, $json);
        $ErrorCode = isset($Retrieve->ErrorCode) ? $Retrieve->ErrorCode:"";
        $ErrorMessage = isset($Retrieve->ErrorMessage) ? $Retrieve->ErrorMessage:"";
        if($ErrorCode != "EC:0000"){
        	die(json_encode($Retrieve));
        }

        $Row = $Retrieve->Row;

        if(empty(sizeof($Row)))
        {
        	$ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ErrorCode" => $ERROR_CODE, "ErrorMessage" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param = array();
        $post = array();

        foreach($Row as $data)
        {
        	$post['TIPE'] = isset($data->TIPE) ? $data->TIPE:"";
        	$post['ID_REFFERENCE'] = isset($data->ID_REFFERENCE) ? $data->ID_REFFERENCE:"";
        	$post['ID_TRANSAKSI'] = isset($data->ID_TRANSAKSI) ? $data->ID_TRANSAKSI:"";
        	$post['DESCRIPTION'] = isset($data->DESCRIPTION) ? $data->DESCRIPTION:"";
        	$post['STATUS'] = isset($data->STATUS) ? $data->STATUS:"";
        	$post['CREATED_DATE'] = isset($data->CREATED_DATE) ? $data->CREATED_DATE:"";
        	$post['CREATED_BY'] = isset($data->CREATED_BY) ? $data->CREATED_BY:""; 

        	$RetrieveLog = $LogTransaksiModel->insert($post);
	        if(!$RetrieveLog){
	        	$ERROR_MESSAGE = "Gagal menyimpan data log transaksi!";
	            $ERROR_CODE = "EC:002A";
	            $JSON = array("ErrorCode" => $ERROR_CODE, "ErrorMessage" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }

	        $json2['ID'] = $data->ID;
	        $json2['Username'] = $Username;
        	$json2['Password'] = $Password;

	        $RetrieveUpdate = $this->Service($UrlUpdateLogTransaksi, $json2);
	        if(!$RetrieveUpdate){
	        	$ERROR_MESSAGE = "Gagal menyimpan data log transaksi!";
	            $ERROR_CODE = "EC:003A";
	            $JSON = array("ErrorCode" => $ERROR_CODE, "ErrorMessage" => $ERROR_MESSAGE);
	            die(json_encode($JSON));
	        }

            if($post['TIPE'] == "RESPONSE"){
                $json = $post['DESCRIPTION'];
                $array = array(json_decode(strip_tags($json)));
                $data = isset($array[0]->data) ? $array[0]->data:array();

                $where['ID_REFFERENCE'] = $post['ID_REFFERENCE'];
                $where['ID_TRANSAKSI'] = $post['ID_TRANSAKSI'];

                $db = \Config\Database::connect();
                $builder = $db->table('TRANSAKSI');
                $Query = $builder->where($where)->get();
                $Row = $Query->getRow();

                $ID = isset($Row->ID) ? $Row->ID:"";
                $param['STATUS_TRANSAKSI'] = isset($data->status) ? $data->status:"0";
                $param['PESAN'] = isset($data->message) ? $data->message:"";
                $param['SN'] = isset($data->sn) ? $data->sn:"";
                $param['BALANCE'] = isset($data->balance) ? $data->balance:"0.00";
                $RetrieveTransaksi = $TransaksiModel->update($ID, $param);

                if(!$RetrieveTransaksi){
                    $ERROR_MESSAGE = "Gagal merubah status transaksi!";
                    $ERROR_CODE = "EC:004A";
                    $JSON = array("ErrorCode" => $ERROR_CODE, "ErrorMessage" => $ERROR_MESSAGE);
                    die(json_encode($JSON));
                }
            }
        }

    	$ERROR_MESSAGE = "Success";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ErrorCode" => $ERROR_CODE, "ErrorMessage" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function Service($Url, $Param)
    {
		$ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $Param);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $Row = json_decode($data);
        return $Row;
    }
}