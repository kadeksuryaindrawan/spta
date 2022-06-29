<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1>Halaman Mahasiswa</h1>
	<a href="<?= base_url('mahasiswa/tambah') ?>">Tambah Mahasiswa</a>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px" width="100%">
		<tr>
			<td>No</td>
			<td>NIM</td>
			<td>Nama Mahasiswa</td>
			<td>Jurusan</td>
			<td>Telp</td>
			<td>Alamat</td>
			<td>Action</td>
		</tr>

		<?php foreach ($mhs->result_array() as $key): ?>
			<tr>
				<td><?= $key['id'] ?></td>
				<td><?= $key['nim'] ?></td>
				<td><?= $key['nama'] ?></td>
				<td><?= $key['jurusan'] ?></td>
				<td><?= $key['telp'] ?></td>
				<td><?= $key['alamat'] ?></td>
				<td>
					<a href="<?= base_url('mahasiswa/ubah/'.$key['id']) ?>">Edit</a> |
					<a href="<?= base_url('mahasiswa/delete/'.$key['id']) ?>">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
		
	</table>
</body>
</html>