
<!DOCTYPE html>
<html>
<head>
	<title>Hitung CS</title>
</head>
<body>
	<h1>Hitung CS</h1>
	<table>
		<h2>Gaji Pokok : <?= $kar['gajipokok'] ?></h2>
		<h2>Tunjangan : <?= $kar['tunjangan'] ?></h2>
		<form method="POST" action="<?= base_url('karyawan/gajics') ?>">
			<label>Masukkan Jumlah Hari Kerja </label>
			<input type="number" name="hari">
			<input type="hidden" name="gajipokok" value="<?= $kar['gajipokok'] ?>">
			<input type="hidden" name="tunjangan" value="<?= $kar['tunjangan'] ?>"><br>
			<input type="submit" name="submit">
		</form >
		<br>
			<tr>
				<td><a href="<?= base_url('karyawan') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>