<?php 

function test($x) {
	return $x;
}

$ss = new SoapServer('http://test.dog.dev/wsdl.xml');
$ss->addFunction('test');
$ss->handle();