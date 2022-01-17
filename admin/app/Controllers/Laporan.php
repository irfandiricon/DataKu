<?php namespace App\Controllers;

use App\Models\Laporan_model;
use TCPDF;
use \Mpdf\Mpdf;

class Laporan extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
	public function index()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$LaporanModel = New Laporan_model();

		$param = array();
		$param['cssName'] = "Css/public.css:Css/laporan.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/laporan.js";
		$param['title'] = "Laporan Pesanan";
		$param['content'] = "laporan_pesanan";

		$param['Order'] = array();

		$paramdata = array();
		$Retrieve = $LaporanModel->vieworder($paramdata);
		$param['Order'] = $Retrieve;

		return view('template', $param);
	}

	public function transaksi()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$LaporanModel = New Laporan_model();

		$param = array();
		$param['cssName'] = "Css/public.css:Css/laporan.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/laporan.js";
		$param['title'] = "Laporan Transaksi";
		$param['content'] = "laporan_transaksi";

		$param['Order'] = array();

		$paramdata = array();
		$Retrieve = $LaporanModel->viewtransaction($paramdata);
		$param['Order'] = $Retrieve;

		return view('template', $param);
	}

	public function vieworder(){
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$LaporanModel = New Laporan_model();
		$Retrieve = $LaporanModel->vieworder();
		die(json_encode($Retrieve));
	}

	public function search()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$LaporanModel = New Laporan_model();

		$param = array();
		$param['cssName'] = "Css/public.css:Css/laporan.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/laporan.js";
		$param['title'] = "Laporan Pesanan";
		$param['content'] = "laporan_pesanan";

		$param['Order'] = array();

		$START_PERIODE = isset($_GET['start_periode']) ? $_GET['start_periode']:"";
		$END_PERIODE = isset($_GET['end_periode']) ? $_GET['end_periode']:"";

		$paramdata['START_PERIODE'] = date("Y-m-d 00:00:00", strtotime($START_PERIODE));
		$paramdata['END_PERIODE'] = date("Y-m-d 00:00:00", strtotime($END_PERIODE));

		$Retrieve = $LaporanModel->vieworder($paramdata);
		$param['Order'] = $Retrieve;

		return view('template', $param);
	}

	public function searchtransaction(){
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}

		$LaporanModel = New Laporan_model();

		$param = array();
		$param['cssName'] = "Css/public.css:Css/laporan.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/laporan.js";
		$param['title'] = "Laporan Transaksi";
		$param['content'] = "laporan_transaksi";

		$param['Order'] = array();

		$START_PERIODE = isset($_GET['start_periode']) ? $_GET['start_periode']:"";
		$END_PERIODE = isset($_GET['end_periode']) ? $_GET['end_periode']:"";

		$paramdata['START_PERIODE'] = date("Y-m-d 00:00:00", strtotime($START_PERIODE));
		$paramdata['END_PERIODE'] = date("Y-m-d 00:00:00", strtotime($END_PERIODE));

		$Retrieve = $LaporanModel->viewtransaction($paramdata);
		$param['Order'] = $Retrieve;

		return view('template', $param);
	}

	public function print($param){
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
		if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
		}
		
		$data = json_decode(base64_decode($param));
		$params['data'] = $data;
		$mpdf = new Mpdf(['mode' => 'utf-8']);
        $mpdf->WriteHTML(view('bookingresult', $params));
        return redirect()->to($mpdf->Output('invoice.pdf', 'I'));
	}
}