<?php namespace App\Models;

use CodeIgniter\Model;

class Laporan_model extends Model
{	
	public function viewtransaksi($param)
	{	
		$db = \Config\Database::connect();

		$Start = isset($param['start']) ? $param['start']:"";
		$End = isset($param['end']) ? $param['end']:"";

		$Qprepaid = $db->query("SELECT * FROM TRANSAKSI WHERE STATUS_TRANSAKSI IN ('1','2') AND 
			DATE(CREATED_DATE) BETWEEN '".$Start."' AND '".$End."' ORDER BY CREATED_DATE DESC");
		$RowPrepaid = $Qprepaid->getResult();

		$QPostpaid = $db->query("SELECT * FROM TRANSAKSI WHERE STATUS_TRANSAKSI NOT IN ('1','2','0') AND 
			DATE(CREATED_DATE) BETWEEN '".$Start."' AND '".$End."' AND PESAN NOT IN ('INQUIRY SUCCESS') ORDER BY CREATED_DATE DESC");
		$RowPostpaid = $QPostpaid->getResult();

		$QPending = $db->query("SELECT * FROM TRANSAKSI WHERE STATUS_TRANSAKSI IN ('0') AND 
			DATE(CREATED_DATE) BETWEEN '".$Start."' AND '".$End."' ORDER BY CREATED_DATE DESC");
		$RowPending = $QPending->getResult();
		
		$Json['Prepaid'] = $RowPrepaid;
		$Json['Postpaid'] = $RowPostpaid;
		$Json['Pending'] = $RowPending;
		
		return $Json;
	}
}