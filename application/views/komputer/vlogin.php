<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>
	<form method="POST" action="<?= base_url('komputer/loginProcess') ?>">
		<table>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><button type="submit">Login</button></td>
		</tr>
		</table>
	</form>
</body>
</html>