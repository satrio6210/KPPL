<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct() {
		parent::__construct();
        $this->load->model('model_login');
	}

	public function index(){   
		if($this->session->userdata('akses')){
            $this->load->view('admin/navbar/navbar');
            $this->load->view('admin/content/dashboard');
            $this->load->view('admin/footer/footer');
        }else {       
            $this->load->view('user/login');
         }
	}
    
    public function login(){
        if(isset($_POST['Login'])){
            $Username   =   $this->input->post('Username');
            $Upassword   =   $this->input->post('Upassword');
            $hasil      =   $this->model_login->login($Username,$Upassword);
            if($hasil==TRUE){
                $this->session->set_userdata('akses',TRUE);
                //bawah ini yg ak tambahin index.php
                redirect ('index.php/welcome');
            } else{
                echo '<script language="javascript">';
                echo 'alert("Login Gagal. Perhatikan username password");';
                echo '</script>';
                $this->load->view('user/login');
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('index.php/welcome');
    }

    public function register(){
        $this->session->sess_destroy();
        $this->load->view('user/register');
    }
}