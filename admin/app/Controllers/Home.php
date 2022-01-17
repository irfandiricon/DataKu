<?php namespace App\Controllers;

class Home extends BaseController
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

		$param = array();

		return view('home', $param);
	}

	public function search()
	{
		$CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
        }
        
		$param = array();

		return view('home', $param);
	}
}
