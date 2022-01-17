<?php namespace App\Controllers;

use App\Models\Kategori_model;
use App\Models\Sub_kategori_model;

class Kategori extends BaseController
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

        $KategoriModel = New Kategori_model();
        $SubKategoriModel = New Sub_kategori_model();

		$param = array();
		$param['cssName'] = "Css/public.css";
		$param['jsName'] = "JavaScript/public.js";
		$param['title'] = "Data Kategori";
		$param['content'] = "kategori";

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
        $param['Data']['table'] = $Row;

		return view('template', $param);
	}

	public function add()
	{
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $KategoriModel = New Kategori_model();

		$NAME = isset($_POST['name']) ? $_POST['name']:"";
        $DESCRIPTION = isset($_POST['description']) ? $_POST['description']:"";
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($NAME)){
            $ERROR_MESSAGE = "Nama kategori wajib diisi!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['NAME'] = $NAME;
        $param['DESCRIPTION'] = $DESCRIPTION;
        $param['CREATED_DATE'] = date('Y-m-d H:i:s');
        $param['CREATED_BY'] = $CREATED_BY;

        $Retrieve = $db->table('MS_KATEGORI')->insert($param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil disimpan";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function updaterow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $KategoriModel = New Kategori_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $NAME = isset($_POST['name']) ? $_POST['name']:"";
        $DESCRIPTION = isset($_POST['description']) ? $_POST['description']:"";
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($NAME)){
            $ERROR_MESSAGE = "Nama kategori wajib diisi!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['NAME'] = $NAME;
        $param['DESCRIPTION'] = $DESCRIPTION;
        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $KategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function deleterow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $KategoriModel = New Kategori_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['STATUS'] = "INACTIVE";
        $param['DELETED_DATE'] = date('Y-m-d H:i:s');
        $param['DELETED_BY'] = $CREATED_BY;

        $Retrieve = $KategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil dihapus";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function statusrow()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $KategoriModel = New Kategori_model();
        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $STATUS = isset($_POST['status']) ? $_POST['status']:"";

        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        if($STATUS == "ACTIVE"){
            $NEW_STATUS = "INACTIVE";
        }else{
            $NEW_STATUS = "ACTIVE";
        }
        $param['STATUS'] = $NEW_STATUS;
        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $KategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function addsub()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $KategoriModel = New Kategori_model();

        $KATEGORI = isset($_POST['kategori']) ? $_POST['kategori']:"";
        $NAME = isset($_POST['name']) ? $_POST['name']:"";
        $DESCRIPTION = isset($_POST['description']) ? $_POST['description']:"";
        $TITLE_LABEL = isset($_POST['title_label']) ? $_POST['title_label']:"";
        $LABEL = isset($_POST['label']) ? $_POST['label']:"";
        $URL = isset($_POST['url']) ? $_POST['url']:"";
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($KATEGORI)){
            $ERROR_MESSAGE = "Kategori wajib di pilih!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }elseif(empty($NAME)){
            $ERROR_MESSAGE = "Nama sub kategori wajib diisi!";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }elseif(empty($URL)){
            $ERROR_MESSAGE = "URL wajib diisi!";
            $ERROR_CODE = "EC:003A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['ID_KATEGORI'] = $KATEGORI;
        $param['NAME'] = $NAME;
        $param['DESCRIPTION'] = $DESCRIPTION;
        $param['TITLE_LABEL'] = $TITLE_LABEL;
        $param['LABEL'] = $LABEL;
        $param['URL'] = $URL;
        $param['CREATED_DATE'] = date('Y-m-d H:i:s');
        $param['CREATED_BY'] = $CREATED_BY;

        $Retrieve = $db->table('MS_SUB_KATEGORI')->insert($param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal menyimpan data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil disimpan";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function updaterowsub()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $SubKategoriModel = New Sub_kategori_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $ID_KATEGORI = isset($_POST['kategori']) ? $_POST['kategori']:"";
        $NAME = isset($_POST['name']) ? $_POST['name']:"";
        $DESCRIPTION = isset($_POST['description']) ? $_POST['description']:"";
        $TITLE_LABEL = isset($_POST['title_label']) ? $_POST['title_label']:"";
        $LABEL = isset($_POST['label']) ? $_POST['label']:"";
        $URL = isset($_POST['url']) ? $_POST['url']:"";
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        if(empty($ID_KATEGORI)){
            $ERROR_MESSAGE = "Kategori wajib di pilih!";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }elseif(empty($NAME)){
            $ERROR_MESSAGE = "Nama kategori wajib diisi!";
            $ERROR_CODE = "EC:001B";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }elseif(empty($URL)){
            $ERROR_MESSAGE = "URL wajib diisi!";
            $ERROR_CODE = "EC:001C";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['ID_KATEGORI'] = $ID_KATEGORI;
        $param['NAME'] = $NAME;
        $param['DESCRIPTION'] = $DESCRIPTION;
        $param['TITLE_LABEL'] = $TITLE_LABEL;
        $param['LABEL'] = $LABEL;
        $param['URL'] = $URL;
        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $SubKategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function deleterowsub()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }
        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $SubKategoriModel = New Sub_kategori_model();

        $ID = isset($_POST['id']) ? $_POST['id']:"";
        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $param['STATUS'] = "INACTIVE";
        $param['DELETED_DATE'] = date('Y-m-d H:i:s');
        $param['DELETED_BY'] = $CREATED_BY;

        $Retrieve = $SubKategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil dihapus";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }

    public function statusrowsub()
    {
        $db = \Config\Database::connect();
        $CustomConfig = new \Config\CustomConfig();
        $Apps = $CustomConfig->apps;

        $SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_MESSAGE = "Silahkan login kembali !";
            $ERROR_CODE = "EC:0000";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $CREATED_BY = isset($SESSION_LOGIN->USERNAME) ? $SESSION_LOGIN->USERNAME:"";

        $SubKategoriModel = New Sub_kategori_model();
        $ID = isset($_POST['id']) ? $_POST['id']:"";
        $STATUS = isset($_POST['status']) ? $_POST['status']:"";

        if(empty($ID)){
            $ERROR_MESSAGE = "Data tidak ditemukan !";
            $ERROR_CODE = "EC:001A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        if($STATUS == "ACTIVE"){
            $NEW_STATUS = "INACTIVE";
        }else{
            $NEW_STATUS = "ACTIVE";
        }
        $param['STATUS'] = $NEW_STATUS;
        $param['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $param['UPDATED_BY'] = $CREATED_BY;

        $Retrieve = $SubKategoriModel->update($ID ,$param);

        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal perbaharui data !";
            $ERROR_CODE = "EC:002A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Data berhasil diperbaharui";
        $ERROR_CODE = "EC:0000";

        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        die(json_encode($JSON));
    }
    
}