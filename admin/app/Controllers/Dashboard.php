<?php namespace App\Controllers;

use App\Models\Laporan_model;
use App\Libraries\Service;

class Dashboard extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
	public function index()
	{	
		$Service = new Service();
		$LaporanModel = new Laporan_model();
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;
        $UrlB2C = $CustomConfig->UrlB2C;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$UrlRequest = $UrlB2C."checkbalance";
		$RetrieveApi = $Service->api($UrlRequest);
		$Balance = isset($RetrieveApi->balance) ? $RetrieveApi->balance:0;

		$Start = isset($_POST['start']) ? $_POST['start']:date('Y-m-d');
		$paramview['start'] = date('Y-m-d', strtotime($Start));
		$End = isset($_POST['end']) ? $_POST['end']:date('Y-m-d');
		$paramview['end'] = date('Y-m-d', strtotime($End));
		$RetrieveTransaksi = $LaporanModel->viewtransaksi($paramview);

		$param = array();
		$param['cssName'] = "Css/public.css:Css/dashboard.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/dashboard.js";
		$param['title'] = "Dashboard";
		$param['content'] = "dashboard";
		$param['Data']['balance'] = $Balance;
		$param['Data']['transaksi'] = $RetrieveTransaksi;
		$param['Data']['search'] = $paramview;

		return view('template', $param);
	}
}