<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

    class Login_test extends TestCase{
        public function setUp(){
            $this->resetInstance();
        }
    
        public function test_index(){
            $_SESSION['nama'] = "testing";
            $_SESSION['status'] = "login";
        
            $output = $this->request('GET', 'Login/index');
            $this->assertRedirect('index.php/Home');
        }
        
        public function test_index_nosession(){
            $_SESSION['nama'] = "";
            $_SESSION['status'] = "";
            $output = $this->request('GET', 'Login/index');
            $this->assertContains('<a href="#" class="active" id="login-form-link">Login</a>', $output);
        }
    
        public function test_aksi_login(){
      //  $this->assertFalse( isset($_SESSION['username']) );
            $this->request('POST', 'Login/aksi_login',
                [
                'Username' => 'testing',
                'Upassword' => 'testing',
                ]);
            $this->assertRedirect('index.php/Home');
            $this->assertEquals('testing', $_SESSION['nama']);
        }
    
        public function test_aksi_login_nousername(){
            $output = $this->request('POST', 'Login/aksi_login',
                [
                'Username' => '',
                'Upassword' => 'testing'
                ]);
            $this->assertContains('<a href="#" class="active" id="login-form-link">Login</a>', $output);
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
        
        public function test_aksi_login_nopassword(){
            $output = $this->request('POST', 'Login/aksi_login',
                [
                'Username' => 'testing',
                'Upassword' => ''
                ]);
            $this->assertContains('<a href="#" class="active" id="login-form-link">Login</a>', $output);
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
    
        public function test_aksi_login_usernameunmatch(){
      //  $this->assertFalse( isset($_SESSION['username']) );
           $output = $this->request('POST', 'Login/aksi_login',
                [
                'Username' => 'unmatch',
                'Upassword' => 'testing',
                ]);
            //$output = $this->request('GET', 'Login/aksi_login');
            $this->assertContains('<label>USERNAME / PASSWORD SALAH</label>', $output);
        
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
    
        public function test_aksi_login_passwordunmatch(){
      //  $this->assertFalse( isset($_SESSION['username']) );
          $output = $this->request('POST', 'Login/aksi_login',
                [
                'Username' => 'testing',
                'Upassword' => 'unmatch',
                ]);
        //    $output = $this->request('GET', 'Login/aksi_login');
            $this->assertContains('<label>USERNAME / PASSWORD SALAH</label>', $output);
        
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
    
        public function test_aksi_login_usernamepasswordunmatch(){
      //  $this->assertFalse( isset($_SESSION['username']) );
          $output = $this->request('POST', 'Login/aksi_login',
                [
                'Username' => 'unmatch',
                'Upassword' => 'unmatch',
                ]);
        //    $output = $this->request('GET', 'Login/aksi_login');
            $this->assertContains('<label>USERNAME / PASSWORD SALAH</label>', $output);
        
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
    
        public function test_logout(){
            $_SESSION['nama'] = "testing";
            $_SESSION['status'] = "login";
            $this->assertTrue( isset($_SESSION['nama']) );
            $this->request('GET', 'Login/logout');
            $this->assertRedirect('index.php/Home');
            $this->assertFalse( isset($_SESSION['nama']));
        }
    }
?>

