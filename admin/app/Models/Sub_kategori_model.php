<?php namespace App\Models;

use CodeIgniter\Model;

class Sub_kategori_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'MS_SUB_KATEGORI';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ID_KATEGORI',
		'NAME',
		'DESCRIPTION',
		'TITLE_LABEL',
		'LABEL',
		'URL',
		'STATUS',
		'CREATED_DATE',
		'CREATED_BY',
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

	public function viewallsubkategori()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_SUB_KATEGORI WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL ORDER BY ID_KATEGORI");
		$row = $query->getResult();
		return $row;
	}

	public function viewsubkategori($ID)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_SUB_KATEGORI WHERE ID_KATEGORI = '".$ID."' AND DELETED_DATE IS NULL AND DELETED_BY IS NULL");
		$row = $query->getResult();
		return $row;
	}
}