<?php

session_start();

if (@$_SESSION['auth']) {
	header('Location: http://localhost:8000/foo.php');
	return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];

	if ($user !== 'foo' || $pass !== 'bar') {
		http_response_code(401);
		echo '<h1>Invalid credentials</h1><a href="/login.php">Go back</a>';
		return;
	}

	$_SESSION['auth'] = true;
	$_SESSION['param'] = @$_POST['param'];

	header('Location: http://localhost:9000/');
	return;
}

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Authentication required</h1>
	<form method="POST" action="/login.php">
		<label for="">Username</label><input type="name" name="user"/>
		<label for="">Password</label><input type="password" name="pass"/>
		<input type="submit" value="Go">
	</form>
</body>
</html>
