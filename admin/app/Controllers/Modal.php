<?php namespace App\Controllers;

class Modal extends BaseController 
{
    public function index() 
    {
        $data = isset($_POST) ? $_POST:"";
        echo view('modal', $data);
    }
}