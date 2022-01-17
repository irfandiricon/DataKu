<?php namespace App\Models;

use CodeIgniter\Model;

class Logtransaksi_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'LOG_TRANSAKSI';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ID',
		'TIPE',
		'ID_REFFERENCE',
		'ID_TRANSAKSI',
		'DESCRIPTION',
		'STATUS',
		'CREATED_DATE',
		'CREATED_BY'
    ];
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
}