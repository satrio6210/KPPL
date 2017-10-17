<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Login_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
    }
    
    public function test_index(){
        $_SESSION['nama'] = "cicici";
        $_SESSION['status'] = "login";
        
        $output = $this->request('GET', 'Login/index');
        $this->assertRedirect('index.php/Home');
    }
    
    public function test_aksi_login(){
      //  $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'Login/aksi_login',
            [
                'Username' => 'cicici',
                'Upassword' => 'cicici',
            ]);
        $this->assertRedirect('index.php/Home');
        $this->assertEquals('cicici', $_SESSION['nama']);
    }
    
    public function test_aksi_login_nousername(){
      //  $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'Login/aksi_login',
            [
                'Username' => '',
                'Upassword' => 'cicici',
            ]);
        $output = $this->request('GET', 'Login');
        $this->assertContains('<a href="#" class="active" id="login-form-link">Login</a>', $output);
        $this->assertEquals('', $_SESSION['nama']);
        $this->assertEquals('', $_SESSION['status']);
    }
    
    public function test_aksi_login_nopassword(){
      //  $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'Login/aksi_login',
            [
                'Username' => 'cicici',
                'Upassword' => '',
            ]);
        $output = $this->request('GET', 'Login');
        $this->assertContains('<a href="#" class="active" id="login-form-link">Login</a>', $output);
        $this->assertEquals('', $_SESSION['nama']);
        $this->assertEquals('', $_SESSION['status']);
    }
    
    public function test_aksi_login_usernameunmatch(){
      //  $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'Login/aksi_login',
            [
                'Username' => 'unmatch',
                'Upassword' => 'cicici',
            ]);
        $output = $this->request('GET', 'Login/aksi_login');
        $this->assertContains('<label>USERNAME / PASSWORD SALAH</label>', $output);
        
        $this->assertEquals('', $_SESSION['nama']);
        $this->assertEquals('', $_SESSION['status']);
    }
    
    public function test_aksi_login_passwordunmatch(){
      //  $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'Login/aksi_login',
            [
                'Username' => 'cicici',
                'Upassword' => 'unmatch',
            ]);
        $output = $this->request('GET', 'Login/aksi_login');
        $this->assertContains('<label>USERNAME / PASSWORD SALAH</label>', $output);
        
        $this->assertEquals('', $_SESSION['nama']);
        $this->assertEquals('', $_SESSION['status']);
    }
    
    public function test_logout(){
        $_SESSION['nama'] = "cicici";
        $_SESSION['status'] = "login";
        $this->assertTrue( isset($_SESSION['nama']) );
        $this->request('GET', 'Login/logout');
        $this->assertRedirect('index.php/Home');
        $this->assertFalse( isset($_SESSION['nama']));
    }
    
/*    public function test_index_login_pencari()
    {
        $_SESSION['username'] = "ayushaqs";
        $_SESSION['tipe'] = "2";
        
        $output = $this->request('GET', 'akun');
        $this->assertRedirect('pencari');
    }
    
    public function test_index_login_pemilik()
    {
        $_SESSION['username'] = "rediangalih";
        $_SESSION['tipe'] = "1";
        $output = $this->request('GET', 'akun');
        $this->assertRedirect('pemilik');
    }
    
    public function test_index_login_admin()
    {
        $_SESSION['username'] = "admin";
        $_SESSION['tipe'] = "0";
        $output = $this->request('GET', 'akun');
        $this->assertRedirect('admin');
    }
    
    public function test_index_not_login()
    {
        $output = $this->request('GET', 'akun');
        $this->assertRedirect('akun/masuk');
    }

    public function test_profil()
    {
        $output = $this->request('GET', 'akun/profil/dewzzjr');
        $this->assertContains('<a href="mailto:dewzzpro@gmail.com">dewzzpro@gmail.com</a>', $output);
        $this->assertContains('<em>08562747444</em>', $output);
        $this->assertContains('<h4>Dewangga Prasetya Praja</h4>', $output);
    }
    public function test_profil_pencari()
    {
        $_SESSION['username'] = "ayushaqs";
        $_SESSION['tipe'] = "2";
        $this->request('GET', 'akun');
        $this->assertRedirect('pencari');
    }
    
    public function test_profil_pemilik()
    {
        $_SESSION['username'] = "rediangalih";
        $_SESSION['tipe'] = "1";
        $this->request('GET', 'akun');
        $this->assertRedirect('pemilik');
    }
    
    public function test_submit_masuk_nopassword(){
        $this->request('POST', 'akun/submit_masuk',
            [
                'username' => 'dewzzjr',
                'password' => '',
            ]);
        $this->assertRedirect('akun/masuk?fail=true');
        $this->assertFalse( isset($_SESSION['username']) );
    }
    
    public function test_submit_masuk_nousername(){
        $this->request('POST', 'akun/submit_masuk',
            [
                'username' => '',
                'password' => '123',
            ]);
        $this->assertRedirect('akun/masuk?fail=true');
        $this->assertFalse( isset($_SESSION['username']) );
    }
    
    public function test_submit_masuk_unmatch(){
        $this->request('POST', 'akun/submit_masuk',
            [
                'username' => 'dewzzjr',
                'password' => 'unmatch',
            ]);
        $this->assertRedirect('akun/masuk?fail=true');
        $this->assertFalse( isset($_SESSION['username']) );
    }
    
    public function test_submit_masuk(){
        $this->assertFalse( isset($_SESSION['username']) );
        $this->request('POST', 'akun/submit_masuk',
            [
                'username' => 'dewzzjr',
                'password' => '123',
            ]);
        $this->assertRedirect('');
        $this->assertEquals('dewzzjr', $_SESSION['username']);
    }
    
    public function test_keluar(){
        $_SESSION['username'] = "rediangalih";
        $_SESSION['tipe'] = "1";
        $this->assertTrue( isset($_SESSION['username']) );
        $this->request('GET', 'akun/keluar');
        $this->assertRedirect('');
        $this->assertFalse( isset($_SESSION['username']) );
    }
    
    public function test_keluar_(){
        $this->assertFalse( isset($_SESSION['username']) );
        $this->request('GET', 'akun/keluar');
        $this->assertRedirect('');
        $this->assertFalse( isset($_SESSION['username']) );
    }
    
    public function test_masuk(){
        $output = $this->request('GET', 'akun/masuk');
        $this->assertContains('<input type="password" name="password" value="" id="password" class="validate required"  />', $output);
        $this->assertContains('<input type="text" name="username" value="" id="username" class="validate required"  />', $output);
    }
    
    public function test_profil_404()
    {
        $this->request('GET', 'akun/profil/user_not_exist');
        $this->assertResponseCode(404);
//        $this->assertResponseHeader('charset=utf-8');
    }
    
    public function test_profil_no_param()
    {
        $this->request('GET', 'akun/profil');
        $this->assertRedirect('akun');
    }
    
    public function test_method_404()
    {
        $this->request('GET', 'kos/method_not_exist');
        $this->assertResponseCode(404);
    }

    public function test_APPPATH()
    {
        $actual = realpath(APPPATH);
        $expected = realpath(__DIR__ . '/../..');
        $this->assertEquals(
            $expected,
            $actual,
            'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
        );
    }
    
    public function test_daftar_keluar_()
    {
        $_SESSION['username']   = "ayushaqs";
        $_SESSION['tipe']       = "2";
        $_SESSION['id']         = "1000";
        
        $this->request('GET', 'pencari/daftar/5');
        $this->assertRedirect('kos/detail/5');
        
        $this->request('GET', 'pencari/keluar/5');
        $this->assertRedirect('kos/detail/5');
    } */
    
}

