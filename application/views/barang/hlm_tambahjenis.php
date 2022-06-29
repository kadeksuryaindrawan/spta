<!DOCTYPE html>
<html>
<head>
	<title>Tambah Jenis</title>
</head>
<body>
	<h1>Tambah Jenis Barang</h1>
	<table>
		<form action="<?= base_url('barang/addJenis') ?>" method='POST'>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('nama_jenis') ?></td>
			</tr>
			<tr>
				<td>Nama Jenis</td>
				<td>:</td>
				<td><input type="text" name="nama_jenis"></td>
			</tr>
			
			<tr>
				<td><button type="submit">Simpan</button></td>
			</tr>
			
		</form>
			<tr>
				<td><a href="<?= base_url('barang') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>