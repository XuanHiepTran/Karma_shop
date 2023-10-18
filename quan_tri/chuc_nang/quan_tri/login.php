<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
		<p style="color: #5555DF; font-size: 36px; text-align: center;">Đăng nhập trang Admin</p>
	<form method="post">
		<table align="center" style="">
			<tr style="height: 60px;">
				<td><label for="name" style="font-size: 28px;">Username:</label></td>
				<td><input type="text" name="username" id="name" style="width: 180px; height: 40px; border-radius: 10px; border: 0.1px solid silver; padding-left: 10px;"></td>
			</tr>
			<tr>
				<td><label for="pass" style="font-size: 28px;">Password:</label></td>
				<td><input type="password" name="password" id="pass" style="width: 180px; height: 40px; border-radius: 10px; border: 0.1px solid silver; padding-left: 10px;"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Login" name="submit" style="width: 100px; height: 36px; color: white; background-color: #5151E2; border: none; border-radius: 10px;"></td>
			</tr>
		</table>
	</form>
</body>
</html>