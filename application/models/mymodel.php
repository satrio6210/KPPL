<?php
	Class Mymodel extends CI_Model{

		function getData() {
 			$query = $this->db->get('booking');
 			return $query->result_array();
 		}

 		function getDataUser() {
 			$query = $this->db->get('user');
 			return $query->result_array();
 		}

 		public function GetProfile($where=""){
			$data = $this->db->query('SELECT * FROM user '. $where);
			return $data->result_array();
		}

		function addData($data) {
 			$this->db->insert('user', $data);  
 		}

 		function addBooking($data) {
 			$this->db->insert('booking', $data);  
 		}


 		function delete_item($item){
			 $this->db->where_in('id', $item);
			 $this->db->delete('booking');
		}

		function delete_user($item){
			 $this->db->where_in('id', $item);
			 $this->db->delete('user');
		}

		public function update_profile($user, $data){
		    $this->db->where('Username', $user);
		    return $this->db->update('user', $data);
		}

		public function update_profileAdmin($username, $data){
		    $this->db->where('username', $username);
		    return $this->db->update('admin', $data);
		}

		public function get_profile_id($username){ //read database
		    $this->db->where('username', $username);
		    $query = $this->db->get('user'); //mengambil data dari table barang dimana kode_barang = $kode_barang
		    return $query->row_array(); //data disimpan dalam row
		}

	}
?>