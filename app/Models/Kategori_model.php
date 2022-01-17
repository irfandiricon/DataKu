<?php namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{	
	public function viewkategori()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_KATEGORI WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL AND STATUS = 'ACTIVE'");
		$row = $query->getResult();
		return $row;
	}
}