<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form action="<?= base_url('Register/process') ?>" method="POST">
		<label>Email</label><br>
		<input type="email" name="email"><br>
		<label>Nama Lengkap</label><br>
		<input type="text" name="name"><br>
		<label>Password</label><br>
		<input type="password" name="password"><br>
		<label>Re-password</label><br>
		<input type="password" name="repassword"><br>
		<input type="submit" name="submit" value="REGISTER">
	</form>
	<br>
	<a href="<?= base_url('Login') ?>"><button>Login</button></a>
</body>
</html>