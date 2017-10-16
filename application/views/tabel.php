<!DOCTYPE html>
<html>
<head>
	<title>Data barang</title>
</head>
<body>
		<table border="1" style="border-collapse: collapse; width:50%">
			<tr style="background: gray;">
				<th>Kode barang</th>
				<th>Nama barang</th>
				<th>satuan</th>
				<th>jumlah</th>
				<th>harga</th>
				<th>kategori</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
		<?php foreach($data as $d) { ?>
			<tr>
				<td> <?php echo $d['kode_barang']; ?> </td>
				<td> <?php echo $d['nama_barang']; ?> </td>
				<td> <?php echo $d['satuan']; ?> </td>
				<td> <?php echo $d['jumlah']; ?> </td>
				<td> <?php echo $d['harga']; ?> </td>
				<td> <?php echo $d['kategori']; ?> </td>
				<td> 

				
				<?php echo "<img src ='index.php/uploaded_img/".$d['Gambar']."'>"; ?> 

				</td>
				<td align="center">
					<a href="<?php  echo base_url()."index.php/crud/Update_data/".$d['kode_barang']; ?>">Edit</a> ||
					<a href="<?php  echo base_url()."index.php/crud/do_delete/".$d['kode_barang']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</table>
</body>
</html>	

