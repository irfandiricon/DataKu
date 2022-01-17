<?php namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'MS_KATEGORI';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'NAME',
		'DESCRIPTION',
		'STATUS',
		'UPDATED_DATE',
		'UPDATED_BY',
		'DELETED_DATE',
		'DELETED_BY'
    ];
	
	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
	protected $updatedField         = 'updated_date';

	public function viewkategori()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_KATEGORI WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL");
		$row = $query->getResult();
		return $row;
	}
}