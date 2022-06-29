<!DOCTYPE html>
<html>
<head>
	<title>Data Barang</title>
</head>
<body>
	
	
	<h1>Daftar Jenis Barang</h1>
	<a href="<?= base_url('barang/tambahJenis') ?>"><button>Tambah Jenis Barang</button></a>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px" width="30%">
		<tr>
			<td>No</td>
			<td>Nama Jenis Barang</td>
			<td>Action</td>
		</tr>

		<?php 
		$no =1;
		foreach ($jenis->result_array() as $key): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_jenis'] ?></td>
				<td>
					<a href="<?= base_url('barang/ubahJenis/'.$key['id_jenisbarang']) ?>">Edit</a> |
					<a href="<?= base_url('barang/deleteJenis/'.$key['id_jenisbarang']) ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
		
	</table>
	<h1>Daftar Barang</h1>
	<a href="<?= base_url('barang/tambah') ?>"><button>Tambah Barang</button></a> |
	<a href="<?= base_url('barang/keranjang') ?>">Keranjang Belanja (<?= count($this->cart->contents()) ?>)</a>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px; margin-bottom: 100px;" width="100%;">
		<tr>
			<td>No</td>
			<td>Nama Barang</td>
			<td>Jenis Barang</td>
			<td>Deskripsi</td>
			<td>QTY</td>
			<td>Harga</td>
			<td>Action</td>
		</tr>

		<?php 
		$no =1;
		foreach ($barang->result_array() as $key): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $key['nama_barang'] ?></td>
				<td><?= $key['nama_jenis'] ?></td>
				<td><?= $key['deskripsi'] ?></td>
				<td><?= $key['qty'] ?></td>
				<td><?= $key['harga'] ?></td>
				<td>
					<a href="<?= base_url('barang/ubah/'.$key['id_barang']) ?>">Edit</a> |
					<a href="<?= base_url('barang/delete/'.$key['id_barang']) ?>">Delete</a>|
					<a href="<?= base_url('barang/addCart/'.$key['id_barang']) ?>">Cart</a>
				</td>
			</tr>
		<?php endforeach ?>
		
	</table>
</body>
</html>