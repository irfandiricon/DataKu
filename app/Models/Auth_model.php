<?php namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'CUSTOMER';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'NAME',
		'EMAIL',
		'PASSWORD',
		'NO_HP',
		'REFERRAL_ID',
		'PIN',
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

	public function CheckRow($table, $field, $data)
	{
		$db = \Config\Database::connect();

		$query = "SELECT * FROM ".$table." WHERE ".$field."='".$data."'";
		$run = $db->query($query);
		$row = $run->getRow();
		return $row;
	}
}