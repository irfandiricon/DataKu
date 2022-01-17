<?php namespace App\Controllers;
use App\Models\Kategori_model;
use App\Models\Sub_kategori_model;
use App\Models\Produk_model;
use Config\Custom;

class Api extends BaseController
{
    protected $session;

    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    
    public function checkbalance()
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPrepaidDev : $Config->UrlPrepaidPro;
        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature  = md5($Username.$ApiKey."bl");

        $JSON['commands'] = "balance";
        $JSON['username'] = $Username;
        $JSON['sign'] = $Signature;
        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }

	public function kategori()
	{
		$KategoriModel = New Kategori_model();
		$SubKategoriModel = New Sub_kategori_model();

		$Result = $KategoriModel->viewkategori();
        $Row = array();
        foreach($Result as $row)
        {
            $Row2 = array();
            $post['ID'] = isset($row->ID) ? $row->ID:"";
            $post['NAME'] = isset($row->NAME) ? $row->NAME:"";
            $post['DESCRIPTION'] = isset($row->DESCRIPTION) ? $row->DESCRIPTION:"";
            $post['STATUS'] = isset($row->STATUS) ? $row->STATUS:"";
            $post['CREATED_DATE'] = isset($row->CREATED_DATE) ? $row->CREATED_DATE:"";
            $ResultDetail = $SubKategoriModel->viewsubkategori($post['ID']);
            foreach($ResultDetail as $row2)
            {
                $post2['ID'] = isset($row2->ID) ? $row2->ID:"";
                $post2['ID_KATEGORI'] = isset($row2->ID_KATEGORI) ? $row2->ID_KATEGORI:"";
                $post2['NAME'] = isset($row2->NAME) ? $row2->NAME:"";
                $post2['DESCRIPTION'] = isset($row2->DESCRIPTION) ? $row2->DESCRIPTION:"";
                $post2['TITLE_LABEL'] = isset($row2->TITLE_LABEL) ? $row2->TITLE_LABEL:"";
                $post2['LABEL'] = isset($row2->LABEL) ? $row2->LABEL:"";
                $post2['URL'] = isset($row2->URL) ? $row2->URL:"";
                $post2['STATUS'] = isset($row2->STATUS) ? $row2->STATUS:"";
                $post2['CREATED_DATE'] = isset($row2->CREATED_DATE) ? $row2->CREATED_DATE:"";
                $Row2[] = $post2;
            }
            $post['SUB'] = $Row2;
            $Row[] = $post;
        }
        die(json_encode($Row));
	}

	public function wspricelist($TYPE = "", $OPERATOR = "")
	{
		$Config = new Custom;
        $UrlPrepaid = $Config->UrlPrepaidMP;
		$Username = $Config->UserNumber;
		$ApiKey = $Config->ApiKey;
		$Signature  = md5($Username.$ApiKey.'pl');

        $JSON['commands'] = "pricelist";
        $JSON['username'] = $Username; 
        $JSON['sign'] = $Signature; 
        $JSON['status'] = "active";
        $json = json_encode($JSON);

        if($TYPE == "all" || empty($TYPE)){
            $url = $UrlPrepaid."v1/legacy/index";
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
            $url = $UrlPrepaid."v1/legacy/index".$TYPE.$OPERATOR; 
        }

		$ch  = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
	}

    public function request($RefId, $PhoneNumber, $Code)
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPrepaidDev : $Config->UrlPrepaidPro;
        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature  = md5($Username.$ApiKey.$RefId);

        $JSON['commands'] = "topup";
        $JSON['username'] = $Username; 
        $JSON['ref_id'] = $RefId; 
        $JSON['hp'] = $PhoneNumber; 
        $JSON['pulsa_code'] = $Code; 
        $JSON['sign'] = $Signature;
        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }

    public function produk($CODE)
    {
        $ProdukModel = New Produk_model();
        $Retrieve = $ProdukModel->view_produk($CODE);
        die(json_encode($Retrieve));
    }

    public function plnprepaid($number)
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPrepaidDev : $Config->UrlPrepaidPro;

        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature = md5($Username.$ApiKey.$number);

        $JSON['commands'] = "inquiry_pln";
        $JSON['username'] = $Username; 
        $JSON['sign'] = $Signature; 
        $JSON['hp'] = $number; 

        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }

    public function inquirypostpaid($type ,$number, $ref_id, $provider, $others = '')
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPostpaidDev : $Config->UrlPostpaidPro;

        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature = md5($Username.$ApiKey.$ref_id);

        $JSON['commands'] = "inq-pasca";
        $JSON['username'] = $Username; 
        $JSON['code'] = $provider; 
        $JSON['hp'] = $number;
        $JSON['ref_id'] = $ref_id; 
        $JSON['sign'] = $Signature;

        if($type == 'esamsat'){
            $JSON['nomor_identitas'] = $others;
        }elseif($type == 'bpjs'){
            $JSON['month'] = $others;
        }

        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }

    public function paymentpostpaid($tr_id)
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPostpaidDev : $Config->UrlPostpaidPro;

        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature = md5($Username.$ApiKey.$tr_id);

        $JSON['commands'] = "pay-pasca";
        $JSON['username'] = $Username; 
        $JSON['tr_id'] = $tr_id; 
        $JSON['sign'] = $Signature; 
       
        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }

    public function checkstatus($ref_id)
    {
        $Config = new Custom;
        $Development = $Config->Development;
        $UrlPrepaid = $Development == true ? $Config->UrlPrepaidDev : $Config->UrlPrepaidPro;

        $Username = $Config->UserNumber;
        $ApiKey = $Config->ApiKey;
        $Signature = md5($Username.$ApiKey.$ref_id);

        $JSON['commands'] = "inquiry";
        $JSON['username'] = $Username; 
        $JSON['ref_id'] = $ref_id; 
        $JSON['sign'] = $Signature; 

        $json = json_encode($JSON);

        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $UrlPrepaid);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);
        print_r($data);
    }
}