<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form method="POST" action="<?= base_url('form/input') ?>">
		<table>
			<tr>
				<td colspan="3"><?= form_error('nama') ?></td>
			</tr>
			<tr>
				<td><label>Nama</label></td>
				<td>:</td>
				<td><input type="text" name="nama" placeholder="Input Nama"></td>
			</tr>
			<tr>
				<td colspan="3"><?= form_error('email') ?></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td>:</td>
				<td><input type="email" name="email" placeholder="Input Email"></td>
			</tr>
			<tr>
				<td colspan="3"><?= form_error('alamat') ?></td>
			</tr>
			<tr>
				<td><label>Alamat</label></td>
				<td>:</td>
				<td><input type="text" name="alamat" placeholder="Input Alamat"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>