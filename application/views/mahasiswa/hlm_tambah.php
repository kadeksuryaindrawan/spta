<!DOCTYPE html>
<html>
<head>
	<title>Tambah Mahasiswa</title>
</head>
<body>
	<h1>Tambah Mahasiswa</h1>
	<table>
		<form action="<?= base_url('mahasiswa/add') ?>" method='POST'>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td>:</td>
				<td>
					<select name="jurusan">
						<option value="">Pilih Jurusan</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Teknik Elektro">Teknik Sipil</option>
						<option value="Pariwisata">Pariwisata</option>
						<option value="Administrasi Niaga">Administrasi Niaga</option>
						<option value="Akuntansi">Akuntansi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="number" name="telp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>
					<textarea name="alamat" rows="3"></textarea>
				</td>
			</tr>
			<tr>
				<td><button type="submit">Simpan</button></td>
			</tr>
			
		</form>
			<tr>
				<td><a href="<?= base_url('mahasiswa') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>