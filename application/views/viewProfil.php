<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Imperial Boootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
    
  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">
  
  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  
  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> 
  
  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('assets/imperial/lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('assets/imperial/lib/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/imperial/lib/animate-css/animate.min.css')?>" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('assets/imperial/css/style.css')?>" rel="stylesheet">
  
<!-- =======================================================
  Theme Name: Imperial
  Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
  Author: BootstrapMade.com
  Author URL: https://bootstrapmade.com
======================================================= -->
</head>

<body>
  <div id="preloader"></div>
  
<!--==========================
  Hero Section
============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="<?php echo base_url('assets/imperial/img/Biker.png')?>"alt="Tekumamba">
        </div>
        
        <h1><?php echo "Welcome to Tekumamba, " . $this->session->userdata('nama') . " !" ?> </h1>
        <h2>Yuk mas mbak! <span class="rotating">tebeng, nebeng, dengan mudah!</span></h2>
        <div class="actions">
          <a href="<?php echo base_url('index.php/Login');?>" class="btn-get-started">Nebengin</a>
          <a href="#about" class="btn-services">Nebeng ah!</a>
        </div>
      </div>
    </div>
  </section>
  
<!--==========================
  Header Section
============================-->
  <header id="header">
    <div class="container">
    
      <div id="logo" class="pull-left">
        <a href="#hero"><img src="<?php echo base_url('assets/imperial/img/logo.png')?> alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Home</a></li>
          <li><a href="#about">About Us</a></li>
    <!--      <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Lihat Profil</a></li>
              <li><a href="#">Drop Down 2</a></li>
            </ul>
          </li> -->
          <li><a href="<?php echo base_url('index.php/Home/viewProfile');?>">See Profile</a></li>
          <li><a href="<?php echo base_url('index.php/Login/logout');?>">Logout</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->\

<!--==========================
  Contact Section
============================--> 
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Profile</h3>
          <div class="section-title-divider"></div>
   <!--       <p class="section-description">Your Photo is available </p> -->
        </div>
      </div>
    

  <div class="wrap">
     <div class="main">
      <div class="content">
         <div class="section group">
        <div class="col span_2_of_3">
          <div class="contact-form">
          </div>
          </div>                   
      </div>
     </div> 
    </div>  


      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <?php echo form_open_multipart('index.php/Home/updatePhoto/'); ?>
              <form method="post" >
                <div>
                <span><label for="userfile">Photo</label></span>
                <img src="<?php echo base_url() . $Ufoto; ?>" width="100%" height="100%">
                <span><input type="file" name="userfile" size="20" class="button"/></span>
                <input type="hidden" name="is_submit" value="1" />
              </div>
                <div>
                  <span><input type="submit" value="Update"></span>
              </div>
              </form>
          <?php echo form_close(); ?>
          </div>
        </div>
        
        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="errormessage"></div>
            <?php echo form_open_multipart('index.php/Home/updateProfile/'); ?>
            <form method="post">
                <div class="form-group">
                  <input type="text" name="Uktp" class="form-control" id="Uktp" placeholder="Nomor KTP" data-rule="minlen:10" data-msg="Please enter at least 10 chars" value="<?php echo $Uktp; ?>"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" name="Uname" class="form-control" id="Uname" placeholder="Nama Panjang" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $Uname; ?>" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="Uemail" id="Uemail" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $Uemail; ?>"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="Uphone" id="Uphone" placeholder="Nomor Handphone" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation" value="<?php echo $Uphone; ?>"> </div>
                </div>
<<<<<<< HEAD

                <!--<div class="form-group">
                  <input type="text" class="form-control" name="Uaddress" id="Uaddress" placeholder="Alamat" data-rule="required" data-msg="Please write something for us" value="<?php echo $Uaddress; ?>" />
                  <div class="validation" ></div>
                </div>-->
                
                <div class="form-group">
                  <textarea class="form-control" name="Uaddress" id="Uaddress" rows="5" cols="30" placeholder="Alamat" data-rule="required" data-msg="Please write something for us"><?php echo $Uaddress; ?></textarea>
                 

=======
                <div class="form-group">
                  <textarea class="form-control" name="Uaddress" id="Uaddress" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Alamat" value="<?php echo $Uaddress; ?>"></textarea>
>>>>>>> 04ffdf34f180c04ada2ac50fe0505a5f6580e8b6
                  <div class="validation"></div>
                </div>

              </div>
                <div class="text-center"><button type="submit" value="Update">Update</button></div>
            </form>
            <?php echo form_close(); ?>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  


  <!--==========================
  Footer
============================--> 
  <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright">
              &copy; Copyright <strong>Tekumamba 2017</strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
              -->
              Special thanks to BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
  </footer><!-- #footer -->
  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    
  <!-- Required JavaScript Libraries -->
  <script src="<?php echo base_url('assets/imperial/lib/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/superfish/hoverIntent.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/superfish/superfish.min.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/morphext/morphext.min.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/wow/wow.min.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/stickyjs/sticky.js')?>"></script>
  <script src="<?php echo base_url('assets/imperial/lib/easing/easing.js')?>"></script>
  
  <!-- Template Specisifc Custom Javascript File -->
  <script src="<?php echo base_url('assets/imperial/js/custom.js')?>"></script>
  
  <script src="<?php echo base_url('assets/imperial/contactform/contactform.js')?>"></script>
  
    
</body>
</html>