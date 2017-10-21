<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

    class Home_test extends TestCase{
        public function setUp(){
            $this->resetInstance();
            $this->CI->load->model('Mymodel');
            $this->obj = $this->CI->Mymodel;
        }
    
        public function test_index(){
            $_SESSION['nama'] = "testing";
            $_SESSION['status'] = "login";
            $output = $this->request('GET', 'Home/index');
            $this->assertContains('<h1>Welcome to Tekumamba, testing ! </h1>', $output);
        }
    
        public function test_index_nosession(){
            $_SESSION['nama'] = "";
            $_SESSION['status'] = "";
            $output = $this->request('GET', 'Home/index');
            $this->assertContains('<h1>Welcome to Tekumamba</h1>', $output);
        }
    
        public function test_index_namasessionsalah(){
            $_SESSION['status'] = "salah";
            $output = $this->request('GET', 'Home/index');
            $this->assertContains('<h1>Welcome to Tekumamba</h1>', $output);
        }
    
        public function test_view_profile(){
            $_SESSION['nama'] = "testing";
            $_SESSION['status'] = "login";
            $output = $this->request('GET', 'Home/viewProfile');
            $this->assertContains('<h3 class="section-title">Profile</h3>', $output);
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
        }
        
        public function test_updateProfile(){
            $_SESSION['nama'] = "nasywa";
            $_SESSION['status'] = "login";
            $Username = 'nasywa';
            $Uktpsebelum = '52151001';
            $Uktpsesudah = '52151001';
            $Unamesebelum = 'nasywa tok';
            $Unamesesudah = 'nasywa tok1';
            $Uemailsebelum = 'nasywatok@tok.com';
            $Uemailsesudah = 'nasywatok@tok.com1';
            $Uphonesebelum = '1212121';
            $Uphonesesudah = '12121211';
            $Uaddresssebelum = 'jalan tok';
            $Uaddresssesudah = 'jalan tok1';
            
           $profilsebelum = $this->obj->get_update($Username,
                                      $Uktpsebelum,
                                      $Unamesebelum,
                                      $Uemailsebelum,
                                      $Uphonesebelum,
                                      $Uaddresssebelum);
           $this->assertEquals(1, $profilsebelum);
           $profilsetelah = $this->obj->get_update($Username,
                                      $Uktpsesudah,
                                      $Unamesesudah,
                                      $Uemailsesudah,
                                      $Uphonesesudah,
                                      $Uaddresssesudah);
           $this->assertEquals(0, $profilsetelah);
           $this->request('POST', 'Home/updateProfile',
                [
                'Uktp' => '52151001',
                'Uname' => 'nasywa tok1',
                'Uemail' => 'nasywatok@tok.com1',
                'Uphone' => '12121211',
                'Uaddress' => 'jalan tok1'
                ]);
            $profilsebelum2 = $this->obj->get_update($Username,
                                      $Uktpsebelum,
                                      $Unamesebelum,
                                      $Uemailsebelum,
                                      $Uphonesebelum,
                                      $Uaddresssebelum);
           $this->assertEquals(0, $profilsebelum2);
           $profilsetelah2 = $this->obj->get_update($Username,
                                      $Uktpsesudah,
                                      $Unamesesudah,
                                      $Uemailsesudah,
                                      $Uphonesesudah,
                                      $Uaddresssesudah);
           $this->assertEquals(1, $profilsetelah2);
        }

       public function test_registerData(){
           $totalsebelum = $this->obj->get_total_data('2222',
                                      'coba',
                                      'coba@coba.com',
                                      'coba',
                                      'coba',
                                      '12121212');
           $outputsukses = $this->request('POST', 'Home/registerData',
                [
                'register-submit' => 'true',
                'Uktp' => '2222',
                'Uname' => 'coba',
                'Uemail' => 'coba@coba.com',
                'Username' => 'coba',
                'Upassword' => 'coba',
                'Uphone' => '12121212'
                ]);
            $total_setelah = $this->obj->get_total_data('2222',
                                      'coba',
                                      'coba@coba.com',
                                      'coba',
                                      'coba',
                                      '12121212');
            $this->assertEquals($total_setelah, $totalsebelum+1);
            $this->assertContains('<label>REGISTER SUKSES</label>', $outputsukses);
        }
        
        public function test_registerDatareload(){
            $this->request('GET', 'Home/registerData');
            $this->assertRedirect('index.php/Login');
        }
        
        public function test_registerData_double(){
            $totalsebelum = $this->obj->get_total_data('1',
                                      'testing',
                                      'testing@testing',
                                      'testing',
                                      'testing',
                                      '555555');
            $outputgagal = $this->request('POST', 'Home/registerData',
                [
                'register-submit' => 'true',
                'Uktp' => '1',
                'Uname' => 'testing',
                'Uemail' => 'testing@testing.com',
                'Username' => 'testing',
                'Upassword' => 'testing',
                'Uphone' => '555555'
                ]);
            $total_setelah = $this->obj->get_total_data('1',
                                      'testing',
                                      'testing@testing',
                                      'testing',
                                      'testing',
                                      '555555');
            $this->assertEquals($total_setelah, $totalsebelum);
            $this->assertContains('<label>REGISTER GAGAL. KTP/Username anda telah terdaftar.</label>', $outputgagal);
        }
        
        public function test_hapusAkun(){
            $_SESSION['nama'] = "a";
            $_SESSION['status'] = "login";
            $totalsebelumdihapus = $this->obj->get_total_data('2',
                                      'a',
                                      'a@a.com',
                                      'a',
                                      'a',
                                      '1');
            $this->request('POST', 'Home/hapusAkun');
            $totalsetelahdihapus = $this->obj->get_total_data('2',
                                      'a',
                                      'a@a.com',
                                      'a',
                                      'a',
                                      '1');
            $this->assertEquals($totalsetelahdihapus, $totalsebelumdihapus-1);
            $this->assertRedirect('index.php/Login');
            $this->assertEquals('', $_SESSION['nama']);
            $this->assertEquals('', $_SESSION['status']);
        }
        
        public function test_hapusAkun_noSession(){
          $_SESSION['nama'] = "";
          $_SESSION['status'] = "";
          $this->request('POST', 'Home/hapusAkun');
          $this->assertRedirect('index.php/Login');
          $this->assertEquals('', $_SESSION['nama']);
          $this->assertEquals('', $_SESSION['status']);
        }
    }
?>

