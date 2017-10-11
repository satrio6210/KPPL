<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function GetBarang($where=""){
			$data = $this->db->query('select * from barang '.$where);
			return $data->result_array();
		}
	//public function Getimages($where=""){
			//$data = $this->db->query('select * from images '.$where);
			//return $data->result_array();

	//}

		public function Insertdata($tabelName,$data){
			$res = $this->db->Insert($tabelName,$data);
			return $res;

		}

		public function UpdateData($tabelName,$data,$where){
			$res = $this->db->Update($tabelName,$data,$where);
			return $res;

		}

		public function DeleteData($tabelName,$where){
			$res = $this->db->Delete($tabelName,$where);
			return $res;

		}
	
	}
