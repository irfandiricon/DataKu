<?php namespace App\Controllers;
use App\Models\Auth_model;
use Config\Custom;
use CodeIgniter\Files\File;

class Account extends BaseController
{
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
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url());
        }

        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $EMAIL);

        $param = array();
        $param['cssName'] = "Css/public.css:Css/home.css";
        $param['jsName'] = "JavaScript/public.js";
        $param['content'] = "account";
        $param['SESSION_LOGIN'] = $SESSION_LOGIN;
        $param['Profile'] = $CheckUser;

		return view('template', $param);
	}

    public function history()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            return redirect()->to(base_url());
        }

        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $EMAIL);

        $param = array();
        $param['cssName'] = "Css/public.css:Css/home.css";
        $param['jsName'] = "JavaScript/public.js";
        $param['content'] = "history";
        $param['SESSION_LOGIN'] = $SESSION_LOGIN;
        $param['Profile'] = $CheckUser;

        return view('template', $param);
    }

    public function update_profile()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Silahkan login kembali!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
            die(json_encode($JSON));
        }

        $VALID_EMAIL = "/^([\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/";
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";
        $VALID_PASSWORD = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";

        $NAME = isset($_POST['name']) ? $_POST['name']:"";
        $NO_HP = isset($_POST['no_hp']) ? $_POST['no_hp']:"";
        $EMAIL = isset($_POST['email']) ? $_POST['email']:"";

        if(empty($NAME)){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "Nama lengkap wajib diisi!";
            die(json_encode($JSON));
        }elseif(empty($NO_HP)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "No handphone wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $NO_HP)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "No handphone tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($EMAIL)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Email wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_EMAIL, $EMAIL)){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Email tidak valid!";
            die(json_encode($JSON));
        }

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "ID", $ID);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu";
            die(json_encode($JSON));
        }

        $NAME_SESSION = isset($CheckUser->NAME) ? $CheckUser->NAME:"";
        $EMAIL_SESSION = isset($CheckUser->EMAIL) ? $CheckUser->EMAIL:"";
        $NO_HP_SESSION = isset($CheckUser->NO_HP) ? $CheckUser->NO_HP:"";

        if($EMAIL_SESSION != $EMAIL){
            $CheckEmail = $AuthModel->CheckRow("CUSTOMER", "EMAIL", $EMAIL);
            if(!empty($CheckEmail)){
                $JSON['ERROR_CODE'] = "EC:006A";
                $JSON['ERROR_MESSAGE'] = "Email sudah terdaftar!";
                die(json_encode($JSON));
            }
        }

        if($NO_HP_SESSION != $NO_HP){
            $CheckPhone = $AuthModel->CheckRow("CUSTOMER", "NO_HP", $NO_HP);
            if(!empty($CheckPhone)){
                $JSON['ERROR_CODE'] = "EC:007A";
                $JSON['ERROR_MESSAGE'] = "No handphone sudah terdaftar!";
                die(json_encode($JSON));
            }
        }

        $paraminsert['NAME'] = $NAME;
        $paraminsert['EMAIL'] = $EMAIL;
        $paraminsert['NO_HP'] = $NO_HP;
        $paraminsert['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $paraminsert['UPDATED_BY'] = $EMAIL;

        $Retrieve =  $AuthModel->update($ID, $paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal memperbaharui data!";
            $ERROR_CODE = "EC:008A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $_SESSION['SESSION_LOGIN'][$Apps]['NAME'] = $NAME;
        $_SESSION['SESSION_LOGIN'][$Apps]['EMAIL'] = $EMAIL;
        $_SESSION['SESSION_LOGIN'][$Apps]['NO_HP'] = $NO_HP;

        $ERROR_MESSAGE = "Berhasil memperbaharui data";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YED");
        die(json_encode($JSON));
    }

    public function update_password()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Silahkan login kembali!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
            die(json_encode($JSON));
        }
        
        $VALID_EMAIL = "/^([\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4})?$/";
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";
        $VALID_PASSWORD = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";
        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

        $OLD_PASSWORD = isset($_POST['old_password']) ? $_POST['old_password']:"";
        $NEW_PASSWORD = isset($_POST['new_password']) ? $_POST['new_password']:"";
        $CPASSWORD = isset($_POST['cpassword']) ? $_POST['cpassword']:"";

        if(empty($NEW_PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "Password baru wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $NEW_PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "Password baru tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($CPASSWORD)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi password wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $CPASSWORD)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi password tidak valid!";
            die(json_encode($JSON));
        }elseif($NEW_PASSWORD != $CPASSWORD){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "Password tidak sama!";
            die(json_encode($JSON));
        }

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "ID", $ID);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu";
            die(json_encode($JSON));
        }

        $PASSWORD_SESSION = isset($CheckUser->PASSWORD) ? $CheckUser->PASSWORD:"";
        $REFERRAL_SESSION = isset($CheckUser->REFERRAL_ID) ? $CheckUser->REFERRAL_ID:"";

        if($PASSWORD_SESSION != md5($REFERRAL_SESSION.$OLD_PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:07A";
            $JSON['ERROR_MESSAGE'] = "Password lama anda tidak sesuai!";
            die(json_encode($JSON));
        }

        $PASSWORD = md5($REFERRAL_SESSION.$NEW_PASSWORD);

        $paraminsert['PASSWORD'] = $PASSWORD;
        $paraminsert['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $paraminsert['UPDATED_BY'] = $EMAIL;

        $Retrieve =  $AuthModel->update($ID, $paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal memperbaharui data!";
            $ERROR_CODE = "EC:008A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Berhasil memperbaharui data";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YED");
        die(json_encode($JSON));
    }

    public function update_pin()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Silahkan login kembali!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
            die(json_encode($JSON));
        }
        
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";
        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

        $PIN = isset($_POST['pin']) ? $_POST['pin']:"";
        $CPIN = isset($_POST['cpin']) ? $_POST['cpin']:"";

        if(empty($PIN)){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $PIN)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($CPIN)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi PIN Transaksi wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $CPIN)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi PIN Transaksi tidak valid!";
            die(json_encode($JSON));
        }elseif($PIN != $CPIN){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi tidak sama!";
            die(json_encode($JSON));
        }elseif(strlen($PIN) < 4){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi diwajibkan 4 digit angka!";
            die(json_encode($JSON));
        }elseif(strlen($CPIN) < 4){
            $JSON['ERROR_CODE'] = "EC:007A";
            $JSON['ERROR_MESSAGE'] = "Konfirmasi PIN Transaksi diwajibkan 4 digit angka!";
            die(json_encode($JSON));
        }

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "ID", $ID);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:008A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu";
            die(json_encode($JSON));
        }

        $REFERRAL_SESSION = isset($CheckUser->REFERRAL_ID) ? $CheckUser->REFERRAL_ID:"";
        $PIN = md5($REFERRAL_SESSION.$PIN);

        $paraminsert['PIN'] = $PIN;
        $paraminsert['UPDATED_DATE'] = date('Y-m-d H:i:s');
        $paraminsert['UPDATED_BY'] = $EMAIL;

        $Retrieve =  $AuthModel->update($ID, $paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal memperbaharui data!";
            $ERROR_CODE = "EC:009A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        $ERROR_MESSAGE = "Berhasil memperbaharui data";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YED");
        die(json_encode($JSON));
    }

    public function inactive()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Silahkan login kembali!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
            die(json_encode($JSON));
        }
        
        $VALID_NUMBER = "/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/";
        $VALID_PASSWORD = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/";

        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";
        $EMAIL = isset($SESSION_LOGIN['EMAIL']) ? $SESSION_LOGIN['EMAIL']:"";

        $PIN = isset($_POST['pin']) ? $_POST['pin']:"";
        $PASSWORD = isset($_POST['password']) ? $_POST['password']:"";
        $CONFIRM = isset($_POST['confirm']) ? $_POST['confirm']:"";

        
        if($CONFIRM != "on"){
            $JSON['ERROR_CODE'] = "EC:000A";
            $JSON['ERROR_MESSAGE'] = "Silahkan checklist anda telah menyetujui syarat dan ketentuan!";
            die(json_encode($JSON));
        }elseif(empty($PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = "Password wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_PASSWORD, $PASSWORD)){
            $JSON['ERROR_CODE'] = "EC:002A";
            $JSON['ERROR_MESSAGE'] = "Password tidak valid!";
            die(json_encode($JSON));
        }elseif(empty($PIN)){
            $JSON['ERROR_CODE'] = "EC:003A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi wajib diisi!";
            die(json_encode($JSON));
        }elseif(!preg_match($VALID_NUMBER, $PIN)){
            $JSON['ERROR_CODE'] = "EC:004A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi tidak valid!";
            die(json_encode($JSON));
        }elseif(strlen($PIN) < 4){
            $JSON['ERROR_CODE'] = "EC:005A";
            $JSON['ERROR_MESSAGE'] = "PIN Transaksi diwajibkan 4 digit angka!";
            die(json_encode($JSON));
        }

        $CheckUser = $AuthModel->CheckRow("CUSTOMER", "ID", $ID);
        if(empty($CheckUser)){
            $JSON['ERROR_CODE'] = "EC:006A";
            $JSON['ERROR_MESSAGE'] = "Email anda tidak terdaftar, silahkan registrasi terlebih dahulu";
            die(json_encode($JSON));
        }

        $PASSWORD_SESSION = isset($CheckUser->PASSWORD) ? $CheckUser->PASSWORD:"";
        $PIN_SESSION = isset($CheckUser->PIN) ? $CheckUser->PIN:"";
        $REFERRAL_SESSION = isset($CheckUser->REFERRAL_ID) ? $CheckUser->REFERRAL_ID:"";

        $PIN = md5($REFERRAL_SESSION.$PIN);
        $PASSWORD = md5($REFERRAL_SESSION.$PASSWORD);

        if($PASSWORD != $PASSWORD_SESSION){
            $JSON['ERROR_CODE'] = "EC:007A";
            $JSON['ERROR_MESSAGE'] = "Password anda tidak sesuai!";
            die(json_encode($JSON));
        }

        if($PIN != $PIN_SESSION){
            $JSON['ERROR_CODE'] = "EC:008A";
            $JSON['ERROR_MESSAGE'] = "PIN anda tidak sesuai!";
            die(json_encode($JSON));
        }

        $paraminsert['STATUS'] = "INACTIVE";
        $paraminsert['DELETED_DATE'] = date('Y-m-d H:i:s');
        $paraminsert['DELETED_BY'] = $EMAIL;

        $Retrieve =  $AuthModel->update($ID, $paraminsert);
        if(!$Retrieve){
            $ERROR_MESSAGE = "Gagal memperbaharui data!";
            $ERROR_CODE = "EC:009A";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }

        unset($_SESSION['SESSION_LOGIN'][$Apps]);

        $ERROR_MESSAGE = "Berhasil menonaktifkan pengguna ";
        $ERROR_CODE = "EC:0000";
        $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
        die(json_encode($JSON));
    }

    public function update_photo_profile()
    {
        $CustomConfig = new \Config\Custom();
        $Apps = $CustomConfig->apps;
        $AuthModel = new Auth_model();

        $SESSION_LOGIN = isset($_SESSION['SESSION_LOGIN'][$Apps]) ? $_SESSION['SESSION_LOGIN'][$Apps]:array();
        if(empty($SESSION_LOGIN)){   
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Silahkan login kembali!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE, "NOREFRESH"=>"YES");
            die(json_encode($JSON));
        }
        $ID = isset($SESSION_LOGIN['ID']) ? $SESSION_LOGIN['ID']:"";

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                    . '|is_image[userfile]'
                    . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[userfile,100]'
                    . '|max_dims[userfile,1024,768]',
            ],
        ];
        if (!$this->validate($validationRule)) {
            $JSON['ERROR_CODE'] = "EC:001A";
            $JSON['ERROR_MESSAGE'] = json_encode($this->validator->getErrors());
            die(json_encode($JSON));
        }

        $file = $this->request->getFile('userfile');
        $filename = $_FILES['userfile']['name'];
        $Exp = explode(".", $filename);
        $Ext = $Exp[sizeof($Exp)-1];
        $FileName = "USER_ID_".$ID.".".$Ext;
        $PathFile =  "assets/image/profile/";
        $PathName = $PathFile.$FileName;

        if(file_exists(ROOTPATH.'/'.$PathFile.$FileName))
        {
            unlink(ROOTPATH.'/'.$PathFile.$FileName);
        }

        if ($file->isValid() && !$file->hasMoved()){
            $file->move(ROOTPATH.'/'.$PathFile,$FileName);

            $paramupdate['FILE_PROFILE'] = $PathName;
            $Retrieve =  $AuthModel->update($ID, $paramupdate);
            if(!$Retrieve){
                $ERROR_MESSAGE = "Gagal memperbaharui data photo!";
                $ERROR_CODE = "EC:002A";
                $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
                die(json_encode($JSON));
            }

            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Sukses upload file";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
            die(json_encode($JSON));
        }else{
            $ERROR_CODE = "EC:0000";
            $ERROR_MESSAGE = "Gagal upload file!";
            $JSON = array("ERROR_CODE" => $ERROR_CODE, "ERROR_MESSAGE" => $ERROR_MESSAGE);
        }
    }
}
