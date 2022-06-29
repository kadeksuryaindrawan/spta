<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
	<h1>Checkout</h1>
	<table>
		<form action="<?= base_url('komputer/addCheckout') ?>" method='POST'>
			<input type="hidden" name="email" value="<?=$this->session->userdata('email')?>">
			<input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">
			<tr>
				<td colspan="1"><center><b>Total : Rp.<?= $this->cart->total() ?></b></center></td>
			</tr>
			<input type="hidden" name="total" value="<?= $this->cart->total() ?>">
			<tr>
				<td><button type="submit">Checkout</button></td>
			</tr>
			
		</form>
			<tr>
				<td><a href="<?= base_url('komputer/keranjang') ?>"><button>Kembali</button></a></td>
			</tr>
	</table>
</body>
</html>