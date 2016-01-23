<?php

session_start();

header("Access-Control-Allow-Origin: *");

if (! @$_SESSION['auth']) {
	http_response_code(401);
	echo '<h1>You are not logged in!</h1>';
	return;
}

$data = ['foo' => 'bar', 'baz' => 'quux'];

header('Content-Type: application/json');
echo json_encode($data);
