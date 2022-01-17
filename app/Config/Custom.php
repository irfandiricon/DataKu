<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Custom extends BaseConfig
{	
    Public $apps  = 'B2C';

    Public $Development = true ;
    Public $UrlPrepaidDev = "https://testprepaid.mobilepulsa.net/v1/legacy/index";
    Public $UrlPrepaidPro = "https://api.mobilepulsa.net/v1/legacy/index";

    public $UserNumber = "0895320294566";
    public $ApiKey  = "871612c9464993c2";
    public $Sign = "b8d7fccae70d5656550dfbd9f6ff715f";
    Public $UrlPrepaidMP = "https://testprepaid.mobilepulsa.net/";
    Public $UrlPrepaidIak = "https://prepaid.iak.dev/";

    Public $UrlPostpaidDev = "https://testpostpaid.mobilepulsa.net/api/v1/bill/check";
    Public $UrlPostpaidPro = "https://mobilepulsa.net/api/v1/bill/check ";

    // Midtrans
    Public $IDMerchant = "G876915019";
    Public $ClientKey = "Mid-client-rnnO1kgCW4-lLxB_";
    Public $ServerKey = "Mid-server-HDyUHjz85QdTQ7yW2RgM6ffN";

    /* Access Api */
    Public $User = "ircn-dataku";
    Public $Password = "Windows7!!!";

    Public $UrlLogTransaksi = "https://pusat-evoucher.com/callback/logtransaksi";
    Public $UrlUpdateLogTransaksi = "https://pusat-evoucher.com/callback/u_log_transaksi";

    /*Token Cookies*/
    Public $uCookies = "cookies_dataku";
    Public $pCookies = "Abc123!!";
}