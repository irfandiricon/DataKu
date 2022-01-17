<?php namespace App\Models;

use CodeIgniter\Model;

class Games_model extends Model
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

	public function view_price($type)
	{
		$db = \Config\Database::connect();

		$EXP = explode(":", $type);
		$TYPE = '"'.join('","', $EXP).'"';

		$query = "SELECT * FROM MS_PRODUK_GAME WHERE DELETED_DATE IS NULL AND DELETED_BY IS NULL AND TYPE IN (".$TYPE.") AND STATUS = 'ACTIVE' ORDER BY TYPE, HARGA_MODAL";

		$run = $db->query($query);
		$row = $run->getResult();
		return $row;
	}

	public function view_produk($CODE)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM MS_PRODUK_GAME WHERE CODE = '".$CODE."'");
		$row = $query->getRow();
		return $row;
	}
}