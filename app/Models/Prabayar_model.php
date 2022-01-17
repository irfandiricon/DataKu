<?php namespace App\Models;

use CodeIgniter\Model;

class Prabayar_model extends Model
{	
	public function view_icon($number)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT ID, NAME, IMAGE FROM MS_PROVIDER WHERE DESCRIPTION LIKE '%".$number."%'");
		$row = $query->getRow();
		return $row;
	}

	public function view_price($type, $provider = '')
	{
		$db = \Config\Database::connect();

		$EXP = explode(":", $type);
		$TYPE = '"'.join('","', $EXP).'"';

		$query = "SELECT * FROM MS_PRODUK_PRABAYAR WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL AND TYPE IN (".$TYPE.") AND ID_PROVIDER = '".$provider."' AND STATUS = 'ACTIVE' ORDER BY TYPE, HARGA_MODAL";

		$run = $db->query($query);
		$row = $run->getResult();
		return $row;
	}
}