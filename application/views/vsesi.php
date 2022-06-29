<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>
	<a href="sesi/set"><button>Set Session</button></a>
	<a href="sesi/delone"><button>Delete One</button></a>
	<a href="sesi/delall"><button>Delete All</button></a><br>

	Username : <?= $this->session->userdata('username'); ?><br>
	Role : <?= $this->session->userdata('role'); ?><br>
	Nama : <?= $this->session->userdata('nama'); ?><br><br>

	<form method="POST" action="<?= base_url('sesi/set') ?>">
		<table>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Role</td>
			<td>:</td>
			<td><input type="text" name="role"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td><button type="submit">Simpan</button></td>
		</tr>
		</table>
	</form>
</body>
</html>