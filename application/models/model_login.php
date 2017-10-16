<?php
class Model_login extends CI_Model{

//    function login($Username,$Upassword){
  //      $cek = $this->db->get_where('user',array('Username'=>$Username,'Upassword'=>
        //md5
  //      md5($Upassword)));
   //     if($cek->num_rows()>0){
  //          return TRUE;
  //      }else{
   //         return FALSE;
 //       }
 //   }
 
    function cek_login($table,$where){      
        return $this->db->get_where($table,$where);
    }   
}