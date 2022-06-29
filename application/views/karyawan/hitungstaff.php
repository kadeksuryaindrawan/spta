
<!DOCTYPE html>
<html>
<head>
	<title>Hitung Staff</title>
</head>
<body>
	<h1>Hitung Staff</h1>
	<table>
		<h2>Gaji Pokok : <?= $kar['gajipokok'] ?></h2>
		<h2>Uang Makan : <?= $kar['uangmakan'] ?></h2>
		<form method="POST" action="<?= base_url('karyawan/gajistaff') ?>">
			<label>Masukkan Jumlah Hari Kerja </label>
			<input type="hidden" name="gajipokok" value="<?= $kar['gajipokok'] ?>">
			<input type="hidden" name="uangmakan" value="<?= $kar['uangmakan'] ?>"><br>
			<input type="number" name="hari">
			<input type="submit" name="submit">
		</form >
		<br>
			<tr>
				<td><a href="<?= base_url('karyawan') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>