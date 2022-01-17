<?php namespace App\Controllers;

class Template extends BaseController
{
	public function index()
	{
		$param = array();
		$param['cssName'] = "Css/public.css:Css/home.css";
		$param['jsName'] = "JavaScript/public.js:JavaScript/home.js";
		$param['content'] = "home";

		return view('template', $param);
	}
}
