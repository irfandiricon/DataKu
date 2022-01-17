<?php namespace App\Controllers;
use App\Models\Prabayar_model;
use App\Models\Produk_model;
use App\Models\Transaksi_model;
use Config\Custom;

class Riwayat extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
	public function index()
	{
		return redirect()->to(base_url());
	}
}