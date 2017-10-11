<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Classy Register Form Responsive Widget Template :: W3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classy Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Cuprum:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<!--//online-fonts -->
</head>
<body>
<div class="header">
	<h1>Classy Register Form</h1>
</div>
<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom main-agile book-form">
		<div class="alert-close"> </div>
		<h2 class="tittle">Register Here</h2>
		<form action="<?php echo base_url();?>/register/registerData" method="post" role="form" enctype="multipart/form-data">
			<div class="form-date-w3-agileits">
				<label> KTP </label>
				<input type="text" name="Uktp" placeholder="Your ID Number" required="">
				<label> Name </label>
				<input type="text" name="Uname" placeholder="Your Name" required="">
				<label> Phone </label>
				<input type="text" name="Uphone" placeholder="Your Phone Number" required="">
				<label> Address </label>
				<input type="text" name="Uaddress" placeholder="Your Address" required="">
				<label> Username </label>
				<input type="text" name="Username" placeholder="Your Username" required="">
				
				<label> Password </label>
				<input type="password" name="Upassword" placeholder="Your Password" required="">
				
				<label>Profile Picture</label>
				<input type="file" name="Ufoto">
			
				
			</div>
			<div class="make wow shake">
				   <input type = "submit" class = "btn btn-default" name = "btnSubmit" value="submit" />
			</div>
		</form>
	</div>
	<!-- //Main -->
</div>
<!-- footer -->
<div class="footer-w3l">
	<p>&copy; 2017 Classy Register Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!-- //footer -->
<!-- js-scripts-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script>$(document).ready(function(c) {
		$('.alert-close').on('click', function(c){
			$('.main-agile').fadeOut('slow', function(c){
				$('.main-agile').remove();
			});
		});	  
	});
	</script>
<!-- //js-scripts-->
</body>
</html>