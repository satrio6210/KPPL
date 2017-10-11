<?php
	class My_Model extends CI_Model {

	function addData($data_insert) {
 			$this->db->insert('user', $data_insert);  
 		}

 	 function getData() {
 	$query = $this->db->get('user');
 	return $query->result_array();

 	}

 	function find($name){
 		$result = $this->db->where('',$name)
 						->limit(1)
 						->get('');
 		if($result->num_rows(0))
 			return $result->row();
 		else return array();
 	}

 	
}


?>