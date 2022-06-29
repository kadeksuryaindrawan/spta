<!DOCTYPE html>
<html>
<head>
	<title>Halaman Barang</title>
</head>
<body>
	<h1>Daftar Barang</h1>
	<a href="<?= base_url('komputer/logout') ?>"><button>Logout</button></a> |
	<a href="<?= base_url('komputer/tambah') ?>"><button>Tambah Barang</button></a>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px; margin-bottom: 100px;" width="100%;">
		<tr>
			<td>No</td>
			<td>Nama Barang</td>
			<td>Deskripsi</td>
			<td>Stok</td>
			<td>Harga</td>
			<td>Action</td>
		</tr>

		<?php 
		$no =1;
		foreach ($barang->result_array() as $key): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_barang'] ?></td>
				<td><?= $key['deskripsi'] ?></td>
				<td><?= $key['stok'] ?></td>
				<td><?= $key['harga'] ?></td>
				<td>
					<a href="<?= base_url('komputer/ubah/'.$key['id_barang_komputer']) ?>">Edit</a> |
					<a href="<?= base_url('komputer/delete/'.$key['id_barang_komputer']) ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
		
	</table>
</body>
</html>