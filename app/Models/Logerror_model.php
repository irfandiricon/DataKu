<?php namespace App\Models;

use CodeIgniter\Model;

class Logerror_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'LOG_ERROR';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ID',
		'ERROR_CODE',
		'ERROR_MESSAGE',
		'DATA',
		'CREATED_DATE',
		'CREATED_BY'
    ];
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
}