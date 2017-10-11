<?php  

class crud extends CI_Controller {
 
 public function __construct() {
  parent::__construct();
  $this->load->model('My_Model');
 }

    public function index(){
        $data = $this->My_Model->get_barang();
        $this->load->view('Tabels', array('data' => $data));
    }

   public function do_upload($Uktp){
        $imagee = $_FILES['Ufoto']['name'];
        
        $type = explode('.', $imagee);
		$type = strtolower($type[count($type)-1]);
		$url = "./assets/images/".uniqid(rand()).'.'.$type;
		if(in_array($type, array("jpg", "jpeg", "gif", "png")))
			if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
				if(move_uploaded_file($_FILES["pic"]["tmp_name"],$url))
					return $url;
		return "";
    }

function create(){
	if (isset($_POST['btnSubmit'])){
            $target = "./assets/images/".basename($_FILES['Ufoto']['name']);
            
            $Uktp = $_POST['Uktp'];
            $Uname = $_POST['Uname'];
            $Uaddress = $_POST['Uaddress'];
            $Uphone = $_POST['Uphone'];
            $Username = $_POST['Username'];
            $Upassword = $_POST['Upassword'];
            $Ufoto = $_FILES['Ufoto']['name'];

            $data_insert = array(
                'Uktp' => $Uktp,
                'Uname' => $Uname,
                'Uaddress' => $Uaddress,
                'Uphone' => $Uphone,
                'Ufoto' => $target

            );

            
            if(is_uploaded_file($_FILES['Ufoto']['tmp_name'])){
                move_uploaded_file($_FILES['Ufoto']['tmp_name'], $target);
                redirect ('index.php/Admin/Input');
            }
            $res = $this->db->insert('daftar_barang', $data_insert) or trigger_error(mysql_error().$sql);

            
        }
}
public function edit_data($Uktp){
        $barang = $this->My_Model->get_barang("where Uktp = $Uktp");
        $data = array(
            "Uktp" => $barang[0]['Uktp'],
            "Uname" => $barang[0]['Uname'],
            "Uaddress" => $barang[0]['Uaddress'],
            
            "Uphone" => $barang[0]['Uphone'],
            
             );
        $this->load->view('mimin/Head');
        $this->load->view('mimin/Form_edit',$data);
            $this->load->view('mimin/Sidebar');

    }

    public function do_update(){
        
        $Uktp = $this->input->post('Uktp');
        $Uname = $this->input->post('Uname');
        $Uaddress = $this->input->post('Uaddress');
            
        $Uphone = $this->input->post('Uphone');
        
        $data_update = array(
            'Uktp' => $Uktp,
            'Uname' => $Uname,
            'Uaddress' => $Uaddress,
            'Uphone' => $Uphone
            ); 
        $where = $_POST['Uktp'];
        $this->My_Model->update($data_update, $Uktp);
        redirect('index.php/admin/tabels');

        // if($res>=1){
        //     redirect('index.php/admin/tabels');
        // }
    }

    public function do_delete($Uktp){
        $wheree = array('Uktp' => $Uktp);
        $res = $this->My_Model->delete('daftar_barang',$wheree);
        if($res>=1){
            redirect('index.php/Crud/index');
        }
    }
    public function saran(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

        $notif['status'] = "Saran anda telah kami terima";

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['charset'] = "utf-8";
        $config['smtp_user'] = "farchan1998@gmail.com";
        $config['smtp_pass'] = "farchan614";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['validation'] = TRUE;

        $this->email->initialize($config);
        $this->email->to('farchan1998@gmail.com');
        $this->email->from('farchan1998@gmail.com' , 'farchan');
        $this->email->subject('Booking diterima !');
        $this->email->message('Hai, anda menerima pesan dari ' . $nama . " !" . "email : " . $email . "pesan : " . $pesan);
        $this->email->send();

        $this->load->view('Contact', $notif);
        }

 }?>