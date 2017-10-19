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

    }


	/*	public function get_profile_id($username){ //read database
		    $this->db->where('username', $username);
		    $query = $this->db->get('user'); //mengambil data dari table barang dimana kode_barang = $kode_barang
		    return $query->row_array(); //data disimpan dalam row
		} */
    
?>