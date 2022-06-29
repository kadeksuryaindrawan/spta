
<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
</head>
<body>
	<h1>Edit Barang</h1>
	<table>
		<form action="<?= base_url('barang/edit/').$barang['id_barang'] ?>" method='POST'>
			<input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('nama_barang') ?></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('id_jenisbarang') ?></td>
			</tr>
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td>
					<select name="id_jenisbarang">
						<option value="">Pilih Jenis Barang</option>
						<?php foreach ($jenis->result_array() as $key): 
							$selected = ($key['id_jenisbarang'] == $barang['id_jenisbarang']) ? 'selected' : '';
						?>
							<option value="<?= $key['id_jenisbarang'] ?>" <?= $selected ?>><?= $key['nama_jenis'] ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('qty') ?></td>
			</tr>
			<tr>
				<td>Qty</td>
				<td>:</td>
				<td><input type="number" name="qty" value="<?= $barang['qty'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('harga') ?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="number" name="harga" value="<?= $barang['harga'] ?>"></td>
			</tr>
			<tr>
				<td colspan="3" style="color: red;"><?= form_error('deskripsi') ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td>
					<textarea name="deskripsi" rows="3"><?= $barang['deskripsi'] ?></textarea>
				</td>
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