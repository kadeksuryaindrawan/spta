<!DOCTYPE html>
<html>
<head>
	<title>Data Karyawan</title>
</head>
<body>
	<h1>Halaman Karyawan</h1>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px" width="100%">
		<tr>
			<td>Jabatan</td>
			<td>Gaji Pokok</td>
			<td>Tunjangan</td>
			<td>Uang Makan</td>
			<td>Bonus</td>
			<td>Action</td>
		</tr>

			<tr>
				<td><?= $kar1['jabatan'] ?></td>
				<td><?= $kar1['gajipokok'] ?></td>
				<td><?= $kar1['tunjangan'] ?></td>
				<td>-</td>
				<td>-</td>
				<td><a href="<?= base_url('karyawan/hitungcs/'.$kar1['id']) ?>">Hitung Gaji</a></td>
			</tr>

			<tr>
				<td><?= $kar2['jabatan'] ?></td>
				<td><?= $kar2['gajipokok'] ?></td>
				<td>-</td>
				<td><?= $kar2['uangmakan'] ?></td>
				<td>-</td>
				<td><a href="<?= base_url('karyawan/hitungstaff/'.$kar2['id']) ?>">Hitung Gaji</a></td>
			</tr>

			<tr>
				<td><?= $kar3['jabatan'] ?></td>
				<td><?= $kar3['gajipokok'] ?></td>
				<td>-</td>
				<td><?= $kar3['uangmakan'] ?></td>
				<td><?= $kar3['bonus'] ?></td>
				<td><a href="<?= base_url('karyawan/hitungmanager/'.$kar3['id']) ?>">Hitung Gaji</a></td>
			</tr>
		
	</table>
</body>
</html>