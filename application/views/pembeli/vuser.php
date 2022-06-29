<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pembeli</title>
</head>
<body>
	<h2>Selamat Datang, <?= $this->session->userdata('email'); ?></h2>
	<a href="<?= base_url('komputer/logout') ?>"><button>Logout</button></a> |
	<a href="<?= base_url('komputer/beli') ?>"><button>Beli Barang</button></a>
</body>
</html>