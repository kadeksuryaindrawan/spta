<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
	<h1>Checkout</h1>
	<table>
		<form action="<?= base_url('barang/addCheckout') ?>" method='POST'>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>No telp</td>
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
				<td colspan="1"><center><b>Total : Rp.<?= $this->cart->total() ?></b></center></td>
			</tr>
			<input type="hidden" name="total" value="<?= $this->cart->total() ?>">
			<tr>
				<td><button type="submit">Checkout</button></td>
			</tr>
			
		</form>
			<tr>
				<td><a href="<?= base_url('barang/keranjang') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>