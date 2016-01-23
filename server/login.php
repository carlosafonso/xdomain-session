<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo '<h1>Method not allowed</h1>';
	return;
}

$user = @$_POST['user'];
$pass = @$_POST['pass'];

if ($user !== 'foo' || $pass !== 'bar') {
	http_response_code(401);
	echo '<h1>Invalid credentials</h1>';
	return;
}

$_SESSION['auth'] = true;
$_SESSION['param'] = @$_POST['param'];

header('Location: http://localhost:9000/');

