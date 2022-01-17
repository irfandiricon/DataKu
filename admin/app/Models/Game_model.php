<?php namespace App\Models;

use CodeIgniter\Model;

class Game_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'MS_PRODUK_GAME';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'TYPE',
		'CODE',
		'NAME',
		'DESCRIPTION',
		'HARGA_MODAL',
		'HARGA_JUAL',
		'STATUS',
		'CREATED_DATE',
		'CREATED_BY',
		'UPDATED_DATE',
		'UPDATED_BY',
		'DELETED_DATE',
		'DELETED_BY'
    ];
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
	protected $updatedField         = 'updated_date';

	public function viewproduk($param = '')
	{
		$db = \Config\Database::connect();

		if(empty($param)){
			$query = $db->query("SELECT * FROM MS_PRODUK_GAME WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL");
			$row = $query->getResult();
		}else{
			$query = $db->query("SELECT * FROM MS_PRODUK_GAME WHERE CODE = '".$param."'");
			$row = $query->getRow();
		}
		
		return $row;
	}
}