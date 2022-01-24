<?php namespace App\Models;

use CodeIgniter\Model;

class Transaksi_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'TRANSAKSI';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ID',
		'ID_REFFERENCE',
		'ID_TRANSAKSI',
		'KODE_PRODUK',
		'NO_PELANGGAN',
		'JUMLAH_BAYAR',
		'STATUS_TRANSAKSI',
		'PESAN',
		'SN',
		'CREATED_DATE',
		'CREATED_BY',
		'UPDATED_DATE',
		'UPDATED_BY'
    ];
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
	protected $updatedField         = 'updated_date';

	public function CheckHistory($param)
	{
		$db = \Config\Database::connect();

		$Email = isset($param['EMAIL']) ? $param['EMAIL']:"";
		$START_DATE = isset($param['START_DATE']) ? $param['START_DATE']: date('Y-m-01');
		$END_DATE = isset($param['END_DATE']) ? $param['END_DATE']: date('Y-m-t');
 
		$StartDate = date("Y-m-d 00:00:00", strtotime($START_DATE));
		$EndDate = date("Y-m-d 23:59:59", strtotime($END_DATE));

		$Query = "SELECT * FROM V_TRANSAKSI
			WHERE CREATED_BY = '".$Email."' 
			AND CREATED_DATE BETWEEN '".$StartDate."' AND '".$EndDate."'";
		$run = $db->query($Query);
		$row = $run->getResult();
		return $row;	
	}

	public function updatetransaksi($param)
	{
		$db = \Config\Database::connect();

		$ID_TRANSAKSI = isset($param['ID_TRANSAKSI']) ? $param['ID_TRANSAKSI']:"";
		$STATUS_TRANSAKSI = isset($param['STATUS_TRANSAKSI']) ? $param['STATUS_TRANSAKSI']:"";
		$PESAN = isset($param['PESAN']) ? $param['PESAN']:"";
		$SN = isset($param['SN']) ? $param['SN']:"";
		$BALANCE = isset($param['BALANCE']) ? $param['BALANCE']:"";
		$UPDATED_DATE = isset($param['UPDATED_DATE']) ? $param['UPDATED_DATE']:"";
		$UPDATED_BY = isset($param['UPDATED_BY']) ? $param['UPDATED_BY']:"";

		$query = "UPDATE TRANSAKSI SET STATUS_TRANSAKSI = '".$STATUS_TRANSAKSI."', PESAN = '".$PESAN."', SN = '".$SN."', BALANCE = '".$BALANCE."', UPDATED_DATE = '".$UPDATED_DATE."', UPDATED_BY = '".$UPDATED_BY."' WHERE ID_TRANSAKSI = '".$ID_TRANSAKSI."'";
		$run = $db->query($query);
		if(!$run){
			$ErrorCode = "EC:01A";
			$ErrorMessage = "Gagal mengupdate data transaksi!";
            $JSON = array("ErrorCode" => $ErrorCode, "ErrorMessage" => $ErrorMessage);
           	return $JSON;
		}
		$ErrorCode = "EC:0000";
		$ErrorMessage = "Success";
        $JSON = array("ErrorCode" => $ErrorCode, "ErrorMessage" => $ErrorMessage, "Data"=>$params);
       	return $JSON;
	}
}