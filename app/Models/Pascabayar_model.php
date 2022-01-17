<?php namespace App\Models;

use CodeIgniter\Model;

class Pascabayar_model extends Model
{	
	public function view_ms_pascabayar($TYPE = '')
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT TYPE, CODE, DESCRIPTION FROM MS_PRODUK_PASCABAYAR WHERE STATUS = 'ACTIVE' AND TYPE = '".$TYPE."'");
		$row = $query->getResult();
		return $row;
	}
}