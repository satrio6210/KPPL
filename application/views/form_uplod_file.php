<<?php 
	$msg ="";

	if (isset($_POST['Upload'])) {
		# code...
		$target = "uploaded_img/".basename($_FILES['image']['name']);

		$image = $_FILES['image']['name'];
		$text = $POST['text'];

		$db = mysqli_connect("localhost", "root", "", "barang");


		$sql = "INSERT INTO images (image, text) VALUES ('$image','$text')";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			# code...
			$msg ="Image uploaded";
		}else {$msg = "BAH FAILED";}


	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload file form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="content">
	<form method="post" action="form_uplod_file.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name="text" cols="40" rows="4" placeholder="Say something about this thing.... :D" ></textarea>
		</div>
		<div>
			<input type="submit" name="Upload" value="Upload image">
		</div>
	</form>
</div>
</body>
</html>