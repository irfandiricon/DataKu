<?php namespace App\Models;

use CodeIgniter\Model;

class Sub_kategori_model extends Model
{	
	public function viewsubkategori($ID)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_SUB_KATEGORI WHERE ID_KATEGORI = '".$ID."' AND DELETED_DATE IS NULL AND DELETED_BY IS NULL AND STATUS = 'ACTIVE'");
		$row = $query->getResult();
		return $row;
	}
}