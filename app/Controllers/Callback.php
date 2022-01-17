<?php namespace App\Controllers;
use App\Models\Transaksi_model;
use App\Models\Logtransaksi_model;
use Config\Custom;

class Callback extends BaseController
{
    function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
    public function index()
    {
        $TransaksiModel = New Transaksi_model();
        $LogTransaksiModel = New Logtransaksi_model();

        $DATA = file_get_contents('php://input');
        $array = array(json_decode(strip_tags($DATA)));
        $DataRequest = $array[0]->data;

        $Status = isset($DataRequest->status) ? $DataRequest->status:"";
        $RefId = isset($DataRequest->ref_id) ? $DataRequest->ref_id:"";
        $IDTransaksi = isset($DataRequest->tr_id) ? $DataRequest->tr_id:"";
        $Pesan = isset($DataRequest->message) ? $DataRequest->message:"";
        $SN = isset($DataRequest->sn) ? $DataRequest->sn:"";
        $Balance = isset($DataRequest->balance) ? $DataRequest->balance:"";

        $paramlog['TIPE'] = "RESPONSE";
        $paramlog['ID_REFFERENCE'] =  $RefId;
        $paramlog['ID_TRANSAKSI'] = $IDTransaksi;
        $paramlog['DESCRIPTION'] = $DATA;
        $paramlog['CREATED_DATE'] = date('Y-m-d H:i:s');
        $paramlog['CREATED_BY'] = "SYSTEM";

        $RetrieveLog =  $LogTransaksiModel->insert($paramlog);
        if(!$RetrieveLog){
            $ERROR_MESSAGE = "Gagal menyimpan data log transaksi!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $paramtransaksi['ID_TRANSAKSI'] = $IDTransaksi;
        $paramtransaksi['STATUS_TRANSAKSI'] = $Status;
        $paramtransaksi['PESAN'] = $Pesan;
        $paramtransaksi['SN'] = $SN;
        $paramtransaksi['BALANCE'] = $Balance;
        $paramtransaksi['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $paramtransaksi['UPDATED_BY'] = "SYSTEM";

        $RetrieveUpdate = $TransaksiModel->updatetransaksi($paramtransaksi);
        if($RetrieveUpdate['ErrorCode'] != "EC:0000"){
            $ERROR_MESSAGE = "Gagal menyimpan data transaksi!";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Success";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function logtransaksi()
    {
        $Config = new Custom;
        $Username = $Config->User;
        $Password = $Config->Password;

        $User = isset($_POST['Username']) ? $_POST['Username']:"";
        $Pass = isset($_POST['Password']) ? $_POST['Password']:"";

        if($Username == $User && $Password == $Pass){
            $db = \Config\Database::connect();
            $builder = $db->table('LOG_TRANSAKSI');
            $Query = $builder->where('STATUS', '0')->get();
            $Row = $Query->getResult();

            $json['ErrorCode'] = "EC:0000";
            $json['ErrorMessage'] = "Success";
            $json['Row'] = $Row;
            die(json_encode($json));
        }

        $json['ErrorCode'] = "EC:001A";
        $json['ErrorMessage'] = "Account not found!";
           
        die(json_encode($json));
    }

    public function u_log_transaksi()
    {
        $LogtransaksiModel = New Logtransaksi_model();
        $Config = new Custom;
        $Username = $Config->User;
        $Password = $Config->Password;

        $User = isset($_POST['Username']) ? $_POST['Username']:"";
        $Pass = isset($_POST['Password']) ? $_POST['Password']:"";
        $ID = isset($_POST['ID']) ? $_POST['ID']:"";

        if($Username == $User && $Password == $Pass){
            $data['STATUS'] = "1";
            $Retrieve = $LogtransaksiModel->update($ID, $data);
            if(!$Retrieve){
                $json['ErrorCode'] = "EC:001A";
                $json['ErrorMessage'] = "Failed update!";
                die(json_encode($json));
            }

            $json['ErrorCode'] = "EC:0000";
            $json['ErrorMessage'] = "Success";
            die(json_encode($json));
        }

        $json['ErrorCode'] = "EC:002A";
        $json['ErrorMessage'] = "Account not found!";
        die(json_encode($json));
    }
}