<?php namespace App\Controllers;
use App\Models\Prabayar_model;
use App\Models\Produk_model;
use Config\Custom;

class Pembayaran extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
	public function index()
	{
		$param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "pembayaran";

		return view('template', $param);	
	}
}