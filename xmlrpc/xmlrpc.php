<?php
function hello() {
	return 'hello';
}

function sum($method, $args, $extra) {
	return array_sum($args);
}

$server = xmlrpc_server_create();
xmlrpc_server_register_method($server, 'hello', 'hello');
xmlrpc_server_register_method($server, 'sum', 'sum');

$request = $HTTP_RAW_POST_DATA;

$xmlrpc_response = xmlrpc_server_call_method($server, $request, null);

header('Content-Type:test/xml');
echo $xmlrpc_response;

xmlrpc_server_destroy($server);