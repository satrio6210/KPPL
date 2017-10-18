<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Home_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
    }
    
    public function test_index(){
        $_SESSION['nama'] = "cicici";
        $_SESSION['status'] = "login";
        $output = $this->request('GET', 'Home/index');
        $this->assertContains('<h1>Welcome to Tekumamba, cicici ! </h1>', $output);
    }
    
    public function test_index_nosession(){
        $_SESSION['nama'] = "";
        $_SESSION['status'] = "";
        $output = $this->request('GET', 'Home/index');
        $this->assertContains('<h1>Welcome to Tekumamba</h1>', $output);
    }
    
    public function test_index_namasessionsalah(){
       // $_SESSION['nama'] = "yaya";
        $_SESSION['status'] = "yaya";
        $output = $this->request('GET', 'Home/index');
        $this->assertContains('<h1>Welcome to Tekumamba</h1>', $output);
    }
    
    public function test_view_profile(){
        $_SESSION['nama'] = "cicici";
        $_SESSION['status'] = "login";
        $output = $this->request('GET', 'Home/viewProfile');
        $this->assertContains('<h3 class="section-title">Profile</h3>', $output);
 //       $this->assertContains('<input type="text" name="Uname" class="form-control" id="Uname" placeholder="Nama Panjang" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="cicici">', $output);
    }
    
    public function test_view_profile_nosession(){
        $_SESSION['nama'] = "";
        $_SESSION['status'] = "";
        $output = $this->request('GET', 'Home/viewProfile');
        $this->assertContains('<a href="http://localhost/tekumamba/index.php/Login" class="btn-get-started">Login/Register</a>', $output);
    }
    
    public function test_view_profile_bisa(){
        $_SESSION['nama'] = "sarah1234";
        $_SESSION['status'] = "login";
        $output = $this->request('GET', 'Home/viewProfile');
        $this->assertContains('<h3 class="section-title">Profile</h3>', $output);
    //    $this->assertContains('', $output);
    }
    
    public function test_registerData(){
        $target = "./images/".basename($_FILES['Ufoto']['name']);
        $this->request('POST', 'Home/registerData',
            [
             //   'tmp_name' => 'true',
                'Ufoto' => '$target',
                'tmp_name' => 'yeah',
                'register-submit' => 'true',
                'Username' => 'farchan',
                'Upassword' => 'farchan',
                'Uname' => 'farchan r',
                'Uemail' => 'farchan@email.com',
                'Uphone' => '87657656',
            ]);
      //  $this->assertRedirect('index.php/Home/registerData');
        $output = $this->request('GET', 'Login/aksi_login');
        $this->assertContains('<label>REGISTER SUKSES</label>', $output);
    }
    
    public function test_registerData_gadafoto(){
        $target = "./images/".basename($_FILES['Ufoto']['name']);
        $this->request('POST', 'Home/registerData',
            [
             //   'tmp_name' => 'true',
             //   'Ufoto' => '$target',
             //   'tmp_name' => '',
                'register-submit' => 'true',
                'Username' => 'farchan',
                'Upassword' => 'farchan',
                'Uname' => 'farchan r',
                'Uemail' => 'farchan@email.com',
                'Uphone' => '87657656',
            ]);
      //  $this->assertRedirect('index.php/Home/registerData');
        $output = $this->request('GET', 'Login/aksi_login');
        $this->assertContains('<label>REGISTER SUKSES</label>', $output);
    }
    
    public function test_updatePhoto(){
        $this->request('POST', 'Home/updatePhoto',
            [
             //   'tmp_name' => 'true',
                $isUpload => 'true',
                'Ufoto' => '$target',
                'tmp_name' => 'yeah',
                'register-submit' => 'true',
                'Username' => 'farchan',
                'Upassword' => 'farchan',
                'Uname' => 'farchan r',
                'Uemail' => 'farchan@email.com',
                'Uphone' => '87657656',
            ]);
    }
    
    public function test_updateProfile(){
        
        $this->request('POST', 'Home/updateProfie',
            [
                'Uktp' => '567890',
                'Uname' => 'farchan',
                'Uemail' => 'farchan@email.com',
                'Uphone' => '87657656',
                'Uaddress' => 'cobacoba'
            ]);
        $output = $this->request('GET', 'Home/ViewProfile');
       // $this->assertContains('<textarea class="form-control" name="Uaddress" id="Uaddress" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Alamat" value="cobacoba">cobacoba</textarea>', $output);
    }
}

