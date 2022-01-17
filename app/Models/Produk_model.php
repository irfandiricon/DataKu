<?php namespace App\Models;

use CodeIgniter\Model;

class Produk_model extends Model
{	
	protected $DBGroup              = 'default';
	protected $table                = 'MS_PRODUK_PRABAYAR';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'ID_PROVIDER',
		'CODE',
		'NAME',
		'DESCRIPTION',
		'HARGA_MODAL',
		'HARGA_JUAL',
		'STATUS',
		'MASA_AKTIF',
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
	
	public function view_produk($CODE)
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT ID, TYPE, ID_PROVIDER, CODE, NAME, DESCRIPTION, HARGA_MODAL, HARGA_JUAL, STATUS FROM MS_PRODUK_PRABAYAR WHERE CODE = '".$CODE."'");
		$row = $query->getRow();
		return $row;
	}

	public function update_harga($param)
	{
		$HARGA_MODAL = isset($param['HARGA_MODAL']) ? $param['HARGA_MODAL']:0;
		$MASA_AKTIF = isset($param['MASA_AKTIF']) ? $param['MASA_AKTIF']:0;
		$CODE = isset($param['CODE']) ? $param['CODE']:"";
		$UPDATED_DATE = isset($param['UPDATED_DATE']) ? $param['UPDATED_DATE']:0;
		$UPDATED_BY = isset($param['UPDATED_BY']) ? $param['UPDATED_BY']:0;
		$db = \Config\Database::connect();
		$query = $db->query("UPDATE MS_PRODUK_PRABAYAR SET HARGA_MODAL = '".$HARGA_MODAL."' WHERE CODE = '".$CODE."'");
		if(!$query){
			$ERROR_MESSAGE = json_encode($db->error());
            $ERROR_CODE = "EC:001B";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            return $JSON;
		}

		$ERROR_MESSAGE = "Success";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        return $JSON;
	}
}