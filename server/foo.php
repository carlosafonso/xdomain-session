<?php

session_start();

header("Access-Control-Allow-Origin: http://localhost:9000");
header("Access-Control-Allow-Credentials: true");

if (! @$_SESSION['auth']) {
	http_response_code(401);
	echo '<h1>You are not logged in!</h1>';
	return;
}

$data = [
	'foo' => 'bar',
	'baz' => 'quux',
	'sess_id' => session_id(),
	'param' => $_SESSION['param']
];

header('Content-Type: application/json');
echo json_encode($data);
