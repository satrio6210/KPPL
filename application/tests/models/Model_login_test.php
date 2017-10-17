<?php
class Model_login_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Model_login');
        $this->user = $this->CI->Model_login;
    }
    
    function test_cek_login($table,$where){      
        return $this->db->get_where($table,$where);
        $obj            = new stdClass();
        $obj->Username  = "cicici";
        $obj->Upassword  = "cicici";
        
        $actual = $this->user->Username(cicici);
        $this->assertEquals($obj, $actual);
    } 
}
