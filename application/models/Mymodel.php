<?php
    Class Mymodel extends CI_Model{
        public function GetProfile($where=""){
            $data = $this->db->query('SELECT * FROM user '. $where);
            return $data->result_array();
        }
               
        public function update_profile($user, $data){
            $this->db->where('Username', $user);
            return $this->db->update('user', $data);
	   }

        public function tambah_akun($data_insert) {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('Uktp', $data_insert['Uktp']);
            $this->db->or_where('Username', $data_insert['Username']);
       
            $exist = ( $this->db->get()->num_rows() > 0 ) ? true : false ;
            if ( ! $exist ) {
                $query = $this->db->insert('user', $data_insert);
                return ( ! $query ) ?  $this->db->error() : true; 
            }
            return false;
        }
        
        public function get_total_data($Uktp, $Uname, $Uemail, $Username, $Upassword, $Uphone){
            $this->db->where('Uktp', $Uktp);
            $this->db->where('Uname', $Uname);
            $this->db->where('Uemail', $Uemail);
            $this->db->where('Username', $Username);
            $this->db->where('Upassword', md5($Upassword));
            $this->db->where('Uphone', $Uphone);
            $query = $this->db->get('user');
            return $query->num_rows();
        }
        
        public function get_update($Username, $Uktp, $Uname, $Uemail, $Uphone, $Uaddress){
          //  $data = array('Uktp' => $Uktp, 'Uname' => $Uname, 'Uemail' => $Uemail, 'Uphone' => $Uphone, 'Uaddress' => $Uaddress);
            $this->db->where('Username', $Username);
            $this->db->where('Uktp', $Uktp);
            $this->db->where('Uname', $Uname);
            $this->db->where('Uemail', $Uemail);
            $this->db->where('Uphone', $Uphone);
            $this->db->where('Uaddress', $Uaddress);
            $query = $this->db->get('user');
            return $query->num_rows();
        }
       
        public function get_profile_id($username){ //read database
            $this->db->where('username', $username);
            $query = $this->db->get('user'); //mengambil data dari table barang 
            return $query->row_array(); //data disimpan dalam row
        }

        public function delete_data($id){
            return $this->db->delete('user', array('no'=>$id));
        }
     }   
?>