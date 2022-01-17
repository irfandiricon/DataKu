<?php namespace App\Controllers;

class Pricelist extends BaseController
{
	function __construct() {
        date_default_timezone_set('Asia/Jakarta');
    }
    
	public function index()
	{
		$param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['content'] = "pricelist";

		return view('template', $param);
	}

	public function getprice($TYPE = '', $OPERATOR = '')
	{
		if($TYPE == "all" || empty($TYPE)){
            $url = base_url('api/wspricelist/all');
        }else{
            if(!empty($TYPE)){
                $TYPE = "/".$TYPE;
            }else{
                $TYPE = "";
            }
            if(!empty($OPERATOR)){
                $OPERATOR = "/".$OPERATOR;
            }else{
                $OPERATOR = "";
            }
            $url = base_url('api/wspricelist/'.$TYPE.$OPERATOR);
        }

		$json = file_get_contents($url);
		$array = array(json_decode(strip_tags($json)));
		$data = isset($array[0]->data) ? $array[0]->data:array();
		die(json_encode($data));
	}
}