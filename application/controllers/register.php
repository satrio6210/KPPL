<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('My_Model');
 }

	public function index()
	{
		$this->load->view('index');
	}

	public function registerData(){
        if (isset($_POST['btnSubmit'])){
            $target = "./assets/images/".basename($_FILES['Ufoto']['name']);
            $Uktp = $_POST['Uktp'];
            $Username = $_POST['Username'];
            $Upassword = $_POST['Upassword'];
            $Uname =  $_POST['Uname'];
            $Uaddress = $_POST['Uaddress'];
            $jenis = $_POST['jenis'];
            $Uphone = $_POST['Uphone'];
            
            $data_insert = array(
                'Uktp' => $Uktp,
                'Username' => $Username,
                'Upassword' => sha1($Upassword),
                'Uname' => $Uname,
                'Uaddress' => $Uaddress,
                'jenis' => $jenis,
                'Uphone' => $Uphone,
                'Ufoto' => $target
            );
            if(is_uploaded_file($_FILES['Ufoto']['tmp_name'])){
                move_uploaded_file($_FILES['Ufoto']['tmp_name'], $target);
                $data['err_message'] = "REGISTER SUKSES";
                $this->load->view('berhasil', $data);
            } else {
                $data['err_message'] = "REGISTER Gagal";
                $this->load->view('gagal', $data);
            }
            $res = $this->My_Model->addData($data_insert);// or trigger_error(mysql_error().$sql);
        }
    }
}
