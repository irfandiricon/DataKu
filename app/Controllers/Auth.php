<?php namespace App\Controllers;
use App\Models\Auth_model;
use Config\Custom;
use App\Libraries\Service;

class Auth extends BaseController
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
        $Session = \Config\Services::Session();

        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        die(json_encode($SESSION_LOGIN));
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url().'/login');
        }
    }
}