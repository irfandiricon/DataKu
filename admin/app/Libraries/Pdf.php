<?php namespace App\Libraries;

class Pdf {

	function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/ThirdParty/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';          
        }
        
        return new mPDF('utf-8', 'A4', 0, '', 5, 5, 5, 5, 8, 8, 'P');
    }
	
}
?>