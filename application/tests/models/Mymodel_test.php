<?php
class Mymodel_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Mymodel');
        $this->user= $this->CI->Mymodel;
    }

    
}
