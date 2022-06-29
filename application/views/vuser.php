<!DOCTYPE html>
<html>
<head>
	<title>Halaman User</title>
</head>
<body>
	<h2>Selamat Datang, <?= $this->session->userdata('email'); ?></h2>
	<a href="<?= base_url('login/logout') ?>"><button>Logout</button></a>
</body>
</html>