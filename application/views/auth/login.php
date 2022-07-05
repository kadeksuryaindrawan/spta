<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="<?= base_url('Login/process') ?>" method="POST">
		<label>Email</label><br>
		<input type="email" name="email"><br>
		<label>Password</label><br>
		<input type="password" name="password"><br><br>

		<input type="submit" name="submit" value="LOGIN">
	</form>
	<br>
	<a href="<?= base_url('Register') ?>"><button>Register</button></a>
</body>
</html>