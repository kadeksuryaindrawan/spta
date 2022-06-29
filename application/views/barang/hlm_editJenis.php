<!DOCTYPE html>
<html>
<head>
	<title>Edit Jenis</title>
</head>
<body>
	<h1>Edit Jenis Barang</h1>
	<table>
		<form action="<?= base_url('barang/editJenis/').$jenis['id_jenisbarang'] ?>" method='POST'>
			<input type="hidden" name="id_jenisbarang" value="<?= $jenis['id_jenisbarang'] ?>">
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('nama_jenis') ?></td>
			</tr>
			<tr>
				<td>Nama Jenis</td>
				<td>:</td>
				<td><input type="text" name="nama_jenis" value="<?= $jenis['nama_jenis'] ?>"></td>
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