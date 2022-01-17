<?php namespace App\Models;

use CodeIgniter\Model;

class Contactus_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'MS_CONTACTUS';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'TICKET_NUMBER',
		'NAME',
		'NO_HP',
		'EMAIL',
		'TITLE',
		'MESSAGE',
		'STATUS',
		'CREATED_DATE',
		'CREATED_BY',
		'UPDATED_DATE',
		'UPDATED_BY'
    ];
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
}