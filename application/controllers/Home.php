<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
  		parent::__construct();
  		$this->load->model('Mymodel');
  	//	$this->load->library('encryption');
 	}

 	public function index() {
		if($this->session->userdata('status') != "login"){
			$this->load->view('viewHome');
		}else{ 
			$this->load->view('viewHomeUser');
		}
	}
	

	public function registerData(){
        if (isset($_POST['register-submit'])){
            $target = "./images/".basename($_FILES['Ufoto']['name']);
            $Username = $_POST['Username'];
            $Upassword = $_POST['Upassword'];
            $Uname =  $_POST['Uname'];
            $Uemail = $_POST['Uemail'];
            $Uphone = $_POST['Uphone'];
            $data_insert = array(
                'Username' => $Username,
                'Upassword' => md5($Upassword),
                'Uname' => $Uname,
                'Uemail' => $Uemail,
                'Uphone' => $Uphone,
                'Ufoto' => $target
            );
            
            if(is_uploaded_file($_FILES['Ufoto']['tmp_name'])){
                move_uploaded_file($_FILES['Ufoto']['tmp_name'], $target);
                $data['err_message'] = "REGISTER SUKSES";
                $this->load->view('viewLogin', $data);
            } else {
                $data['err_message'] = "REGISTER SUKSES";
                $this->load->view('viewLogin', $data);
            }
            $res = $this->db->insert('user', $data_insert);
        }
    }


	public function home(){
		$this->load->view('viewHome');
	}

    public function viewProfile(){
        if($this->session->userdata('status') != "login"){
            $this->load->view('viewHome');
        }else{ 
        $session = (string)($this->session->userdata('nama'));
        $Username = $session;
        $profil = $this->Mymodel->GetProfile("where Username = '$Username'");
        $data = array(
            // "username" => $profil[0]['username'],
            // "password" => $profil[0]['password'],
            "Uktp" => $profil[0]['Uktp'],
            "Uname" => $profil[0]['Uname'],
            "Uemail" => $profil[0]['Uemail'],
            "Uphone" => $profil[0]['Uphone'],
            "Uaddress" => $profil[0]['Uaddress'],
            "Ufoto" => $profil[0]['Ufoto']
             );
        $this->load->view('viewProfil', $data);
    }
    }

    public function updatePhoto(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $is_submit = $this->input->post('is_submit');
    
        if(isset($is_submit) && $is_submit == 1){
            $fileUpload = array();
            $isUpload = FALSE;
            $config = array(
            'upload_path' => './images/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 5210
            );
            $Username = (string)($this->session->userdata('nama'));
            $this->upload->initialize($config);
            if($this->upload->do_upload('userfile')){
                $fileUpload = $this->upload->data();
                $isUpload = TRUE;
            }

            if($isUpload){
                $data =array(
                'Ufoto' => './images/' . $fileUpload['file_name']
                );
                
                $this->Mymodel->update_profile($Username, $data);
                redirect('index.php/Home/viewProfile');
            }
        }else{
            $data['user'] = $this->Mymodel->get_profile_id($Username);
            $this->load->view('viewProfil', $data);
        }
  }

    public function updateProfile(){
        $this->load->helper('form');
        $this->load->library('form_validation');

            $session = (string)($this->session->userdata('Uname'));
            $user = $session;
            $isUpload = true;

            if($isUpload){
                $Username = $this->input->post('Username');
                $Upassword = $this->input->post('Upassword');
                $Uktp = $this->input->post('Uktp');
                $Uname  = $this->input->post('Uname');
                $Uemail = $this->input->post('Uemail');
                $Uphone = $this->input->post('Uphone');
                $Uaddress = $this->input->post('Uaddress');
                $data =array(
                'Username' => $Username,
                'Upassword' => md5($password),
                'Uktp' => $Uktp,
                'Uname' => $Uname,
                'Uemail' => $Uemail,
                'Uphone' => $Uphone,
                'Uaddress' => $Uaddress
                );
                
                $this->Mymodel->update_profile($user, $data);
                redirect('index.php/Home/ViewProfile');
            }

            else{
                $data['user'] = $this->Mymodel->get_profile_id($Username);
                $this->load->view('viewProfil', $data);

            }
        }

}
