<!DOCTYPE html>
<html>
<head>
	<title>Keranjang</title>
</head>
<body>
	<h1>Keranjang Barang</h1>
	<a href="<?= base_url('komputer/beli') ?>"><button>Kembali</button></a> |
	<a href="<?= base_url('komputer/deleteCart') ?>"><button>Hapus Semua</button></a> |
	<a href="<?= base_url('komputer/checkout') ?>"><button>Checkout</button></a>
	<table border="1" cellpadding="20" cellspacing="0" style="margin-top: 20px; margin-bottom: 100px;" width="100%;">
		<tr>
			<td>ID</td>
			<td>Nama Barang</td>
			<td>Deskripsi</td>
			<td>QTY</td>
			<td>Harga</td>
		</tr>

		<?php 
		$no =1;
		foreach ($this->cart->contents() as $key): ?>
			<tr>
				<td><?= $key['id'] ?></td>
				<td><?= $key['name'] ?></td>
				<td><?= $key['options']['description'] ?></td>
				<td><?= $key['qty'] ?></td>
				<td><?= $key['price'] ?></td>
			</tr>
		<?php endforeach ?>
		<tr>
			<td colspan="5"><center><b>Total : Rp.<?= $this->cart->total() ?></b></center></td>
		</tr>
	</table>
</body>
</html>