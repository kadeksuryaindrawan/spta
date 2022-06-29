<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
</head>
<body>
	<h1>Tambah Barang</h1>
	<table>
		<form action="<?= base_url('komputer/add') ?>" method='POST'>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('nama_barang') ?></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('stok') ?></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>:</td>
				<td><input type="number" name="stok"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('harga') ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="number" name="harga"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('deskripsi') ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td>
					<textarea name="deskripsi" rows="3"></textarea>
				</td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
			</tr>
			
		</form>
			<tr>
				<td><a href="<?= base_url('komputer/barang') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>