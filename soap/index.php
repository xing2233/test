<?php
$soap = new SoapClient('http://test.dog.dev/wsdl.xml');
var_dump($soap->test('10086'));

