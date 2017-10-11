<?php
if (isset($_POST['submit'])) {
			
		$nama = $_FILES['Gambar']['name'];
		$asal = $_FILES['Gambar']['tmp_name'];

			move_uploaded_file($asal, 'index.php/uploaded_img/'.$nama);
		}
?>
<html>
<head>
	<title>Update Barang</title>
</head>
<body>
	<? echo form_open_multipart('crud/UpdateIt');?>
	<form method="POST" action=" <?php echo base_url()."index.php/crud/UpdateIt"; ?>">
	<table>
		<tr>
			<td>kode_barang</td>
			<td><input type="text" name="kode_barang" value="<?php echo $kode_barang; ?>" readonly /></td>
		</tr>
		<tr>
			<td>nama_barang</td>
			<td><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></td>
		</tr>
		<tr>
			<td>satuan</td>
			<td><input type="text" name="satuan" value="<?php echo $satuan; ?>" /></td>
		</tr>
		<tr>
			<td>jumlah</td>
			<td><input type="text" name="jumlah" value="<?php echo $jumlah; ?>" /></td>
		</tr>
		<tr>
			<td>harga</td>
			<td><input type="text" name="harga" value="<?php echo $harga; ?>" /></td>
		</tr>
		<tr>
			<td>kategori</td>
			<td><input type="text" name="kategori" value="<?php echo $kategori; ?>" /></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td><input type="file" name="Gambar" value="<?php echo $Gambar; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnSubmit" value="Simpan" /></td>
		</tr>
		</table>
		</form>
</body>
</html>

