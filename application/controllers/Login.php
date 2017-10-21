<?php 

    Class Login extends CI_Controller{

        function __construct(){
            parent::__construct();		
            $this->load->model('Model_login');
        }

        function index(){
            $data['err_message'] = "";
            if($this->session->userdata('status') != "login"){
                $this->load->view('viewLogin', $data);
            }else{ 
            //echo "YOU'RE ALREADY LOGGED IN";
                redirect("index.php/Home");
            }	
        }

        function aksi_login(){
            $this->load->helper('security');
            $Username = $this->input->post('Username', true);
            $Upassword = $this->input->post('Upassword', true);
            $where = array(
                    'Username' => $Username,
                    'Upassword' => md5($Upassword)
            );
            $cek = $this->Model_login->cek_login("user",$where);
            if($cek->num_rows()==1){
                $data_session = array(
				'nama' => $Username,
				'status' => "login",
                );
                $this->session->set_userdata($data_session);
                redirect("index.php/Home");
            }else{ $data['err_message'] = "USERNAME / PASSWORD SALAH";
                $this->load->view('viewLogin', $data);
            }
        }

        function logout(){
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('status');
            $this->session->sess_destroy();
            redirect("index.php/Home"); }
    }
?>