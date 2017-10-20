<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Mymodel');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('upload');
  	//  $this->load->library('encryption');
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
                $Uktp = $_POST['Uktp'];
                $Username = $_POST['Username'];
                $Upassword = $_POST['Upassword'];
                $Uname =  $_POST['Uname'];
                $Uemail = $_POST['Uemail'];
                $Uphone = $_POST['Uphone'];
                $data_insert = array(
                                'Uktp' => $Uktp,
                                'Username' => $Username,
                                'Upassword' => md5($Upassword),
                                'Uname' => $Uname,
                                'Uemail' => $Uemail,
                                'Uphone' => $Uphone,
                             //   'Ufoto' => $target
                );
                $query = $this->Mymodel->tambah_akun($data_insert);

                if($query == false){
//                    redirect("index.php/Login");
                    $data['err_message'] = "REGISTER GAGAL. KTP/Username anda telah terdaftar.";
                    $this->load->view('viewLogin', $data);
                }else{
//                    redirect("index.php/Login");
                    $data['err_message'] = "REGISTER SUKSES";
                    $this->load->view('viewLogin', $data);  
                }
            }else{
                redirect('index.php/Login');
            }
        }

        public function viewProfile(){
            if($this->session->userdata('status') != "login"){
                $this->load->view('viewHome');
            }else{
                $session = (string)($this->session->userdata('nama'));
                $Username = $session;
                $profil = $this->Mymodel->GetProfile("where Username = '$Username'");
                $data = array(
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
            $is_submit = $this->input->post('is_submit');
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
            }else{
                redirect('index.php/Home/viewProfile');
            }
        }
//        }else{
  //          echo yes;
  //          $data['user'] = $this->Mymodel->get_profile_id($Username);
  //          $this->load->view('viewProfil', $data);
  //      }

        public function updateProfile(){
            $this->form_validation->set_rules('Uktp', 'KTP', 'required');
            $this->form_validation->set_rules('Uname', 'Name', 'required');
            $this->form_validation->set_rules('Uemail', 'Email', 'required');
            $this->form_validation->set_rules('Uphone', 'Phone', 'required');
            $this->form_validation->set_rules('Uaddress', 'Address', 'required');
            //$session = (string)($this->session->userdata('Uname'));
            $Username = $this->session->userdata('nama');
            $user = $session;
            

                $this->load->helper('security');
                $Uktp = $this->input->post('Uktp', true);
                $Uname  = $this->input->post('Uname', true);
                $Uemail = $this->input->post('Uemail', true);
                $Uphone = $this->input->post('Uphone', true);
                $Uaddress = $this->input->post('Uaddress', true);
               
                $data =array(
                'Username' => $Username,
                'Upassword' => md5($password),
                'Uktp' => $Uktp,
                'Uname' => $Uname,
                'Uemail' => $Uemail,
                'Uphone' => $Uphone,
                'Uaddress' => $Uaddress
                );
                
                $this->Mymodel->update_profile($Username, $data);
                redirect('index.php/Home/ViewProfile'); }


        public function hapusAkun(){
            if($this->session->userdata('nama')){
                $session = (string)($this->session->userdata('nama'));
                $Username = $session;
                $profil = $this->Mymodel->GetProfile("where Username = '$Username'");
                $id = $profil[0]['no'];
                $this->Mymodel->delete_data($id);
                $this->session->unset_userdata('nama');
                $this->session->unset_userdata('status');
                $this->session->sess_destroy();
                redirect('index.php/Login');
            }else{ redirect('index.php/Login'); }
        } 
    }
?>