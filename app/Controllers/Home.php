<?php namespace App\Controllers;

class Home extends BaseController
{
	protected $session;

	function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    
	public function index()
	{
		$CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();

		$param = array();
		$param['cssName'] = "Css/public.css:Css/home.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/home.js";
		$param['content'] = "home";
		$param['SESSION_LOGIN'] = $SESSION_LOGIN;
		// $param['IsBanner'] = "Yes";

		$RetrieveKategori = json_decode(file_get_contents(base_url('api/kategori')));
		$param['Data']['kategori'] = $RetrieveKategori;

		return view('template', $param);
	}
}
